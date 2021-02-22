<?php

namespace App\Actions\Product;

use Illuminate\Http\UploadedFile;

use App\Actions\Action;
use App\Tasks\ChangeProductPosterTask;

use App\Repositories\ImageRepository;

use App\Models\{
  Product,
  Image,
};

class ChangeProductPosterAction extends Action
{
  public static function run(int $product_id, UploadedFile $file) : array
  {
    $product = Product::find($product_id);
    $poster  = ImageRepository::store($file, $product->id);
    ChangeProductPosterTask::run($product, $poster);
    return compact('product');
  }
}
