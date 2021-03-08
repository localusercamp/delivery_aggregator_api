<?php

namespace App\Entities;

class FormDataManager
{
  public static function unpackIdArray(array $array) : array
  {
    return array_map(fn($id) => (int)$id, $array);
  }
}
