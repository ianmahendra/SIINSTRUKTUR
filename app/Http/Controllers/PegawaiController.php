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
        $instruktur-> id_instruktur = $request-> id_instruktur2;
        $instruktur-> nama_instruktur = $request-> nama_instruktur2;
        $instruktur-> status_instruktur = $request-> status_instruktur2;
        $instruktur-> hp_instruktur = $request-> hp_instruktur2;
        $instruktur-> email_instruktur = $request-> email_instruktur2;
        $instruktur-> kualifikasi_instruktur = $request-> kualifikasi_instruktur2;
        $instruktur-> kampus_instruktur = $request-> kampus_instruktur2;
        $instruktur-> sertifikasi_tot = $request-> sertifikasi_tot2;
        $instruktur-> kompetensi_instruktur = $request-> kompetensi_instruktur2;
        $instruktur->save();
        return redirect()->route("dashboard.pegawai");
    }

    public function PostEditPegawai(Request $request)
    {
        // dd($request);
        $instruktur = Instruktur::find($request->id_key);
        // ddd($instruktur);
        $instruktur-> id_instruktur = $request-> id_instruktur2;
        $instruktur-> nama_instruktur = $request-> nama_instruktur2;
        $instruktur-> status_instruktur = $request-> status_instruktur2;
        $instruktur-> hp_instruktur = $request-> hp_instruktur2;
        $instruktur-> email_instruktur = $request-> email_instruktur2;
        $instruktur-> kualifikasi_instruktur = $request-> kualifikasi_instruktur2;
        $instruktur-> kampus_instruktur = $request-> kampus_instruktur2;
        $instruktur-> sertifikasi_tot = $request-> sertifikasi_tot2;
        $instruktur-> kompetensi_instruktur = $request-> kompetensi_instruktur2;
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