<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignoutRequest extends FormRequest
{
  public function authorize() : bool
  {
    return (bool) $this->user();
  }
}
