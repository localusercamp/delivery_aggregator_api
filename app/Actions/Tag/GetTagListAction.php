<?php

namespace App\Actions\Tag;

use App\Contracts\Action;

use App\Models\Tag;

class GetTagListAction extends Action
{
  public static function run() : array
  {
    $tag_list = Tag::get();
    return compact('tag_list');
  }
}
