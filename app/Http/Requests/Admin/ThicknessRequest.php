<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ThicknessRequest extends FormRequest
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

  protected function prepareForValidation()
  {
    if (empty($this->slug)) {
      $this->merge([
        'slug' => Str::slug($this->name, '_')
      ]);
    }
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'slug' => 'string|unique:thicknesses,slug,' . $this->thickness,
      'name' => 'required|string'
    ];
  }
}