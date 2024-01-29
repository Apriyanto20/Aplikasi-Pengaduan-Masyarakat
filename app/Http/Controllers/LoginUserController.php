<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('pages.user.index');
    }

    public function auth(Request $request)
    {
        $dataValidasi =$request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }else{
            return redirect('/');
        }
    }
}
