<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ModeratorSigninRequest extends FormRequest
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

  public function withValidator($validator)
  {
    if ($validator->passes()) {
      $credentials = $validator->validated();
      if (!auth()->validate($credentials)) {
        $validator->after(function ($validator) {
          $validator->errors()->add('message', 'Неправильный номер телефона или пароль.');
        });
      }
    }
  }
}
