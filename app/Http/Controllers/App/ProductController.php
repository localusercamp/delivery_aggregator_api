<?php
namespace App\Http\Controllers\App;

use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;

use App\Actions\Product\{
  GetProductListAction,
  CreateProductAction,
  ChangeProductPosterAction
};

use App\Http\Requests\Product\{
  CreateProductRequest,
  GetProductListRequest,
  ChangePropductPosterRequest,
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
    $title       = $input['title'];
    $description = $input['description'];
    $price       = $input['price'];
    $tags        = $input['tags'];

    $output = CreateProductAction::run($title, $description, $price, $tags);
    return response()->json($output, 200);
  }

  public function changePoster(ChangePropductPosterRequest $request, int $id) : JsonResponse
  {
    $input  = $request->validated();
    $poster = $input['poster'];

    $output = ChangeProductPosterAction::run($id, $poster);
    return response()->json($output, 200);
  }
}
