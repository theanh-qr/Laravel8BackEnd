<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'price_sale' => 'required | max:100 | min:0',
            'file' => 'required'
        ];
    }

    public function messages() : array
    {
        return  [
            'name.required' => 'Vui lòng nhập  tên danh mục',
            'price.required' => 'Vui lòng nhập giá của sản phẩm',
            'price_sale.required' => 'Vui lòng nhập giảm giá',
            'price_sale.max:100' => 'Giảm giá lớn nhất là 100%',
            'price_sale.min:0' => 'Giảm giá nhỏ nhất là 0%',
            'file.required' => 'Ảnh không được để trống'
        ];
    }
}