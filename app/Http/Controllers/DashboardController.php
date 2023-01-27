<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index(){
        return view('page.dashboard-home');
    }

    public function getInstruktur() {
        //$dataInstrukturs = Karyawan::all();
        $dataInstrukturs = DB::table('instruktur_new')
                    // ->limit(10)
                    ->orderBy('id', 'ASC')
                    ->get();
        // dd($dataInstrukturs);
        return view('page.dashboard-instruktur', compact('dataInstrukturs'));
    }

    public function getPegawai() {
        //$dataInstrukturs = Karyawan::all();
        $dataPegawais = DB::table('master_karyawan')
                    ->select(
                        'master_karyawan.karyawan_id',
                        'master_karyawan.nid',
                        'master_karyawan.nama_lengkap',
                        'master_karyawan.lokasi_unit',
                        'master_karyawan.posisi'
                    )
                    ->get();
        //dd($dataPegawais);
        return view('page.dashboard-pegawai', compact('dataPegawais'));
    }

    public function getSertifikasi() {
        $dataSertifikasis = DB::table('only_sertifikasi') -> get();
        // dd($dataSertifikasis);
        return view('page.dashboard-sertifikasi', compact('dataSertifikasis'));
    }

    public function getMasterPelatihan()
    {
        $pelatihans = Pelatihan::all();

        return view('page.dashboard-pelatihan', compact('pelatihans'));
    }
}
