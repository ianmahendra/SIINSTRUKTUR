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
        $totalInstruktur = DB::table('instruktur_new')->count();
        $totalPegawai = DB::table('master_karyawan')->count();
        $totalSertifikasi = DB::table('only_sertifikasi')->count();
        $totalPelatihan = DB::table('data_pelatihan')->count();
        return view('page.dashboard-home',compact('totalInstruktur','totalPegawai', 'totalSertifikasi', 'totalPelatihan'));
    }

    public function getInstruktur() {
        //$dataInstrukturs = Karyawan::all();
        $dataInstrukturs = DB::table('instruktur_new')
                    // ->limit(10)
                    ->orderBy('id', 'ASC')
                    ->get();
        $sekolah = DB::table('instruktur_new')->select("kampus_instruktur")->groupBy("kampus_instruktur")->get();

        // dd($dataInstrukturs);
        return view('page.dashboard-instruktur', compact('dataInstrukturs','sekolah'));
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

    public function getPelatihan() {
        $dataPelatihans = DB::table('data_pelatihan') -> limit (100)-> get();
        // dd($dataPelatihans);
        return view('page.dashboard-pelatihan', compact('dataPelatihans'));
    }
}
