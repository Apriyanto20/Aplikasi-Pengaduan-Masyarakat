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
        if(Auth::attempt($dataValidasi)){
            $request->session()->regenerate();
            $role = auth()->user()->role;
            if ($role == 'Masyarakat'){
                return redirect()->intended('/pengaduanku');
            }
        }else{
            return back();
        }
    }
}
