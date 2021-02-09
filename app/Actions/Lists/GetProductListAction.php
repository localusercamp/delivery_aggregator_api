<?php

namespace App\Actions\Lists;

use App\Actions\Action;

use App\Models\Product;

class GetProductListAction extends Action
{
  public static function run() : array
  {
    $product_list = Product::get();
    return compact('product_list');
  }
}
