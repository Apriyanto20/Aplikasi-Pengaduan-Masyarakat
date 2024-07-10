<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenerateReportController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanMasukController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserPerngaduanController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.user.index');
});

Route::group(['middleware' => ['auth', 'cekLevel:Admin,Petugas']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/masyarakat', MasyarakatController::class);
    Route::resource('/pegawai', PegawaiController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/laporanmasuk', LaporanMasukController::class);
    Route::get('/generatereport', [GenerateReportController::class, 'index']);
    Route::get('/generatereport/periode', [GenerateReportController::class, 'periode']);
    Route::get('/generatereport/rekap', [GenerateReportController::class, 'rekap']);
    Route::resource('/profile', ProfileController::class);
    // Route::get('/profile/detail', [ProfileController::class, 'detail']);
    Route::post('/logout',[DashboardController::class,'logout']);

});

Route::get('/loginadmin', [LoginAdminController::class, 'index']);

//user
Route::middleware(['masyarakat'])->group(function() {
    Route::get('/profileuser', [UserProfileController::class, 'index']);
    Route::post('/pengaduanku', [LoginUserController::class, 'auth']);
    Route::resource('/pengaduanmasuk', UserPerngaduanController::class);
    Route::post('/',[DashboardController::class,'logoutUser']);
});


Route::get('/', [RegisterController::class, 'index']);
Route::post('/', [RegisterController::class, 'auth']);
Route::get('/', [LoginUserController::class, 'index']);




//authentification admin
Route::post('/authadmin', [LoginAdminController::class, 'authadmin']);
Route::any('/dataTableLaporan',[LaporanMasukController::class, 'getDataLaporan']);
Route::any('/TableLaporan',[DashboardController::class, 'DataLaporan']);
