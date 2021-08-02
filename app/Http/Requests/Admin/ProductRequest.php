<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
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
				'slug' => Str::slug($this->name)
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
			'category_id' => 'required|numeric|exists:categories,id',
			'slug' => 'required|string|unique:products,slug,' . $this->product,
			'name' => 'required|string',
			'description' => 'required|string',
			'image' => 'image',
			'code' => 'required|alpha_dash|unique:products,code,' . $this->product,
			'price' => 'numeric|min:0|nullable',
			'format' => 'required|string',
			'article' => 'required|string|unique:products,article,' . $this->product,
			'count' => 'numeric|min:0|nullable',
			'manufacturer_id' => 'required|numeric|exists:manufacturers,id',
			'color_id' => 'required|numeric|exists:colors,id',
			'thickness_id' => 'required|numeric|exists:thicknesses,id'
		];
	}
}
