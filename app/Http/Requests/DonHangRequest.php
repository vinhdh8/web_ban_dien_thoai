<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonHangRequest extends FormRequest
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
            'ten_nguoi_nhan'=>'required|string|max:255',
            'email_nguoi_nhan'=>'required|email|max:255',
            'so_dien_thoai'=>'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'dia_chi_nhan'=>'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'ten_nguoi_nhan.required'=>'Tên người nhận không được bỏ trống',
            'ten_nguoi_nhan.string'=>'Tên người nhận là 1 chuỗi kí tự',
            'ten_nguoi_nhan.max'=>'Tên người nhận tối đa 255 kí tự',
            'email_nguoi_nhan.required'=>'Email không được bỏ trống',
            'email_nguoi_nhan.email'=>'Email không đúng định dạng',
            'email_nguoi_nhan.max'=>'Email tối đa 255 kí tự',
            'so_dien_thoai.required'=>'Số điện thoại không được bỏ trống',
            'so_dien_thoai.regex'=>'Số điện thoại không đúng định dạng',
            'dia_chi_nhan.required'=>'Địa chỉ không được bỏ trống',
            'dia_chi_nhan.string'=>'Địa chỉ là 1 chuỗi kí tự',
            'dia_chi_nhan.max'=>'Địa chỉ tối đa là 255 kí tự',
        ];
    }
}
