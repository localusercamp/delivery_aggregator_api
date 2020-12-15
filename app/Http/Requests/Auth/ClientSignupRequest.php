<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ClientSignupRequest extends FormRequest
{
  public function authorize() : bool
  {
    return true;
  }

  public function rules() : array
  {
    return [
      'user.phone'    => 'required|string|size:10|unique:user',
      'user.password' => 'required|string|min:6',
    ];
  }
}
