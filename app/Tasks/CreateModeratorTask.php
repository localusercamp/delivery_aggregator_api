<?php

namespace App\Tasks;

use App\Repositories\UserRepository;
use App\Models\User;

class CreateModeratorTask extends Task
{
  public static function run(string $phone, string $password) : User
  {
    return UserRepository::storeModerator($phone, $password);
  }
}
