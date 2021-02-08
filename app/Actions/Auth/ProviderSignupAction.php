<?php

namespace App\Actions\Auth;

use App\Actions\Action;

use App\Tasks\{
  CreateProviderTask,
  VerifySMSCodeTask,
};

class ProviderSignupAction extends Action
{
  public static function run(string $phone, string $password, string $code) : array
  {
    VerifySMSCodeTask::run($phone, $code);
    $user = CreateProviderTask::run($phone, $password);

    return $user;
  }
}
