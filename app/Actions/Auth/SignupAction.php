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

use App\Exceptions\SMS\{
  NotFoundException,
  CodeComparisonFailedException,
};

class SignupAction extends Action
{
  public static function run(array $input, int $role) : array
  {
    $SMSManager = new SMSManager();
    $sms  = $SMSManager->getSMS($input['phone']);
    $task = self::getTaskByType($role);

    if (!$sms) {
      throw new NotFoundException();
    }
    if (!$sms->verifyCode($input['code'])) {
      throw new CodeComparisonFailedException();
    }
    unset($input['code']);

    $user = $task::run($input);

    return $user;
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
