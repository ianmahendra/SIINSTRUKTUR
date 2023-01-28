<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Instruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstrukturController extends Controller
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

    public function getDetailInstruktur(Request $request)
    {
        $id_instruktur = $request->id_instruktur;
        $dataDetail = DB::table('instruktur_new')
                    ->where('id_instruktur', '=', $id_instruktur)
                    ->first();
        //ddd($dataCompetency);
        return response()->json($dataDetail);
    }

    public function getEditInstruktur(Request $request)
    {
        $id_instruktur = $request->id_instruktur;
        $dataEdit = DB::table('instruktur_new')
                    ->where('id_instruktur', '=', $id_instruktur)
                    ->first();
        //ddd($dataCompetency);
        return response()->json($dataEdit);
    }

    public function PostAddInstruktur(Request $request){
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
        return redirect()->route("dashboard.instruktur");
    }

    public function PostEditInstruktur(Request $request)
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
        return redirect()->route("dashboard.instruktur");
    }

    public function DeleteDataInstruktur(Request $request)
    {
        //dd($request);
        $id_instruktur = $request->id_instruktur;
        $instruktur = Instruktur::where('id_instruktur', '=', $id_instruktur)->first();
        $instruktur ->delete();
        return redirect()->route("dashboard.instruktur");
    }
}
