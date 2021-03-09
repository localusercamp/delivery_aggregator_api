<?php

namespace App\Http\Controllers\App;

use App\Actions\CompanyType\GetCompanyTypeListAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyType\CompanyTypeListRequest;

class CompanyTypeController extends Controller
{
  public function list(CompanyTypeListRequest $request)
  {
    $output = GetCompanyTypeListAction::run();
    return response()->json($output);
  }
}
