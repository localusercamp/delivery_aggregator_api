<?php

namespace App\Tasks;

class ClaimJwtTask extends Task
{
  public static function run(string $token) : array
  {
    return [
      'jwt' => [
        'access_token' => $token,
        'token_type'   => 'bearer',
        'expires_in'   => auth()->factory()->getTTL() * 60*24,
      ]
    ];
  }
}
