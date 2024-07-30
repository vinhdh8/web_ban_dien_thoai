<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function thanhVien()
    {
        $listTaiKhoan = User::query()->get();
        return view('admin.taikhoan.user', compact('listTaiKhoan'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listTaiKhoan = User::query()->get();
        return view('admin.taikhoan.admin', compact('listTaiKhoan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.taikhoan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');

            $request->validate(
                [
                    'ho_va_ten' => 'required|string|max:255',
                    'ten_dang_nhap' => 'required|string|max:255|unique:users,ten_dang_nhap|regex:/[a-zA-Z]/',
                    'email' => [
                        'required',
                        'string',
                        'email',
                        'max:255',
                        'unique:users,email',
                        'regex:/^[\w\.-]+@(fpt\.edu\.vn|gmail\.com)$/',
                    ],
                    'password' => 'required|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
                    'vai_tro' => 'required|in:0,1',
                    'so_dien_thoai' => 'required|regex:/^0\d{9}$/',
                    'dia_chi' => 'required|string|max:255',
                ],
                [
                    'ho_va_ten.required' => 'Họ và tên không được trống',
                    'ho_va_ten.max' => 'Họ và tên không quá 255 ký tự',

                    'ten_dang_nhap.required' => 'Tên đăng nhập không được trống',
                    'ten_dang_nhap.regex' => 'Tên đăng nhập phải có một chữ cái',
                    'ten_dang_nhap.max' => 'Tên đăng nhập không quá 255 ký tự',
                    'ten_dang_nhap.unique' => 'Tên đăng nhập đã có',

                    'email.required' => 'Email không được trống',
                    'email.regex' => 'Email không hợp lệ',
                    'email.max' => 'Email không quá 255 ký tự',
                    'email.unique' => 'Email đã có',

                    'password.required' => 'Mật khẩu không được trống',
                    'password.min' => 'Mật khẩu phải ít nhất 8 ký tự',
                    'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, một chữ số và một ký tự đặc biệt.',

                    'vai_tro.required' => 'Vai trò không được trống',
                    'vai_tro.in' => 'Vai trò không hợp lệ',

                    'so_dien_thoai.required' => 'Số điện thoại không được trống',
                    'so_dien_thoai.regex' => 'Số điện thoại phải là số và 10 chữ số  bắt đầu bằng số 0.',

                    'dia_chi.required' => 'Địa chỉ không được trống',
                    'dia_chi.max' => 'Địa chỉ không quá 255 ký tự',
                ]
            );

            $user = User::query()->create($params);
            if ($user->vai_tro == 0) {
                return redirect()->route('admin.thanhVien')->with('success', 'Thành viên đã được thêm thành công.');
            } elseif ($user->vai_tro == 1) {
                return redirect()->route('admin.taikhoan.index')->with('success', 'Admin đã được thêm thành công.');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listUser =  User::query()->findOrFail($id);
        return view('admin.taikhoan.update', ['listUser' => $listUser]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
