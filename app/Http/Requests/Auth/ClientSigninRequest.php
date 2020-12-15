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
      'user.phone'    => 'required|string|size:10',
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
          $validator->errors()->add('message', 'Неправильный номер телефона или пароль.');
        });
      }
    }
  }
}
