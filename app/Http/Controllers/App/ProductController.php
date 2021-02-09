<?php
namespace App\Http\Controllers\App;

use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;

use App\Actions\{
  Lists\GetProductListAction,
  Product\CreateProductAction,
};

use App\Http\Requests\Product\{
  CreateProductRequest,
  GetProductListRequest,
};

class ProductController extends Controller
{
  /**
   * Список всех продуктов
   */
  public function list(GetProductListRequest $request) : JsonResponse
  {
    $output = GetProductListAction::run();
    return response()->json($output, 200);
  }

  public function create(CreateProductRequest $request) : JsonResponse
  {
    $input  = $request->validated();
    $output = CreateProductAction::run();
    return response()->json($output, 200);
  }
}
