<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  protected $table = 'status';

  public const DRAFT    = 1;
  public const REVIEW   = 2;
  public const APPROVED = 3;
}
