<?php

namespace App\Actions\Auth;

use App\Contracts\Action;
use App\Entities\{
  SMSManager,
  SMS,
};

class SendVerificationSMSAction extends Action
{
  public static function run(string $phone) : void
  {
    $SMSManager = new SMSManager();

    $code = $SMSManager->generateVerificationCode();
    $sms  = new SMS($phone, "Ваш код для подтверждения регистрации: ${code}", $code);

    $SMSManager->putSMS($sms, 20);

    // $SMSManager->sendSMS($sms);
  }
}
