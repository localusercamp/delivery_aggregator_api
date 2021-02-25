<?php

namespace App\Contracts;

use App\Interfaces\IRepository;

abstract class Repository implements IRepository
{
  final private function __construct() {}
}
