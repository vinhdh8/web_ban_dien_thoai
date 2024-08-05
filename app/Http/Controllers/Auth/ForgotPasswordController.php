<?php
namespace App\Http\Controllers\Auth; 
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Carbon\Carbon; 
use App\Models\User; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm(): View
    {
        return view('auth.forgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request): RedirectResponse
    {
    $request->validate([
        'email' => 'required|email|exists:users',
    ],
    [
        'email.required' => 'Email không được bỏ trống!',
        'email.email' => 'Email không đúng định dạng!',
    ]);

    $token = Str::random(64);

    DB::table('password_resets')->insert([
        'email' => $request->email, 
        'token' => $token, 
        'created_at' => Carbon::now()
    ]);

    Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
        $message->to($request->email);
        $message->subject('Đổi mật khẩu');
    });

    return back()->with('message', 'Chúng tôi đã gửi email liên kết đặt lại mật khẩu của bạn!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token): View
    { 
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ],
        [
            'email.required' => 'Email không được bỏ trống!',
            'email.email' => 'Email không đúng định dạng!',
            'password.required' => 'Mật khẩu không được bỏ trống!',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự!',
            'password.confirmed' => 'Mật khẩu nhập lại không đúng!',
            'password_confirmation.required' => 'Nhập lại mật khẩu không được bỏ trống!'
        ]);

        $updatePassword = DB::table('password_resets')
        ->where([
        'email' => $request->email, 
        'token' => $request->token
        ])
        ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'token không hợp lệ!');
        }

        $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        if(Auth::check()){
            return redirect()->route('client.profile.index')->with('message', 'Bạn đã đổi mật khẩu thành công!');
        }else{
            return redirect('/login')->with('message', 'Bạn đã đổi mật khẩu thành công!');
        }
      }
}	