<?php

namespace App\Tasks;

class GetCurrentUserTask extends Task
{
  public static function run()
  {
    return auth()->user();
  }
}
