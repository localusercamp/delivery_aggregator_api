<?php

namespace App\Tasks;

class ConstructJwtTask extends Task
{
  public static function run(string $token) : array
  {
    return [
      'access_token' => $token,
      'token_type'   => 'bearer',
      'expires_in'   => auth()->payload()['exp'],
    ];
  }
}
