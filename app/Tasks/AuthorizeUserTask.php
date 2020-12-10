<?php

namespace App\Tasks;

class AuthorizeUserTask extends Task
{
  public static function run(array $input)
  {
    return auth()->attempt($input);
  }
}
