<?php
namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

use App\Http\Requests\GetTagListRequest;

use App\Actions\List\GetTagListAction;

class TagController extends Controller
{
  public function list(GetTagListRequest $request)
  {
    $input  = $request->validated();
    $output = GetTagListAction::run($input);
    return response()->json($output, 200);
  }
}
