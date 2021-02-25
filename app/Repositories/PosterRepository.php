<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

use App\Models\Poster;
use App\Contracts\Repository;

class PosterRepository extends Repository
{
  public static function store(UploadedFile $file, int $product_id) : Poster
  {
    $file_title = $file->getClientOriginalName();
    $extension  = $file->getClientOriginalExtension();
    $hash       = sha1(Carbon::now() . '_' . codegen(8));
    $filename   = "{$hash}.{$extension}";
    $user       = auth()->user();

    Storage::putFileAs("/public/posters/products/{$product_id}", $file, $filename, 'public');
    $path = "posters/products/{$product_id}/{$filename}";

    $poster = new Poster();
    $poster->title       = $file_title;
    $poster->path        = $path;
    $poster->creator_id  = $user->id;

    $poster->save();

    return $poster;
  }
}
