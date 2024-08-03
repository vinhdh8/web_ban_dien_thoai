<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function thanhVien()
    {
        $listTaiKhoan = User::where('trang_thai', 0)->get();
        return view('admin.taikhoan.user', compact('listTaiKhoan'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listTaiKhoan = User::where('trang_thai', 0)->get();
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
                    'so_dien_thoai' => 'required|unique:users,so_dien_thoai|regex:/^0\d{9}$/',
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
        $request->validate(
            [
                'ho_va_ten' => 'required|string|max:255',
                'ten_dang_nhap' => [
                    'required',
                    'string',
                    'max:255',
                    'unique:users,ten_dang_nhap,' . $id,
                    'regex:/[a-zA-Z]/',
                ],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:users,email,' . $id,
                    'regex:/^[\w\.-]+@(fpt\.edu\.vn|gmail\.com)$/',
                ],
                'password' => 'required|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
                'vai_tro' => 'required|in:0,1',
                'so_dien_thoai' => 'required|regex:/^0\d{9}$/|unique:users,so_dien_thoai,' .$id,
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
                'so_dien_thoai.unique' => 'Số điện thoại đã tồn tại',

                'dia_chi.required' => 'Địa chỉ không được trống',
                'dia_chi.max' => 'Địa chỉ không quá 255 ký tự',
            ]
        );
        $user = User::query()->findOrFail($id);

        $user->update([
            'ho_va_ten'=>$request->ho_va_ten,
            'ten_dang_nhap'=>$request->ten_dang_nhap,
            'email'=>$request->email,
            'password'=>$request->password,
            'vai_tro'=>$request->vai_tro,
            'so_dien_thoai'=>$request->so_dien_thoai,
            'dia_chi'=>$request->dia_chi,
        ]);

        //  người dùng hiện tại là Admin đang được cập nhật và vai trò bị thay đổi thành thành viên lập tức bị logout và về trang người dùng và trờ thành người dùng
    if (Auth::id() == $user->id && $user->vai_tro == 0) {
        Auth::logout();
        return redirect()->route('client.index')->with('success', 'Vai trò của bạn đã thay đổi, bạn đã bị đăng xuất.');
    }

        if ($user->vai_tro == 0) {
            return redirect()->route('admin.thanhVien')->with('success', 'Sửa thành công người dùng');
        } elseif ($user->vai_tro == 1) {
            return redirect()->route('admin.taikhoan.index')->with('success', 'Sửa thành công thành viên Admin');
        }
    }

    public function lock( $id){
        $user = User::query()->findOrFail($id);
        $user->trang_thai = 1;
        $user->save();

        if (Auth::id() == $user->id && $user->trang_thai == 1) {
            Auth::logout();
            return redirect()->route('client.index')->with('success', 'Tài khoản của bạn đã bị khóa, bạn đã bị đăng xuất.');
        }

        if ($user->vai_tro == 0) {
            return redirect()->route('admin.thanhVien')->with('success', 'Tài khoản đã bị khóa muốn mở hãy sang trang tài khoản bị khóa');
        } elseif ($user->vai_tro == 1) {
            return redirect()->route('admin.taikhoan.index')->with('success', 'Tài khoản đã bị khóa muốn mở hãy sang trang tài khoản bị khóa');
        }
    }

    public function listkhoaTK(){
        $listTaiKhoan = User::where('trang_thai', 1)->get(); // Lọc các tài khoản bị khóa
        return view('admin.taikhoan.khoatk', compact('listTaiKhoan'));
    }

    public function openTK($id)
    {
        $user = User::query()->findOrFail($id);
        $user->trang_thai = 0;
        $user->save();

        $username = $user->ten_dang_nhap;

        if ($user->vai_tro == 0) {
            return redirect()->route('admin.thanhVien')->with('success', 'Tài khoản người dùng  '.$username .' đã được mở lại');
        } elseif ($user->vai_tro == 1) {
            return redirect()->route('admin.taikhoan.index')->with('success', 'Tài khoản quản trị viên '.$username .' đã được mở lại');
        }
    }
}
