<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOptionType extends Model
{
  use HasFactory;

  protected $table = 'product_option_type';

  const ITERATIVE  = 1;
  const SELECTIVE  = 2;
  const SWITCHABLE = 3;
}
