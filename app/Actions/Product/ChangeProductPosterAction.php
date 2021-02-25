<?php

namespace App\Actions\Product;

use Illuminate\Http\UploadedFile;

use App\Contracts\Action;
use App\Tasks\ChangeProductPosterTask;

use App\Repositories\PosterRepository;

use App\Models\{
  Product,
  Poster,
};

class ChangeProductPosterAction extends Action
{
  public static function run(int $product_id, UploadedFile $file) : array
  {
    $product = Product::find($product_id);
    $poster  = PosterRepository::store($file, $product->id);
    ChangeProductPosterTask::run($product, $poster);
    return compact('product');
  }
}
