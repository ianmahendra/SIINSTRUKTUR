<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Route::middleware('guest')->group(function() {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::get('/dashboard/instruktur', [DashboardController::class, 'getInstruktur'])->name('dashboard.instruktur');
    Route::get('/dashboard/pegawai', [DashboardController::class, 'getPegawai'])->name('dashboard.pegawai');
    Route::get('/dashboard/pelatihan', [DashboardController::class, 'getMasterPelatihan'])->name('dashboard.pelatihan');
    Route::get('/dashboard/sertifikasi', [DashboardController::class, 'getSertifikasi'])->name('dashboard.sertifikasi');
    Route::get('get-comptency-instruktur', [InstrukturController::class, 'getCompetencyInstruktur'])->name('getCompetencyInstruktur');
    Route::post('DeleteDataInstruktur', [InstrukturController::class, 'DeleteDataInstruktur'])->name('DeleteDataInstruktur');
    Route::post('DeleteDataPegawai', [PegawaiController::class, 'DeleteDataPegawai'])->name('DeleteDataPegawai');
    Route::get('get-detail-instruktur', [InstrukturController::class, 'getDetailInstruktur'])->name('getDetailInstruktur');
    Route::get('get-detail-pegawai', [PegawaiController::class, 'getDetailPegawai'])->name('getDetailPegawai');
    Route::get('get-edit-instruktur', [InstrukturController::class, 'getEditInstruktur'])->name('getEditInstruktur');
    Route::get('get-edit-pegawai', [PegawaiController::class, 'getEditPegawai'])->name('getEditPegawai');
    Route::post('post-edit-instruktur', [InstrukturController::class, 'PostEditInstruktur'])->name('PostEditInstruktur');
    Route::post('post-edit-pegawai', [PegawaiController::class, 'PostEditPegawai'])->name('PostEditPegawai');
    Route::post('post-add-instruktur', [InstrukturController::class, 'PostAddInstruktur'])->name('PostAddInstruktur');
    Route::post('post-add-pegawai', [PegawaiController::class, 'PostAddPegawai'])->name('PostAddPegawai');
});
