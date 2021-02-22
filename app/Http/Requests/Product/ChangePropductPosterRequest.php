<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Product;

class ChangePropductPosterRequest extends FormRequest
{
  public function authorize() : bool
  {
    return auth()->user()->can('update', Product::findOrFail($this->route('id')));
  }

  public function rules() : array
  {
    return [
      'poster' => 'required|file|mimes:jpg,jpeg,png',
    ];
  }
}
