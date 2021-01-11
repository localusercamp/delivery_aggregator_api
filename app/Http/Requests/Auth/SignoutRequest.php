<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignoutRequest extends FormRequest
{
  public function authorize() : bool
  {
    // dd('d');
    // dd($this->user());
    return (bool) $this->user();
    // return true;
  }

  public function rules() : array
  {
    return [];
  }
}
