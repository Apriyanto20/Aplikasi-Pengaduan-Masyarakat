<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $useraktif=auth()->user()->id;
        return view('pages.admin.profile.index', [
            'tittle'    => 'APM | Profile',
            'header'    =>  'Profile',
            'breadcrumb1' =>  'Profile',
            'breadcrumb2' =>  'Index',
            'dataAdmin'   =>  User::where('id',$useraktif)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.admin.profile.edit', [
            'tittle'    => 'APM | Profile',
            'header'    =>  'Profile',
            'breadcrumb1' =>  'Profile',
            'breadcrumb2' =>  'Index',
            'dataAdmin'   =>  User::where('id',$id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'textNik'   =>  'required',
            'textNama'  =>  'required',
            'selectJenisKelamin' =>  'required',
            'textNoTelepon' =>  'required', 'min:12',
            'textAlamat'    =>  'required',
            'textEmail' =>  'required',
            // 'textPassword'  =>  'required', 'min:6'
        ]);
        $dataUpdateProfile = [
            'nik'   =>  $request->textNik,
            'name'  =>  $request->textNama,
            'jenis_kelamin' =>  $request->selectJenisKelamin,
            'notelepon' =>  $request->textNoTelepon,
            'alamat'    =>  $request->textAlamat,
            'email' =>  $request->textEmail,
            // 'password'  =>  bcrypt($request->textPassword),
            'role'  =>  'Admin'
        ];
        User::where('id', $id)->update($dataUpdateProfile);
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
