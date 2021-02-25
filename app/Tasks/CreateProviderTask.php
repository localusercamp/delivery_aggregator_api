<?php

namespace App\Tasks;

use App\Repositories\UserRepository;
use App\Models\User;

class CreateProviderTask extends Task
{
  public static function run(string $phone, string $password) : User
  {
    return UserRepository::storeProvider($phone, $password);
  }
}
