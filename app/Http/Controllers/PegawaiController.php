<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    //
    public function getCompetencyInstruktur(Request $request)
    {
        $nid = $request->dataNID;
        $dataCompetency = DB::table('master_sertifikasi')
                    ->where('nid', '=', $nid)
                    ->get();
        //ddd($dataCompetency);
        return response()->json($dataCompetency);
    }

    public function getDetailPegawai(Request $request)
    {
        $nid = $request->nid;
        $dataDetail = DB::table('master_karyawan')
                    ->where('nid', '=', $nid)
                    ->first();
        //ddd($dataCompetency);
        return response()->json($dataDetail);
    }

    public function getEditPegawai(Request $request)
    {
        $nid = $request->nid;
        $dataEdit = DB::table('master_karyawan')
                    ->where('nid', '=', $nid)
                    ->first();
        //ddd($dataCompetency);
        return response()->json($dataEdit);
    }

    public function PostAddPegawai(Request $request){
        $instruktur = new Instruktur;
        // ddd($instruktur);
        $pegawai-> nid = $request-> nid2;
        $pegawai-> nama_lengkap = $request-> nama_lengkap2;
        $pegawai-> lokasi_unit = $request-> lokasi_unit2;
        $pegawai-> divisi_asal = $request-> divisi_asal2;
        $pegawai-> email = $request-> email2;
        $pegawai-> telpon = $request-> telpon2;
        $pegawai-> posisi = $request-> posisi2;
        $pegawai-> alamat_ktp = $request-> alamat_ktp2;
        $pegawai-> kota_ktp = $request-> kota_ktp2;
        $pegawai-> kota_ktp = $request-> provinsi_ktp2;
        $pegawai-> ktp = $request-> ktp2;
        $pegawai-> npwp = $request-> npwp2;
        $pegawai-> jenjang_jabatan = $request-> jenjang_jabatan2;
        $pegawai->save();
        return redirect()->route("dashboard.pegawai");
    }

    public function PostEditPegawai(Request $request)
    {
        // dd($request);
        $instruktur = Instruktur::find($request->id_key);
        // ddd($instruktur);
        $pegawai-> nid = $request-> nid2;
        $pegawai-> nama_lengkap = $request-> nama_lengkap2;
        $pegawai-> lokasi_unit = $request-> lokasi_unit2;
        $pegawai-> divisi_asal = $request-> divisi_asal2;
        $pegawai-> email = $request-> email2;
        $pegawai-> telpon = $request-> telpon2;
        $pegawai-> posisi = $request-> posisi2;
        $pegawai-> alamat_ktp = $request-> alamat_ktp2;
        $pegawai-> kota_ktp = $request-> kota_ktp2;
        $pegawai-> kota_ktp = $request-> provinsi_ktp2;
        $pegawai-> ktp = $request-> ktp2;
        $pegawai-> npwp = $request-> npwp2;
        $pegawai-> jenjang_jabatan = $request-> jenjang_jabatan2;
        $instruktur->save();
        return redirect()->route("dashboard.pegawai");
    }

    public function DeleteDataPegawai(Request $request)
    {
        //dd($request);
        $karyawan_id = $request -> nid;
        $pegawai = Karyawan::find($nid);
        $pegawai ->delete();
        return redirect()->route("dashboard.pegawai");
    }

}
