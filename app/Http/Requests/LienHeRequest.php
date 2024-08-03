<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LienHeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ho_va_ten' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^[\w\.-]+@(fpt\.edu\.vn|gmail\.com)$/',
            ],
            'so_dien_thoai' => 'required|regex:/^0\d{9}$/',
            'noi_dung' => 'required|string',
            'ngay_gui' => 'required|date|before_or_equal:today',
        ];
    }

    public function messages(): array
    {
        return [
            'ho_va_ten.required' => 'Họ và tên không được trống',
            'ho_va_ten.max' => 'Họ và tên không quá 255 ký tự',


            'email.required' => 'Email không được trống',
            'email.regex' => 'Email không hợp lệ',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email không quá 255 ký tự',

            'so_dien_thoai.required' => 'Số điện thoại không được trống',
            'so_dien_thoai.regex' => 'Số điện thoại phải là số và 10 chữ số  bắt đầu bằng số 0.',

            'noi_dung.required' => 'Nội dung không được trống',
            'ngay_gui.required' => 'Ngày đăng là bắt buộc.',
            'ngay_gui.date' => 'Ngày đăng phải là một ngày hợp lệ.',
            'ngay_gui.before_or_equal' => 'Ngày đăng không được lớn hơn ngày hiện tại.',

        ];
    }
}
