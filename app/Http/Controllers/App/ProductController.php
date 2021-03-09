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
use App\Entities\FormDataManager;

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
    $input = $request->all();
    $title       = $input['title'];
    $description = $input['description'] ?? null;
    $price       = $input['price'];
    $tags        = FormDataManager::unpackIdArray($input['tags']);
    $poster      = $input['poster'];

    $output = CreateProductAction::run($title, $description, $price, $tags, $poster);
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
