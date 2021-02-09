<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Product;

class CreateProductRequest extends FormRequest
{
  public function authorize() : bool
  {
    return $this->request->user()->can('create', Product::class);
  }

  public function rules() : array
  {
    return [];
  }
}
