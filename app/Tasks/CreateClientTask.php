<?php

namespace App\Tasks;

use App\Repositories\UserRepository;
use App\Models\User;

class CreateClientTask extends Task
{
  public static function run(string $phone, string $password) : User
  {
    return UserRepository::storeClient($phone, $password);
  }
}
