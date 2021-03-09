<?php

namespace App\Http\Requests\Company;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return auth()->user()->can('create', Company::class);
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'title'        => 'required|string',
      'address'      => 'required|string',
      'inn'          => 'required|string|min:10|max:12',
      'website'      => 'nullable|string',
      'head'         => 'required|string',
      'head_post'    => 'required|string',
      'territory_id' => 'required|integer',
      'type_id'      => 'required|integer',
    ];
  }
}
