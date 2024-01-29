<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.user.index');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'textNik'   =>  'required|unique:users,nik',
            'textNama'  =>  'required',
            'selectJenisKelamin'    =>  'required',
            'textNomorTelepon'  =>  'required',
            'textAlamat'    =>  'required',
            'textEmail'     =>  'required|unique:users,email',
            'textPassword'  =>  'required'
        ]);

        $dataRegister   =   [
            'nik'   =>  $request->textNik,
            'name'  =>  $request->textNama,
            'jenis_kelamin' =>  $request->selectJenisKelamin,
            'notelepon'     =>  $request->textNomorTelepon,
            'alamat'        =>  $request->textAlamat,
            'email'         =>  $request->textEmail,
            'password'      =>  bcrypt($request->textPassword),
            'role'          =>  'Masyarakat'
        ];
        User::create($dataRegister);
        return redirect('/');
    }
}
