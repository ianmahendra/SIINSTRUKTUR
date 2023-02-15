<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SertifikasiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PresensiController;
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
    Route::get('/dashboard/pelatihan', [DashboardController::class, 'getPelatihan'])->name('dashboard.pelatihan');
    Route::get('get-comptency-instruktur', [InstrukturController::class, 'getCompetencyInstruktur'])->name('getCompetencyInstruktur');
    Route::post('DeleteDataInstruktur', [InstrukturController::class, 'DeleteDataInstruktur'])->name('DeleteDataInstruktur');
    Route::post('DeleteDataPegawai', [PegawaiController::class, 'DeleteDataPegawai'])->name('DeleteDataPegawai');
    Route::post('DeleteDataSertifikasi', [SertifikasiController::class, 'DeleteDataSertifikasi'])->name('DeleteDataSertifikasi');
    Route::post('DeleteDataPelatihan', [PelatihanController::class, 'DeleteDataPelatihan'])->name('DeleteDataPelatihan');
    Route::post('DeleteDataHistoryPresensi', [PresensiController::class, 'DeleteDataHistoryPresensi'])->name('DeleteDataHistoryPresensi');
    Route::get('get-detail-instruktur', [InstrukturController::class, 'getDetailInstruktur'])->name('getDetailInstruktur');
    Route::get('get-detail-pegawai', [PegawaiController::class, 'getDetailPegawai'])->name('getDetailPegawai');
    Route::get('get-detail-sertifikasi', [SertifikasiController::class, 'getDetailSertifikasi'])->name('getDetailSertifikasi');
    Route::get('get-detail-pelatihan', [PelatihanController::class, 'getDetailPelatihan'])->name('getDetailPelatihan');
    Route::get('get-detail-historypresensi', [PresensiController::class, 'getDetailHistoryPresensi'])->name('getDetailHistoryPresensi');
    Route::get('get-edit-instruktur', [InstrukturController::class, 'getEditInstruktur'])->name('getEditInstruktur');
    Route::get('get-edit-pegawai', [PegawaiController::class, 'getEditPegawai'])->name('getEditPegawai');
    Route::get('get-edit-sertifikasi', [SertifikasiController::class, 'getEditSertifikasi'])->name('getEditSertifikasi');
    Route::get('get-edit-pelatihan', [PelatihanController::class, 'getEditPelatihan'])->name('getEditPelatihan');
    Route::get('get-edit-historypresensi', [PresensiController::class, 'getEditHistoryPresensi'])->name('getEditHistoryPresensi');
    Route::post('post-edit-instruktur', [InstrukturController::class, 'PostEditInstruktur'])->name('PostEditInstruktur');
    Route::post('post-edit-pegawai', [PegawaiController::class, 'PostEditPegawai'])->name('PostEditPegawai');
    Route::post('post-edit-sertifikasi', [SertifikasiController::class, 'PostEditSertifikasi'])->name('PostEditSertifikasi');
    Route::post('post-edit-pelatihan', [PelatihanController::class, 'PostEditPelatihan'])->name('PostEditPelatihan');
    Route::post('post-edit-historypresensi', [PresensiController::class, 'PostEditHistoryPresensi'])->name('PostEditHistoryPresensi');
    Route::post('post-add-instruktur', [InstrukturController::class, 'PostAddInstruktur'])->name('PostAddInstruktur');
    Route::post('post-add-pegawai', [PegawaiController::class, 'PostAddPegawai'])->name('PostAddPegawai');
    Route::post('post-add-sertifikasi', [SertifikasiController::class, 'PostAddSertifikasi'])->name('PostAddSertifikasi');
    Route::post('post-add-pelatihan', [PelatihanController::class, 'PostAddPelatihan'])->name('PostAddPelatihan');
    Route::get('presensi-input', [PresensiController::class, 'PresensiInput'])->name('PresensiInput');
    Route::get('recent-presensi', [PresensiController::class, 'RecentPresensi'])->name('RecentPresensi');
    Route::get('history-presensi', [PresensiController::class, 'HistoryPresensi'])->name('HistoryPresensi');
    Route::post('post-add-presensi', [PresensiController::class, 'PostAddPresensi'])->name('PostAddPresensi');
    Route::get('download-history-presensi', [PresensiController::class, 'DownloadEvidence'])->name('DownloadEvidence');
});
