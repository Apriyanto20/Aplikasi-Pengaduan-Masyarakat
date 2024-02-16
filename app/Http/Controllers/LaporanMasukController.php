<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.admin.laporan.index', [
            'tittle'    => 'APM | Laporan Masuk',
            'header'    =>  'Laporan Masuk',
            'breadcrumb1' =>  'Laporan Masuk',
            'breadcrumb2' =>  'Index'
        ]);
    }

    public function detail($id)
    {
        return view('pages.admin.laporan.detail', [
            'tittle'    => 'APM | Laporan Masuk',
            'header'    =>  'Laporan Masuk',
            'breadcrumb1' =>  'Laporan Masuk',
            'breadcrumb2' =>  'Detail',
            // 'detailUser'=> User::where('id', $id)->first(),
            'detailPengaduan' => Pengaduan::all(),
            // 'kategori'        => KategoriPengaduan::where('namacategory')
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


    public function getDataLaporan(Request $request)
    {
                // Data Dari Controller
        $orderBy = 'pengaduan.id';
        switch ($request->input('order.0.column')) {
            case '0': //untuk inisialisasi data kolom
                $orderBy = 'pengaduan.tanggalpengaduan';
                break;
                case '1':
                    $orderBy = 'pengaduan.judul';
                    break;
                case '2':
                    $orderBy = 'users.name';
                    break;
                case '3':
                    $orderBy = 'kategoripengaduan.namacategory';
                    break;
                case '4':
                    $orderBy = 'pengaduan.status';
                    break;


        }
        // Get Data Nya
        $data = DB::table('pengaduan')
        ->leftJoin('users','pengaduan.masyarakat_id','users.id')
        ->leftJoin('kategoripengaduan','pengaduan.kategori_id','kategoripengaduan.id')
        ->select('pengaduan.*','users.name','kategoripengaduan.namacategory');
        // Function filter dari inputan search
        if($request->input('search.value')!= null){
            $data = $data->where(function($q)use($request){
                $q->WhereRaw('LOWER(pengaduan.judul) like ?',['%'.$request->input('search.value').'%'])
                ->orWhereRaw('LOWER(users.name) like ?',['%'.$request->input('search.value').'%'])
                ->orWhereRaw('LOWER(kategoripengaduan.namacategory) like ?',['%'.$request->input('search.value').'%']);
            });
        }

        $recordsFiltered = $data->get()->count(); //menampilkan jumlah Isi Record yang terfilter
        if($request->input('length')!= -1)$data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy, $request->input('order.0.dir'))->get();
        $recordsTotal = $data->count(); //menampilkan jumlah seluruh data
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal'  => $recordsTotal,
            'recordsFiltered'   => $recordsFiltered,
            'data'  => $data
        ]);

    }
}
