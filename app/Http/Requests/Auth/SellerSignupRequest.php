<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SellerSignupRequest extends FormRequest
{
  public function authorize() : bool
  {
    return true;
  }

  public function rules() : array
  {
    return [
      'user.email'    => 'required|string|email:rfc,strict,filter|unique:user',
      'user.password' => 'required|string|min:6',
    ];
  }
}
