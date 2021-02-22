<?php

namespace App\Actions\Product;

use App\Actions\Action;
use App\Exceptions\BuisnesLogicException;
use App\Repositories\ProductRepository;

class CreateProductAction extends Action
{
  public static function run(string $title, ?string $description, int $price, array $tags) : array
  {
    $user    = auth()->user();
    $product = ProductRepository::store($title, $description, $price, $user->id);

    if (!is_syncable($tags)) throw new BuisnesLogicException('Not syncable array was passed!');

    $product->tags()->sync($tags);

    return compact('product');
  }
}
