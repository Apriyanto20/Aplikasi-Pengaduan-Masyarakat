<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.pegawai.index', [
            'tittle'    => 'APM | Pegawai',
            'header'    =>  'Pegawai',
            'breadcrumb1' =>  'Pegawai',
            'breadcrumb2' =>  'Index',
            'dataPegawai'  =>  User::where('role', 'Petugas')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.pegawai.create', [
            'tittle'    => 'APM | Pegawai',
            'header'    =>  'Pegawai',
            'breadcrumb1' =>  'Pegawai',
            'breadcrumb2' =>  'Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'textNik'               =>  'required|unique:users,nik',
            'textNama'              =>  'required',
            'selectJenisKelamin'    =>  'required',
            'textNoTelepon'         =>  'required',
            'textAlamat'            =>  'required',
            'textEmail'             =>  'required|unique:users,email',
            'textPassword'          =>  'required',
        ]);
        $dataSimpanPegawai = [
            'nik'   =>  $request->textNik,
            'name'  =>  $request->textNama,
            'jenis_kelamin' =>  $request->selectJenisKelamin,
            'notelepon' =>  $request->textNoTelepon,
            'alamat'    =>  $request->textAlamat,
            'email' =>  $request->textEmail,
            'password'  =>  bcrypt($request->textPassword),
            'role'  =>  'Petugas'
        ];
        // ddd($dataSimpanPegawai);
        User::create($dataSimpanPegawai);
        return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.admin.pegawai.edit', [
            'tittle'    => 'APM | Pegawai',
            'header'    =>  'Pegawai',
            'breadcrumb1' =>  'Pegawai',
            'breadcrumb2' =>  'Edit',
            'dataPegawai'  =>  User::where('id', $id)->first()
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
            'textNik'   =>  'required|unique:users,nik',
            'textNama'  =>  'required',
            'selectJenisKelamin' =>  'required',
            'textNoTelepon' =>  'required',
            'textAlamat'    =>  'required',
            'textEmail' =>  'required|unique:users,email',
            'textPassword'  =>  'required',
        ]);
        $dataSimpanPegawai = [
            'nik'   =>  $request->textNik,
            'name'  =>  $request->textNama,
            'jenis_kelamin' =>  $request->selectJenisKelamin,
            'notelepon' =>  $request->textNoTelepon,
            'alamat'    =>  $request->textAlamat,
            'email' =>  $request->textEmail,
            'password'  =>  bcrypt($request->textPassword),
            'role'  =>  'Petugas'
        ];
        // ddd($dataSimpanPegawai);
        User::where('id', $id)->update($dataSimpanPegawai);
        return redirect('/pegawai');
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
