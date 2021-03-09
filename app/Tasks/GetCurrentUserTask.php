<?php

namespace App\Tasks;

class GetCurrentUserTask extends Task
{
  public static function run(?array $relations)
  {
    return $relations ? auth()->user()->load($relations) : auth()->user();
  }
}
