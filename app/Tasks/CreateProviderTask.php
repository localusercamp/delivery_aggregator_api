<?php

namespace App\Tasks;

use App\Repositories\UserRepository;

class CreateProviderTask extends Task
{
  public static function run(array $input) : array
  {
    return UserRepository::storeProvider($input);
  }
}
