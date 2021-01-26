<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class SMSRepository extends Repository
{
  public static function store(string $key, string $input, int $lifetime_in_seconds) : void
  {
    Cache::put($key, $input, $lifetime_in_seconds);
  }

  public static function get(string $key) : ?string
  {
    return Cache::get($key);
  }
}
