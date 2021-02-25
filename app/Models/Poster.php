<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

final class Poster extends Image
{
  use HasFactory;

  protected $table = 'poster';
}
