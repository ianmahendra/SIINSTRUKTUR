<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
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

    public function DeleteDataInstruktur(Request $request)
    {
        //dd($request);
        $karyawanid = $request -> instrukturID;
        $karyawan = Karyawan::find($karyawanid);
        $karyawan ->delete();
        return redirect()->route("dashboard.instruktur");
    }

}
