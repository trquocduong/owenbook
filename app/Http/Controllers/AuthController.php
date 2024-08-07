<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function login(){
        return view('users.auth.login');
    }
    public function login_post(Request $request){
        $crenden = $request->validate(
            [
                'email' =>'required|email',
                'password' =>'required',
            ]
        );
        if(Auth::attempt($crenden)){
            $request->session()->regenerate();
            $user = Auth::user();
    
            // Store the authenticated user in the session
            Session::put('user', $user);
            if(Auth::attempt($crenden)){
                $user=Auth::user();
                if($user->role==1){
                 return redirect()->route("dashboard")->with('success','Bạn đã đăng nhập vào trang quản trị  ');;
                }
                else{
                 return redirect()->route("home")->with('success','Bạn đã đăng nhập thành công');   
             }
         }
        }else{
            $existingUser =User::where('email', $crenden['email'])->first();
        if ($existingUser) {
            return back()->withErrors([
                'password' => 'Mật khẩu của bạn đã sai',
            ])->withInput($request->only('email'));
        } else {
            return back()->withErrors([
                'email' => 'Email của bạn không đúng',
            ])->withInput($request->only('email'));
            }
        }
    }
    public function register(){
        return view('users.auth.register');
    }
    public function register_post(Request $request){
        $request->validate(
            [
                'name' => 'required|string|max:250',
                'email' => 'required|string|max:250|unique:users,email',
                'password' => 'required|min:5',
            ]
        );
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success','Bạn đã đăng kí thành công !');

    }
    // Đăng xuất
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->with('success','Bạn đã đăng xuất khỏi tài khoản ');

    }

}
