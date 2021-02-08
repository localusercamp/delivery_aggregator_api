<?php

namespace App\Tasks;

use App\Entities\SMSManager;

use App\Exceptions\SMS\{
  NotFoundException,
  CodeComparisonFailedException,
};

class VerifySMSCodeTask extends Task
{
  /**
   * Проверяет наличие отправленной SMS. Сопоставляет код в SMS и приходящий код.
   *
   * @param string $phone Телефон
   * @param string $code  Код из SMS
   */
  public static function run(string $phone, string $code) : void
  {
    $SMSManager = new SMSManager();
    $sms = $SMSManager->getSMS($phone);

    if (!$sms) {
      throw new NotFoundException();
    }
    if (!$sms->verifyCode($code)) {
      throw new CodeComparisonFailedException();
    }
  }
}
