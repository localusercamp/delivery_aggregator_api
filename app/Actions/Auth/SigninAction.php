<?php

namespace App\Actions\Auth;

use App\Actions\Action;
use App\Tasks\{ AuthorizeUserTask, ClaimJwtTask };

class SigninAction extends Action
{
  public static function run(array $input) : array
  {
    $token = AuthorizeUserTask::run($input);
    $jwt   = ClaimJwtTask::run($token);
    return $jwt;
  }
}
