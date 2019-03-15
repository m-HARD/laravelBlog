<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admins')->except('logout');
    }

    public function ShowLoginForm()
    {
        return view('auth.admin-login');
    }

    public function Login(Request $request){
        
        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required|min:6' 
        ]);

        if(Auth::guard('admins')->attempt(['email' => $request->email , 'password' => $request->password],$request->remember)){
            return redirect()->intended(Route('admin.dashpoard'));
        }
        return redirect()->back()->eithInput($request->only('email','remember'));
    }

    public function logout(){
        Auth::guard('admins')->logout();
        return redirect('/');
    }
}
