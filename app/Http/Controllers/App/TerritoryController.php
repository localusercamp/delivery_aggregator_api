<?php

namespace App\Http\Controllers\App;

use App\Actions\Territory\GetTerritoryListAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Territory\GetTerritoryList;

class TerritoryController extends Controller
{
  public function list(GetTerritoryList $request)
  {
    $output = GetTerritoryListAction::run();
    return response()->json($output);
  }
}
