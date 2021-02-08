<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ClientSigninRequest extends FormRequest
{
  public function authorize() : bool
  {
    dd(!$this->request());
    auth()->validate();
    return true;
  }

  public function rules() : array
  {
    return [
      'phone'    => 'required|string|size:10',
      'password' => 'required|string|min:6',
    ];
  }
}
