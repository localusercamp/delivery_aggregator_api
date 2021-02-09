<?php

namespace App\Actions\Product;

use App\Actions\Action;

use App\Models\Product;

class CreateProductAction extends Action
{
  public static function run() : array
  {
    $product_list = Product::get();
    return compact('product_list');
  }
}
