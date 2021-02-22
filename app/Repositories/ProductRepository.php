<?php

namespace App\Repositories;

use App\Models\Product;

use App\Exceptions\Repository\ModelSyncArgumentException;

class ProductRepository extends Repository
{
  public static function store(string $title, ?string $description, int $price, int $creator_id) : Product
  {
    $product = new Product();
    $product->title       = $title;
    $product->description = $description;
    $product->price       = $price;
    $product->creator_id  = $creator_id;
    $product->save();

    return $product;
  }
}
