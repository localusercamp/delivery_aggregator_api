<?php

namespace App\Actions\Auth;

use App\Actions\Action;
use App\Tasks\{
  AuthorizeUserTask,
  ConstructJwtTask,
  GetCurrentUserTask,
};

class SigninAction extends Action
{
  public static function run(array $input) : array
  {

    $token = AuthorizeUserTask::run($input);
    $jwt   = ConstructJwtTask::run($token);

    $user  = GetCurrentUserTask::run();

    return compact('jwt', 'user');
  }
}
