<?php

namespace App\Actions\Territory;

use App\Contracts\Action;
use App\Models\Territory;

final class GetTerritoryListAction extends Action
{
  /**
   * Получает список территорий
   */
  public static function run() : array
  {
    $territory_list = Territory::get();
    return compact('territory_list');
  }
}
