<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ModeratorSignupRequest extends FormRequest
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
    ];
  }
}
