<?php

namespace App\Actions\Auth;

use App\Actions\Action;
use App\Entities\{
  SMSManager,
  SMS,
};

class SendVerificationSMSAction extends Action
{
  public static function run(array $input) : void
  {
    $SMSManager = new SMSManager();

    $code = $SMSManager->generateVerificationCode();
    $sms  = new SMS($input['phone'], "Ваш код для подтверждения регистрации: ${code}", $code);

    $SMSManager->putSMS($sms, 20);

    $SMSManager->sendSMS($sms);
  }
}
