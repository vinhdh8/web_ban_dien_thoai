<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiDanhMucRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
   
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message'=> 'Lỗi thêm danh mục',
            'status'=> false,
            'errors'=>$validator->errors(),
        ],400));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ten_danh_muc' => 'required|string|max:255'
        ];
    }

    public function messages():array
    {
        return [
           'ten_danh_muc.required' => 'Danh mục không được trống',
           'ten_danh_muc.max'=>'Danh mục không quá 255 từ'
        ];
    }
}
