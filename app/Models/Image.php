<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

final class Image extends File
{
  use HasFactory;

  protected $table = 'image';

  protected $appends = [
    'url'
  ];

  protected $hidden = [
    'path'
  ];



  public function getUrlAttribute() {
    return asset("storage/{$this->path}");
  }
}
