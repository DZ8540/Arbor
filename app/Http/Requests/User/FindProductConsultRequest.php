<?php

namespace App\Http\Requests\User;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;

class FindProductConsultRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'required|string',
      'phone' => ['required', new Phone],
      'product' => 'required|string',
      'check' => 'required'
    ];
  }

  /**
   * Get the error messages for the defined validation rules.
   *
   * @return array
   */
  public function messages()
  {
    return [
      'name.required' => 'Это поле обязательно!',
      'phone.required' => 'Это поле обязательно!',
      'product.required' => 'Это поле обязательно!',
      'check.required' => 'Это поле обязательно!',
    ];
  }
}
