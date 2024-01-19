<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}


