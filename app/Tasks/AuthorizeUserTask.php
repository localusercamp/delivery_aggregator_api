<?php

namespace App\Tasks;

class AuthorizeUserTask extends Task
{
  public static function run(string $phone, string $password) : string
  {
    return auth()->attempt([
      'phone' => $phone,
      'password' => $password,
    ]);
  }
}
