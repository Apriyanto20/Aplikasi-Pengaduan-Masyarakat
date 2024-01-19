<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerateReportController extends Controller
{
    public function index()
    {
        return view('pages.admin.generatereport.index',[
            'tittle'    => 'APM | Generate Report',
            'header'    =>  'Generate Report',
            'breadcrumb1' =>  'Generate Report',
            'breadcrumb2' =>  'Index'
        ]);
    }
    public function periode()
    {
        return view('pages.admin.generatereport.generateperiode', [
            'tittle'    => 'APM | Generate Periode',
            'header'    =>  'Generate Periode',
            'breadcrumb1' =>  'Generate Periode',
            'breadcrumb2' =>  'Periode'
        ]);
    }
    public function rekap()
    {
        return view('pages.admin.generatereport.generaterekap', [
            'tittle'    => 'APM | Generate Rekap',
            'header'    =>  'Generate Rekap',
            'breadcrumb1' =>  'Generate Rekap',
            'breadcrumb2' =>  'Rekap'
        ]);
    }
}
