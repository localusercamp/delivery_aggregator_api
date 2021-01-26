<?php

namespace App\Actions\Auth;

use App\Actions\Action;
use App\Models\Role;
use App\Tasks\{
  CreateModeratorTask,
  CreateProviderTask,
  CreateClientTask,
};
use App\Entities\{
  SMSManager,
  SMS,
};
use App\Exceptions\SMSMaximumRepeatsExceededException;

class SignupAction extends Action
{
  public static function run(array $input, int $role) : array
  {
    $SMSManager = new SMSManager();

    $code = $SMSManager->generateVerificationCode();
    $sms  = new SMS($input['phone'], "Ваш код для подтверждения регистрации: ${code}", $code);
    $task = self::getTaskByType($role);

    $SMSManager->putSMS($sms, 5);

    $resp = $SMSManager->sendSMS($sms);
    dd($resp);
    // $smss = $SMSManager->getSMS($sms->phone);


  }

  public static function getTaskByType(int $role) : string
  {
    switch ($role)
    {
      case Role::MODERATOR: return CreateModeratorTask::class;
      case Role::PROVIDER:  return CreateProviderTask::class;
      case Role::CLIENT:    return CreateClientTask::class;
    }
  }

}
