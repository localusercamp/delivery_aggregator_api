<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;

class GetTagListRequest extends FormRequest
{
  public function authorize() : bool
  {
    return true;
  }

  public function rules() : array
  {
    return [];
  }
}
