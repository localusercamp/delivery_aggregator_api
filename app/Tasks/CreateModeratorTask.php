<?php

namespace App\Tasks;

use App\Repositories\UserRepository;

class CreateModeratorTask extends Task
{
  public static function run(string $phone, string $password) : array
  {
    return UserRepository::storeModerator($phone, $password);
  }
}
