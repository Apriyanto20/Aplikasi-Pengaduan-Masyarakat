<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use App\Models\KategoriPengaduan;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('pages.user.profile.index');
    }
    // public function dataMasuk()
    // {
    //     return view('pages.admin.dashboard.index', [
    //         'dataMasuk'     => Pengaduan::all(),
    //         'dataKategori'  =>  KategoriPengaduan::all()
    //     ]);
    // }
}
