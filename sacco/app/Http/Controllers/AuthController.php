<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        $data['meta_title']='Login';
        return view('Auth.login',$data);
    }
    public function login_post(Request $request)
    {
        // dd($request->all());
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true)){
            if(Auth::User()->is_role=='1'){
                return redirect()->intended('admin/dashboard');
            }else if(Auth::User()->is_role=='0'){
                return redirect()->intended('staff/dashboard');
            }else{
                return redirect()->back()->with('error','please enter correct details!');
            }
        }else{
            return redirect()->back()->with('error','please enter correct details!');
 
        }
    }

    public function register(Request $request)
    {
        $data['meta_title']='Register';
        return view('Auth.register',$data);
    }
    

    public function forgot(Request $request)
    {
        $data['meta_title']='forgot';
        return view('Auth.forgot',$data);
    }
    public function forgot_post(Request $request)
{
    $data['meta_title'] = 'forgot';
    $count = User::where('email', '=', $request->email)->count();

    if ($count > 0) {
        $user = User::where('email', '=', $request->email)->first();
        $random_pass = rand(111111, 999999);
        $user->password = Hash::make($random_pass);
        $user->save();
        $user->random_pass=$random_pass;
        dd($random_pass);
        Mail::to($user->email)->send(new ForgotPasswordMail($user));

        return redirect()->back()->with('success', 'Password has been sent to your email.');
    } else {
        return redirect()->back()->with('error', 'Email not found.');
    }
}
    

    public function register_post(Request $request)
    {
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha'
        ]);
        
        $user = new User;
        $user->name = trim($request->input('name'));
        $user->lastname = trim($request->input('lastname'));
        $user->email = trim($request->input('email'));
        $user->password = Hash::make($request->input('password'));
        $user->remember_token = Str::random(50);
        $user->save();
        return redirect('/')->with('success','register successfully!');
    }


    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('math')]);
    }

    
    public function logout(){
        Auth::logout();
        return redirect(url('/'));
    }
}
