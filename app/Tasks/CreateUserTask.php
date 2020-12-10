<?php

namespace App\Tasks;

use App\Repositories\UserRepository;

class CreateUserTask extends Task
{
  public static function run(array $input) : array
  {
    return isset($input['email']) ?
      UserRepository::storeSeller($input) :
      UserRepository::storeBuyer($input);
  }
}
