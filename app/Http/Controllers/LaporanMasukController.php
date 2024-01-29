<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LaporanMasukController extends Controller
{
    public function index()
    {
        return view('pages.admin.laporan.index', [
            'tittle'    => 'APM | Laporan Masuk',
            'header'    =>  'Laporan Masuk',
            'breadcrumb1' =>  'Laporan Masuk',
            'breadcrumb2' =>  'Index'
        ]);
    }

    public function detail()
    {
        return view('pages.admin.laporan.detail', [
            'tittle'    => 'APM | Laporan Masuk',
            'header'    =>  'Laporan Masuk',
            'breadcrumb1' =>  'Laporan Masuk',
            'breadcrumb2' =>  'Detail'
        ]);
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


