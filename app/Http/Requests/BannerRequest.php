<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'ngay_dang' => 'required|date|before_or_equal:today',
            'san_pham_id' => 'required|exists:san_phams,id',
        ];
    }

    public function messages(): array
    {
        return [
           'hinh_anh.required' => 'Hình ảnh là bắt buộc.',
            'hinh_anh.image' => 'Hình ảnh phải là một tập tin ảnh.',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc webp.',
            'hinh_anh.max' => 'Hình ảnh không được vượt quá 2048 KB.',

            'ngay_dang.required' => 'Ngày đăng là bắt buộc.',
            'ngay_dang.date' => 'Ngày đăng phải là một ngày hợp lệ.',
            'ngay_dang.before_or_equal' => 'Ngày đăng không được lớn hơn ngày hiện tại.',

            'san_pham_id.required' => 'Danh mục là bắt buộc.',
            'san_pham_id.exists' => 'Danh mục không hợp lệ.',
        ];
    }
}
