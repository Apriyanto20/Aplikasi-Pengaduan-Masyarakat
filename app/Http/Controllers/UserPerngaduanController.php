<?php

namespace App\Http\Controllers;

use App\Models\gambar;
use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class UserPerngaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.pengaduanku.index', [
            'dataKategori'  => KategoriPengaduan::all(),
            'dataPengaduanku'   =>  Pengaduan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.pengaduanku.create', [
            'dataKategori'  => KategoriPengaduan::all(),
            'dataPengaduanku'   =>  Pengaduan::all()
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
        $dataSimpanPengaduanku = $request->validate([
            'masyarakat_id' => 'required',
            'judul'    => 'required',
            'kategori_id' =>  'required',
            'isipengaduan'  =>  'required',
            'tanggalpengaduan'  =>  'required',
            'gambar'     =>  'required',
            'status'    => 'New'
        ]);
        // dd($dataSimpanPengaduanku);
        Pengaduan::create($dataSimpanPengaduanku);

        $gambar = Pengaduan::latest()->first();
        $files = $request->file('gambar');

        foreach ($files as $multifiles) {
            if ($request->hasfile('gambar')) {
                $nama = hexdec(uniqid());
                $ekstensi = strtolower($multifiles->getClientOriginalExtension());
                $filenamesave = $nama.'.'.$ekstensi;
                $multifiles->move('img-galeri', $filenamesave);
                gambar::create([
                    'id_pengaduan' =>$gambar->id,
                    'gambar' =>$filenamesave
                ]);
            }
        }
            return redirect('/pengaduanku');

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
        //
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
