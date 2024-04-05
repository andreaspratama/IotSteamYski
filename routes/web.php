<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\IndikatoriotController;
use App\Http\Controllers\Admin\SubindiiotController;
use App\Http\Controllers\Admin\NkopeteniotController;
use App\Http\Controllers\Admin\IndikatorsteamController;
use App\Http\Controllers\Admin\SubindisteamController;
use App\Http\Controllers\Admin\NkopetensteamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NilaiController;

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
    return view('welcome');
});

// Group Admin
Route::group(['middleware' => ['auth', 'login:ADMIN']], function(){
    Route::prefix('admin')
        ->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboardAdmin');
            // Siswa
            Route::get('/siswa/{id}/delete', [SiswaController::class, 'del'])->name('delete');
            Route::resource('siswa', SiswaController::class);

            // Guru
            Route::get('/guru/{id}/delete', [GuruController::class, 'del'])->name('delete');
            Route::resource('guru', GuruController::class);

            // IOT
            // Indikator IoT
            Route::get('/indikatoriot/{id}/delete', [IndikatoriotController::class, 'del'])->name('delete');
            Route::resource('indikatoriot', IndikatoriotController::class);

            // Sub Indikator IoT
            Route::get('/subindiiot/{id}/delete', [SubindiiotController::class, 'del'])->name('delete');
            Route::resource('subindiiot', SubindiiotController::class);

            // Kompetensi Indikator IoT
            Route::resource('nkopeteniot', NkopeteniotController::class);

            // STEAM
            // Indikator Steam
            Route::get('/indikatorsteam/{id}/delete', [IndikatorsteamController::class, 'del'])->name('delete');
            Route::resource('indikatorsteam', IndikatorsteamController::class);

            // Sub Indikator Steam
            Route::get('/subindisteam/{id}/delete', [SubindisteamController::class, 'del'])->name('delete');
            Route::resource('subindisteam', SubindisteamController::class);

            // Kompetensi Indikator Steam
            Route::resource('nkopetensteam', NkopetensteamController::class);

            // User
            Route::resource('user', UserController::class);
    });
});

// Group User
Route::group(['middleware' => ['auth', 'login:USER']], function(){
    Route::prefix('/')
        ->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboardUser');

            // Nilai IOT
            Route::get('/nilaiIot', [NilaiController::class, 'nilaiIot'])->name('nilaiIot'); //List daftar nilai siswa
            Route::get('/siswaNilaiIot/{id}', [NilaiController::class, 'siswaNilaiIot'])->name('siswaNilaiIot'); //Daftar nilai anak
            Route::get('/masukanNilaiIot/{id}/{idsub}', [NilaiController::class, 'masukanNilaiIot'])->name('masukanNilaiIot'); //Memasukan nilai anak
            Route::post('/masukanNilaiStoreIot/{id}/{idkomp}', [NilaiController::class, 'masukanNilaiStoreIot'])->name('masukanNilaiStoreIot'); //Proses masuk nilai
            Route::get('/editNilaiIot/{id}/{idkomp}', [NilaiController::class, 'editNilaiIot'])->name('editNilaiIot'); //Edit nilai anak
            Route::post('/masukanNilaiUpdateIot/{id}/{idkomp}', [NilaiController::class, 'masukanNilaiUpdateIot'])->name('masukanNilaiUpdateIot'); //Proses edit nilai

             // Nilai STEAM
             Route::get('/nilaiSteam', [NilaiController::class, 'nilaiSteam'])->name('nilaiSteam'); //List daftar nilai siswa
             Route::get('/siswaNilaiSteam/{id}', [NilaiController::class, 'siswaNilaiSteam'])->name('siswaNilaiSteam'); //Daftar nilai anak
             Route::get('/masukanNilaiSteam/{id}/{idsub}', [NilaiController::class, 'masukanNilaiSteam'])->name('masukanNilaiSteam'); //Memasukan nilai anak
             Route::post('/masukanNilaiStoreSteam/{id}/{idkomp}', [NilaiController::class, 'masukanNilaiStoreSteam'])->name('masukanNilaiStoreSteam'); //Proses masuk nilai
             Route::get('/editNilaiSteam/{id}/{idkomp}', [NilaiController::class, 'editNilaiSteam'])->name('editNilaiSteam'); //Edit nilai anak
             Route::post('/masukanNilaiUpdateSteam/{id}/{idkomp}', [NilaiController::class, 'masukanNilaiUpdateSteam'])->name('masukanNilaiUpdateSteam'); //Proses edit nilai

            // Download Nilai
            Route::get('/downloadNilai/{id}', [NilaiController::class, 'downloadNilai'])->name('downloadNilai'); //Download Nilai
        });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
