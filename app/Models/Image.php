<?php

namespace App\Models;

class Image extends File
{
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
