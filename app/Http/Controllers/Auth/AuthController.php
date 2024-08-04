<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    //Đăng nhập
    public function showFormLogin(){
        return view('auth.login');
    }
    
    public function login(Request $request){
        // $tai_khoans = $request->validate([
        //     'ten_dang_nhap' => ['required', 'string', 'max:255'], 
        //     'password' => ['required', 'string']
        // ]);
        // if(Auth::attempt($tai_khoans)){
        //     return redirect()->intended('/');
        // }
        // return redirect()->back()->withErrors([
        //     'ten_dang_nhap'=>'Tên đăng nhập sai hoặc không tồn tại'
        // ]);

        //khi chưa có trạng thái
        // $rules = [
        //     'ten_dang_nhap'=>'required|string|max:20',
        //     'password'=>'required|string|min:6'
        // ];
        // $massage = [
        //     'ten_dang_nhap.required'=>'Tên đăng nhập không được bỏ trống',
        //     'ten_dang_nhap.max'=>'Tên đăng nhập tối đa 20 ký tự',
        //     'password.required'=>'Mật khẩu không được bỏ trống',
        //     'password.min'=>'Mật khẩu tối thiểu 6 ký tự'
        // ];
        // $validator = Validator::make($request->all(), $rules, $massage);
        // if($validator->fails()){
        //     return redirect()->intended('/login')->withErrors($validator)->withInput();
        // }
        // else{
        //     $ten_dang_nhap = $request->input('ten_dang_nhap');
        //     $password = $request->input('password');
            
        //     if(Auth::attempt(['ten_dang_nhap' => $ten_dang_nhap, 'password' => $password])){
        //         return redirect()->intended('/');
        //     }
        //     else{
        //         Session::flash('loginError', 'Tên đăng nhập hoặc mật khẩu không đúng');
        //         return redirect()->intended('/login');
        //     }
        // }
        $rules = [
            'ten_dang_nhap' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ];

        $messages = [
            'ten_dang_nhap.required' => 'Tên đăng nhập không được bỏ trống',
            'ten_dang_nhap.max' => 'Tên đăng nhập tối đa 20 ký tự',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        $ten_dang_nhap = $request->input('ten_dang_nhap');
        $password = $request->input('password');

        // Xác thực thông tin đăng nhập
        if (Auth::attempt(['ten_dang_nhap' => $ten_dang_nhap, 'password' => $password])) {
            // Kiểm tra trạng thái tài khoản
            $user = Auth::user();
            if ($user->trang_thai == 1) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['Tài khoản của bạn đã bị khóa']);
            }

            return redirect()->intended('/');
        } else {
            Session::flash('loginError', 'Tên đăng nhập hoặc mật khẩu không đúng');
            return redirect()->route('login');
        }
    }
    //Đăng kí
    public function showFormRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        // $data = $request->validate([
        //     'ho_va_ten' => 'required|string',
        //     'ten_dang_nhap' => 'required|string|max:255',
        //     'password' => 'required|string|min:8',
        //     'email' => 'required|string|email|max:255',
        //     'vai_tro'=>'0'
        // ]);
        // $tai_khoans = User::query()->create($data);
        // Auth::login($tai_khoans);
        // return redirect()->intended('/');

        $allRequest = $request->all();
        $validator = $this->validator($allRequest);
        if ($validator->fails()) {
            // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return redirect()->intended('/register')->withErrors($validator)->withInput();
        } else {   
            // Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl
            if( $this->create($allRequest)) {
                Session::flash('registerSuccess', 'Đăng ký tài khoản thành công!');
                return redirect()->intended('/login');
            } else {
                // Insert thất bại sẽ hiển thị thông báo lỗi
                Session::flash('registerError', 'Đăng ký thành viên thất bại!');
                return redirect()->intended('/register');
            }
        }
    }
    protected function validator(array $data){
        return Validator::make($data, [
            'ho_va_ten' => 'required|string',
            'ten_dang_nhap' => 'required|string|max:20|unique:users,ten_dang_nhap',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|max:255|unique:users,email',
        ],
        [
            'ho_va_ten.required' =>'Họ và tên không được bỏ trống',
            'ten_dang_nhap.required'=>'Tên đăng nhập không được bỏ trống',
            'ten_dang_nhap.max'=>'Tên đăng nhập tối đa 20 ký tự',
            'ten_dang_nhap.unique'=>'Tên đăng nhập đã tồn tại',
            'password.required'=>'Mật khẩu không được bỏ trống',
            'password.min'=>'Mật khẩu tối thiểu 8 ký tự',
            'email.required'=>'Email không được bỏ trống',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
        ]);
    }
    protected function create(array $data){
        return User::create([
            'ho_va_ten'=>$data['ho_va_ten'],
            'ten_dang_nhap'=>$data['ten_dang_nhap'],
            'password'=>bcrypt($data['password']),
            'email'=>$data['email'],
        ]);
    }
    //Đăng xuất

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
