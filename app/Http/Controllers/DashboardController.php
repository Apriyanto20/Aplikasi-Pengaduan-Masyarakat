<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Models\KategoriPengaduan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $dataMasyarakat = User::where('role', 'Masyarakat')->count();
        $dataKategori   = KategoriPengaduan::count();
        $dataLaporan    = Pengaduan::count();
        $LaporanBaru    = Pengaduan::where('status', 'New')->count();

        return view('pages.admin.dashboard.index', [
            'tittle'    => 'APM | Dashboard',
            'header'    =>  'Dashboard',
            'breadcrumb1' =>  'Dashboard',
            'breadcrumb2' =>  'Index',
            'Masyarakat'    => $dataMasyarakat,
        'Kategori'      => $dataKategori,
        'LaporanMasuk'  => $dataLaporan,
        'Terbaru'       => $LaporanBaru
        ]);
    }
    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/loginadmin');
    }

    public function DataLaporan(Request $request)
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
