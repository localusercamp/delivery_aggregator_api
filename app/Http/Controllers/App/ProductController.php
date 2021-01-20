<?php
namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

use App\Models\{
  Product,
};

class ProductController extends Controller
{
  public function list()
  {
    $product_list = Product::get();
    return compact('product_list');
  }
}
