<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProviderSigninRequest extends FormRequest
{
  public function authorize() : bool
  {
    return true;
  }

  public function rules() : array
  {
    return [
      'phone'    => 'required|string|size:10',
      'password' => 'required|string|min:6',
    ];
  }

  public function withValidator($validator)
  {
    if ($validator->passes()) {
      $credentials = $validator->validated();
      if (!auth()->validate($credentials)) {
        $validator->after(function ($validator) {
          $validator->errors()->add('message', 'Неправильный электронный адрес или пароль.');
        });
      }
    }
  }
}
