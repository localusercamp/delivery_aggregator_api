<?php

namespace App\Actions\Auth;

use App\Contracts\Action;

use App\Tasks\{
  CreateModeratorTask,
  VerifySMSCodeTask,
};

class ModeratorSignupAction extends Action
{
  public static function run(string $phone, string $password, string $code) : array
  {
    VerifySMSCodeTask::run($phone, $code);
    $user = CreateModeratorTask::run($phone, $password);

    return compact('user');
  }
}
