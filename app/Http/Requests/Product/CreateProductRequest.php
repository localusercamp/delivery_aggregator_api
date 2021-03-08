<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Product;

class CreateProductRequest extends FormRequest
{
  public function authorize() : bool
  {
    return auth()->user()->can('create', Product::class);
  }

  public function rules() : array
  {
    return [
      'title'       => 'required|string|min:2|max:30',
      'price'       => 'required|integer|min:0|max:100000',
      'tags'        => 'required|array',
      'poster'      => 'required|file|mimes:jpg,jpeg,png',
      'description' => 'nullable|string|min:2|max:30',
    ];
  }
}
