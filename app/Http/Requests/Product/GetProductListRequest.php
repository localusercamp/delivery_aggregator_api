<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Product;

class GetProductListRequest extends FormRequest
{
  public function authorize() : bool
  {
    return auth()->user()->can('viewAny', Product::class);
  }

  public function rules() : array
  {
    return [];
  }
}
