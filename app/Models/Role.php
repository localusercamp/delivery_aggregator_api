<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;

  protected $table = 'role';

  const ADMIN     = 1;
  const MODERATOR = 2;
  const PROVIDER  = 3;
  const CLIENT    = 4;

}
