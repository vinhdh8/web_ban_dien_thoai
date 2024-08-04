<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTinTucRequest extends FormRequest
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
            'tieu_de' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
           
        ];
    }

    public function messages():array
    {
        return [
            'tieu_de.required' => 'Tiêu đề là không được trống.',
            'noi_dung.required' => 'Nội dung là không được trống.',
            'hinh_anh.required' => 'Tải file ảnh lên',
            'hinh_anh.image' => 'Hình ảnh phải là tệp hình ảnh.',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, webp.',
            'hinh_anh.max' => 'Hình ảnh không được lớn hơn 2MB.',
           
         ];
    }
}
