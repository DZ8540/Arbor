<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
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
			'category_type_id' => 'required|numeric|exists:category_types,id',
			'name' => 'required|string',
			'image' => 'image',
			'slug' => 'unique:categories,slug|string'
		];
	}
}