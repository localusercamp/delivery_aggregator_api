<?php

namespace App\Repositories;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageRepository extends Repository
{
  public static function store(UploadedFile $file, int $product_id) : Image
  {
    $file_title = $file->getClientOriginalName();
    $extension  = $file->getClientOriginalExtension();
    $hash       = sha1(Carbon::now() . '_' . codegen(8));
    $filename   = "{$hash}.{$extension}";
    $path       = Storage::putFileAs("/public/posters/{$product_id}", $file, $filename, 'public');
    $user       = auth()->user();

    $image = new Image();
    $image->title       = $file_title;
    $image->path        = $path;
    $image->creator_id  = $user->id;

    $image->save();

    return $image;
  }
}
