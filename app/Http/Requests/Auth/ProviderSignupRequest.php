<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProviderSignupRequest extends FormRequest
{
  public function authorize() : bool
  {
    return true;
  }

  public function rules() : array
  {
    return [
      'phone'    => 'required|string|size:10|unique:user',
      'password' => 'required|string|min:6',
      'code'     => 'required|string|min:6|max:6',
    ];
  }
}
