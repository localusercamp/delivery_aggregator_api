<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;

use App\Http\Requests\Tag\GetTagListRequest;

use App\Actions\Tag\GetTagListAction;

class TagController extends Controller
{
  public function list(GetTagListRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $output = GetTagListAction::run($input);
    return response()->json($output, 200);
  }
}
