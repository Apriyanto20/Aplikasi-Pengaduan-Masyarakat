<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Models\KategoriPengaduan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        $dataMasyarakat = User::where('role', 'Masyarakat')->count();
        $dataKategori   = KategoriPengaduan::count();
        $dataLaporan    = Pengaduan::count();
        $LaporanBaru    = Pengaduan::where('status', 'New')->count();
        $datamasuk      = Pengaduan::all();

        return view('pages.admin.dashboard.index', [
            'tittle'    => 'APM | Dashboard',
            'header'    =>  'Dashboard',
            'breadcrumb1' =>  'Dashboard',
            'breadcrumb2' =>  'Index',
            'Masyarakat'    => $dataMasyarakat,
            'Kategori'      => $dataKategori,
            'LaporanMasuk'  => $dataLaporan,
            'Terbaru'       => $LaporanBaru,
            'datamasuk'       => $datamasuk,
        ]);
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/loginadmin');
    }
}
