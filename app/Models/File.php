<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
  public function deletePublicSource()
  {
    Storage::delete(storage_path('app' . DIRECTORY_SEPARATOR . 'public') . $this->path);
  }
}
