<?php

namespace App\Tasks;

use App\Models\{
  Product,
  Image,
};

class ChangeProductPosterTask extends Task
{
  public static function run(Product $product, Image $poster) : void
  {
    if ($product->poster) {
      $product->poster->deletePublicSource();
      $product->poster->delete();
    }

    $product->poster_id = $poster->id;
    $product->save();
  }
}
