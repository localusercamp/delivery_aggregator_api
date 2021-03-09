<?php

namespace App\Http\Controllers\App;

use App\Actions\Company\CreateCompanyAction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CreateCompanyRequest;

class CompanyController extends Controller
{
  public function create(CreateCompanyRequest $request)
  {
    $input = $request->all();
    $title        = $input['title'];
    $territory_id = $input['territory_id'];
    $address      = $input['address'];
    $inn          = $input['inn'];
    $website      = $input['website'] ?? null;
    $head         = $input['head'];
    $head_post    = $input['head_post'];
    $type_id      = $input['type_id'];

    $output = CreateCompanyAction::run($title, $address, $inn, $website, $head, $head_post, $territory_id, $type_id);
    return response()->json($output);
  }
}
