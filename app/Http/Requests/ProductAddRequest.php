<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric|min:10000',
            'sale_price' => 'required|numeric|lte:price',
            'upload' => 'mimes:jpeg,jpg,png,gif,webp'
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Tên không được để trống',
            'category_id.required'=>'Vui lòng chọn một danh mục',
            'price.required'=>'Vui lòng nhập giá tiền sản phẩm',
            'price.numeric'=>'Vui lòng nhập đúng định dạng',
            'price.min'=>'Vui lòng nhập số tiền lớn hơn 10000',
            'sale_price.required'=>'Nhập số tiền khuyến mãi nếu không thì nhập bằng số tiền ban đầu',
            'sale_price.numeric'=>'Nhập số tiền đúng định dạng',
            'sale_price.lte'=>'Nhập số tiền km phải ít hơn số tiền ban đầu',
            'upload.mimes'=>'Vui lòng chọn đúng định dạng ảnh',
        ];
    }
}
