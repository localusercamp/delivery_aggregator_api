<?php

namespace App\Actions\Product;

use Illuminate\Http\UploadedFile;

use App\Contracts\Action;
use App\Exceptions\BuisnesLogicException;
use App\Repositories\PosterRepository;
use App\Repositories\ProductRepository;

class CreateProductAction extends Action
{
  public static function run(string $title, ?string $description, int $price, array $tags, UploadedFile $poster) : array
  {
    $user = auth()->user();

    if (!is_syncable($tags)) throw new BuisnesLogicException('Not syncable array was passed!');

    $product = ProductRepository::store($title, $description, $price, $user->id, $poster);
    $poster  = PosterRepository::store($poster, $product->id);
    $product->poster_id = $poster->id;
    $product->tags()->sync($tags);
    $product->save();

    return compact('product');
  }
}
