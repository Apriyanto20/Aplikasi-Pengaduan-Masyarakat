<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.kategori.index', [
            'tittle'    => 'APM | Kategori',
            'header'    =>  'Kategori',
            'breadcrumb1' =>  'Kategori',
            'breadcrumb2' =>  'Index',
            'dataKategori'  =>  KategoriPengaduan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kategori.create',[
            'tittle'    => 'APM | Kategori Create',
            'header'    =>  'Kategori Create',
            'breadcrumb1' =>  'Kategori Create',
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
    {$request->validate([
        'textNamaKategori'               =>  'required',
        'textDeskripsi'                  =>  'required',
    ]);
    $dataSimpanKategori = [
        'namacategory'   =>  $request->textNamaKategori,
        'deskripsi'  =>  $request->textDeskripsi,
    ];
        // ddd($dataSimpanKategori);
        KategoriPengaduan::create($dataSimpanKategori);
        return redirect('/kategori');
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
        return view('pages.admin.kategori.edit', [
            'tittle'    => 'APM | Kategori Edit',
            'header'    =>  'Kategori Edit',
            'breadcrumb1' =>  'Kategori Edit',
            'breadcrumb2' =>  'Edit'
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
        //
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
