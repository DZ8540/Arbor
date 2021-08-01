<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AboutCompanyRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return Auth::check();
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
      'description' => 'string|nullable',
      'work_start' => 'date_format:H:i|nullable',
      'work_end' => 'date_format:H:i|after:work_start|nullable',
      'email' => 'string|email|nullable',
      'phone' => 'string|nullable',
      'logo' => 'image',
      'adress' => 'string|nullable',
      'vk' => 'string|nullable',
      'facebook' => 'string|nullable',
      'instagram' => 'string|nullable',
      'telegram' => 'string|nullable'
    ];
  }
}