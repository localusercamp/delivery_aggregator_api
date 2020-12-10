<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SellerSigninRequest extends FormRequest
{
  public function authorize() : bool
  {
    return true;
  }

  public function rules() : array
  {
    return [
      'user.email'    => 'required|string|email:rfc,strict,filter',
      'user.password' => 'required|string|min:6',
    ];
  }

  public function withValidator($validator)
  {
    if ($validator->passes()) {
      $data = $validator->validated();
      $user = $data['user'];
      if (!auth()->validate($user)) {
        $validator->after(function ($validator) {
          $validator->errors()->add('message', 'Неправильный электронный адрес или пароль.');
        });
      }
    }
  }
}
