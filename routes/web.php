<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\IndikatorController;
use App\Http\Controllers\Admin\SubindiController;
use App\Http\Controllers\Admin\NkopetenController;
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

            // Indikator
            Route::get('/indikator/{id}/delete', [IndikatorController::class, 'del'])->name('delete');
            Route::resource('indikator', IndikatorController::class);

            // Sub Indikator
            Route::get('/subindi/{id}/delete', [SubindiController::class, 'del'])->name('delete');
            Route::resource('subindi', SubindiController::class);

            // Kompetensi Indikator
            Route::resource('nkopeten', NkopetenController::class);

            // User
            Route::resource('user', UserController::class);
    });
});

// Group User
Route::group(['middleware' => ['auth', 'login:USER']], function(){
    Route::prefix('user')
        ->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboardUser');

            // Nilai
            Route::get('/nilai', [NilaiController::class, 'nilai'])->name('nilai'); //List daftar nilai siswa
            Route::get('/siswaNilai/{id}', [NilaiController::class, 'siswaNilai'])->name('siswaNilai'); //Daftar nilai anak
            Route::get('/masukanNilai/{id}/{idkomp}', [NilaiController::class, 'masukanNilai'])->name('masukanNilai'); //Memasukan nilai anak
            Route::post('/masukanNilaiStore/{id}/{idkomp}', [NilaiController::class, 'masukanNilaiStore'])->name('masukanNilaiStore'); //Proses masuk nilai
            Route::get('/editNilai/{id}/{idkomp}', [NilaiController::class, 'editNilai'])->name('editNilai'); //Edit nilai anak
            Route::post('/masukanNilaiUpdate/{id}/{idkomp}', [NilaiController::class, 'masukanNilaiUpdate'])->name('masukanNilaiUpdate'); //Proses edit nilai

            // Download Nilai
            Route::get('/downloadNilai/{id}', [NilaiController::class, 'downloadNilai'])->name('downloadNilai'); //Download Nilai
        });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
