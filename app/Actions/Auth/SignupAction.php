<?php

namespace App\Actions\Auth;

use App\Actions\Action;
use App\Models\Role;
use App\Tasks\{
  CreateModeratorTask,
  CreateProviderTask,
  CreateClientTask,
};

class SignupAction extends Action
{
  public static function run(array $input, int $role) : array
  {
    switch ($role)
    {
      case Role::MODERATOR: return CreateModeratorTask::run($input);
      case Role::PROVIDER:  return CreateProviderTask::run($input);
      case Role::CLIENT:    return CreateClientTask::run($input);
    }
  }
}
