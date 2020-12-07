<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'unique:products,name,' . $this->route('product')],
            'price' => ['required', 'numeric'],
            'category_ids' => ['required', 'array']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'category_ids.required' => 'Vui lòng chọn danh mục sản phẩm',
            'category_ids.array' => 'Dữ liệu danh mục không hợp lệ',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'erros' => [
                'status' => false,
                'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'message' => $validator->errors()
            ]
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
