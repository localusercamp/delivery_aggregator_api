<?php

namespace App\Tasks;

use App\Repositories\UserRepository;

class CreateClientTask extends Task
{
  public static function run(array $input) : array
  {
    return UserRepository::storeClient($input);
  }
}
