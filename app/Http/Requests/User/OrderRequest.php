<?php

namespace App\Http\Requests\User;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
    $min_price = Product::orderBy('price')->select('price')->toBase()->first()->price;
    $delivery_types = ['pickup', 'courier'];
    $pay_types = ['card', 'qr', 'money'];

    return [
      'payer_type' => 'required|string|boolean',

      'name' => 'required|string',
      'email' => 'required|email',
      'phone' => 'required|regex:/[0-9+]{9}/',

      'location' => 'string',
      'index' => 'numeric|nullable',
      'company_name' => 'string',
      'address' => 'string',
      'individual_tax_number' => 'numeric|nullable',
      'reason_code' => 'numeric|nullable',

      'comment' => 'string|size:255|nullable',

      'delivery_type' => ['required', 'string', Rule::in($delivery_types)],
      'delivery_address' => 'required|string',
      'delivery_comment' => 'string|size:255|nullable',
      'pay_type' => ['required', 'string', Rule::in($pay_types)],

      'price' => "required|numeric|min:{$min_price}"
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
      'payer_type.required' => 'Пожалуйста выберите тип плательщика!',
      'payer_type.string' => 'Пожалуйста выберите тип плательщика!',
      'payer_type.boolean' => 'Пожалуйста выберите тип плательщика!',

      'name.required' => 'Заполните это поле!',
      'name.string' => 'Заполните это поле!',

      'email.required' => 'Заполните это поле!',
      'email.email' => 'Это поле должно быть в форме email!',

      'phone.required' => 'Заполните это поле!',
      'phone.regex' => 'Это поле должно содержать только цифры и (не обязательно) +!',

      'location.string' => 'Заполните это поле!',

      'index.numeric' => 'Это поле должно содержать только цифры!',

      'company_name.string' => 'Заполните это поле!',

      'address.string' => 'Заполните это поле!',

      'individual_tax_number.numeric' => 'Это поле должно содержать только цифры!',

      'reason_code.numeric' => 'Это поле должно содержать только цифры!',

      'comment.string' => 'Заполните это поле!',
      'comment.size' => 'Должно быть максимум :size символов!',

      'delivery_type.required' => 'Заполните это поле!',
      'delivery_type.string' => 'Заполните это поле!',
      'delivery_type.in' => 'Заполните это поле!',

      'delivery_address.required' => 'Заполните это поле!',
      'delivery_address.string' => 'Заполните это поле!',

      'delivery_comment.string' => 'Заполните это поле!',
      'delivery_comment.size' => 'Должно быть максимум :size символов!',

      'pay_type.required' => 'Заполните это поле!',
      'pay_type.string' => 'Заполните это поле!',
      'pay_type.in' => 'Заполните это поле!'
    ];
  }
}
