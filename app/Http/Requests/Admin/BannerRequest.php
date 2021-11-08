<?php

namespace App\Http\Requests\Admin;

use App\Models\Banner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BannerRequest extends FormRequest
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

  // TODO: Не сохраняется значение "нет"
  protected function prepareForValidation()
	{
		if ($this->is_additional) {
			if (Banner::where('is_additional', 1)->exists())
        $this->merge([ 'is_additional' => 0 ]);
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
			'title' => 'required|string',
			'description' => 'required|string',
			'link' => 'required|string',
			'image' => 'image',
      'is_additional' => 'boolean'
		];
	}
}
