<?php

namespace App\Http\Controllers\App;

use App\Actions\Utils\GetCompaniesByInnAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Utils\GetCompaniesByInnRequest;

class UtilsController extends Controller
{
  public function getCompaniesByInn(GetCompaniesByInnRequest $request)
  {
    $input = $request->validated();
    $inn = $input['inn'];

    $output = GetCompaniesByInnAction::run($inn);
    return response()->json($output);
  }
}
