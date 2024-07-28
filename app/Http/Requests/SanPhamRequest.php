<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            'ten_san_pham' => 'required|string|max:255|unique:san_phams,ten_san_pham',
            'ten_san_pham' => 'required|string|max:255',
            'gia' => 'required|numeric|max:999999999',
            'hinh_anh' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'so_luong' => 'required|integer|min:0',
            'mo_ta' => 'required|string',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
            'gia_khuyen_mai'=>'numeric|min:0|lt:gia'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'ten_san_pham.required' => 'Tên sản phẩm là bắt buộc.',
            'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'ten_san_pham.unique' => 'Tên sản phẩm đã tồn tại.',

            'gia.required' => 'Giá là bắt buộc.',
            'gia.numeric' => 'Giá phải là số.',
            'gia.max' => 'Giá không được vượt quá 999999999.',

            'hinh_anh.required' => 'Hình ảnh là bắt buộc.',
            'hinh_anh.image' => 'Hình ảnh phải là một tập tin ảnh.',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc webp.',
            'hinh_anh.max' => 'Hình ảnh không được vượt quá 2048 KB.',

            'so_luong.required' => 'Số lượng là bắt buộc.',
            'so_luong.integer' => 'Số lượng phải là số nguyên.',
            'so_luong.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',

            'mo_ta.required' => 'Mô tả là bắt buộc.',
            'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',

            'danh_muc_id.required' => 'Danh mục là bắt buộc.',
            'danh_muc_id.exists' => 'Danh mục không hợp lệ.',

            'gia_khuyen_mai.numeric'=>'Giá khuyến mãi phải là số',
            'gia_khuyen_mai.min'=>'Giá khuyến mãi phải lớn hơn hoặc bằng 0',
            'gia_khuyen_mai.lt'=>'Giá khuyến mãi phải nhỏ hơn giá gốc',
        ];
    }
}
