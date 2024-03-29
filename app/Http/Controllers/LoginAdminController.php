<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.loginadmin');
    }
    //authentification
    public function authadmin(Request $request)
    {
        $dataValidasi =$request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }else{
            return redirect('/loginadmin')->with('loginError', 'Email atau Password salah!');
        }
    }
    public function signoutAdmin(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/loginadmin');
    }
}
