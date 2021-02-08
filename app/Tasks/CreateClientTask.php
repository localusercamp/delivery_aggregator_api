<?php

namespace App\Tasks;

use App\Repositories\UserRepository;

class CreateClientTask extends Task
{
  public static function run(string $phone, string $password) : array
  {
    return UserRepository::storeClient($phone, $password);
  }
}
