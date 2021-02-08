<?php

namespace App\Tasks;

use App\Repositories\UserRepository;

class CreateProviderTask extends Task
{
  public static function run(string $phone, string $password) : array
  {
    return UserRepository::storeProvider($phone, $password);
  }
}
