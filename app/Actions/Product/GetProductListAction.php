<?php

namespace App\Actions\Product;

use App\Actions\Action;

use App\Models\Product;

class GetProductListAction extends Action
{
  public static function run() : array
  {
    $product_list = Product::with('poster:id,path')->get();
    return compact('product_list');
  }
}
