<?php

namespace App\Actions\Auth;

use App\Actions\Action;
use App\Tasks\CreateUserTask;

class SignupAction extends Action
{
  public static function run(array $input) : array
  {
    return CreateUserTask::run($input);
  }
}
