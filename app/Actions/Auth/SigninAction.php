<?php

namespace App\Actions\Auth;

use App\Contracts\Action;
use App\Tasks\{
  AuthorizeUserTask,
  ConstructJwtTask,
  GetCurrentUserTask,
};

class SigninAction extends Action
{
  public static function run(string $phone, string $password) : array
  {
    $token = AuthorizeUserTask::run($phone, $password);
    $jwt   = ConstructJwtTask::run($token);
    $user  = GetCurrentUserTask::run(['company']);

    return compact('jwt', 'user');
  }
}
