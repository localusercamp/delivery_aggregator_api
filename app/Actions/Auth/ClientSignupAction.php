<?php

namespace App\Actions\Auth;

use App\Actions\Action;

use App\Tasks\{
  CreateClientTask,
  VerifySMSCodeTask,
};

class ClientSignupAction extends Action
{
  public static function run(string $phone, string $password, string $code) : array
  {
    VerifySMSCodeTask::run($phone, $code);
    $user = CreateClientTask::run($phone, $password);

    return compact('user');
  }
}
