<?php

namespace App\Repositories;

use App\Contracts\IRepository;

abstract class Repository implements IRepository
{
  final private function __construct() {}
}
