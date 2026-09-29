<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\TraceradminController;
use App\Http\Controllers\PenggunalulusanController;
use App\Http\Controllers\HasilStatistikaController;
use App\Http\Controllers\StatistikaController;

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

Route::get('/contoh-kuesioner', function () {
    return view('kuesioner.contoh');
})->name('kuesioner.contoh');


Route::get('/dashboard2', function () {
    return view('dashboard.index');
});

Route::get('/profile', function () {
    return view('dashboard.profile');
});





Route::get('/masuk', [LoginController::class, 'index'])->name('masuk')->middleware('guest');
Route::get('/daftar', [LoginController::class, 'daftar'])->middleware('guest');
Route::post('/store-user', [LoginController::class, 'store'])->name('user.simpan');
Route::post('/masuk', [LoginController::class, 'authenticate'])->name('proses.login');
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', [LoginController::class, 'logout']);


// DASHBOARD ROUTE
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('profil', [DashboardController::class, 'profil'])->name('profil.index')->middleware(['auth', 'checkRole:alumni']);
Route::get('/ganti-password', [DashboardController::class, 'password'])->name('gantipassword.index')->middleware(['auth', 'checkRole:alumni']);
Route::post('/ganti-password/update', [DashboardController::class, 'updatepassword'])->name('password.update')->middleware(['auth', 'checkRole:alumni']);
Route::put('profil', [DashboardController::class, 'updateprofil'])->name('profil.update')->middleware(['auth', 'checkRole:alumni']);

// Kuisioner Route
Route::get('kuesioner', [KuesionerController::class, 'index'])->middleware(['auth', 'checkRole:alumni'])->name('kuesioner');
Route::get('kuesioner/isi', [KuesionerController::class, 'isi'])->name('kuesioner.isi')->middleware(['auth', 'checkRole:alumni']);
Route::post('kuesioner/store', [KuesionerController::class, 'store'])->name('kuesioner.store')->middleware(['auth', 'checkRole:alumni']);
Route::delete('kuesioner/{kuesioner}', [KuesionerController::class, 'destroy'])->name('kuesioner.destroy');
// Route::delete('kuesioner/{user}', 'KuesionerController@destroy')->name('kuesioner.destroy');
// Alumni Route
Route::get('data-alumni', [AlumniController::class, 'index'])->middleware(['auth', 'checkRole:admin']);
Route::get('data-alumni/lihat/{id}', [AlumniController::class, 'show'])->middleware(['auth', 'checkRole:admin']);
Route::delete('data-alumni/hapus/{user}', [AlumniController::class, 'destroy'])->name('data-alumni.destroy')->middleware(['auth', 'checkRole:admin']);

Route::get('statistika', [StatistikaController::class, 'index'])->name('statistika');
Route::post('statistika', [StatistikaController::class, 'store'])->name('statistika.store');

Route::get('hasil-statistika', [HasilStatistikaController::class, 'index'])->name('hasil-statistika');
Route::get('hasil-statistika/excel', [HasilStatistikaController::class, 'excel'])->name('hasil-statistika.excel');
Route::get('hasil-statistika/pdf', [HasilStatistikaController::class, 'pdf'])->name('hasil-statistika.pdf');

// Data Tracer Admin Route
Route::get('data-tracer', [TraceradminController::class, 'index'])->middleware(['auth', 'checkRole:admin']);
Route::get('data-tracer/lihat/{id}', [TraceradminController::class, 'show'])->middleware(['auth', 'checkRole:admin']);
Route::delete('data-tracer/hapus/{kuesioner}', [TraceradminController::class, 'destroy'])->name('data-tracer.destroy')->middleware(['auth', 'checkRole:admin']);

// Pengumuman
Route::get('pengumuman', [PengumumanController::class, 'index'])->middleware(['auth', 'checkRole:admin']);
Route::post('pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store')->middleware(['auth', 'checkRole:admin']);

// Pengguna Lulusan
Route::get('pengguna-lulusan', [PenggunalulusanController::class, 'index']);
Route::post('store', [PenggunalulusanController::class, 'store'])->name('pengguna-lulusan.simpan');