<?php

namespace App\Tasks;

use App\Repositories\UserRepository;

class CreateModeratorTask extends Task
{
  public static function run(array $input) : array
  {
    return UserRepository::storeModerator($input);
  }
}
