<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SertifikasiController extends Controller
{
    public function getDetailSertifikasi(Request $request)
    {
        $id_skillcomp = $request-> id_skillcomp;
        $dataDetail = DB::table('only_sertifikasi')
                    ->where('id_skillcomp', '=', $id_skillcomp)
                    ->first();
        //ddd($dataCompetency);
        return response()->json($dataDetail);
    }

    public function getEditSertifikasi(Request $request)
    {
        $id_skillcomp = $request->id_skillcomp;
        $dataEdit = DB::table('only_sertifikasi')
                    ->where('id_skillcomp', '=', $id_skillcomp)
                    ->first();
        //ddd($dataCompetency);
        return response()->json($dataEdit);
    }

    public function PostAddSertifikasi(Request $request){
        $sertifikasi = new Sertifikasi;
        // ddd($sertifikasi);
        $sertifikasi-> id_skillcomp = $request-> id_skillcomp2;
        $sertifikasi-> skill_comp = $request-> skill_comp2;
        $sertifikasi-> competency_level = $request-> competency_level2;
        $sertifikasi->save();
        return redirect()->route("dashboard.sertifikasi");
    }

    public function PostEditSertifikasi(Request $request)
    {
        // dd($request);
        $sertifikasi = Sertifikasi::find($request->id_skillcomp);
        $sertifikasi-> id_skillcomp = $request-> id_skillcomp2;
        $sertifikasi-> skill_comp = $request-> skill_comp2;
        $sertifikasi-> competency_level = $request-> competency_level2;
        $sertifikasi->save();
        return redirect()->route("dashboard.sertifikasi");
    }

    public function DeleteDataSertifikasi(Request $request)
    {
        //dd($request);
        $id_skillcomp = $request -> id_skillcomp;
        $sertifikasi = Sertifikasi::find($id_skillcomp);
        $sertifikasi ->delete();
        return redirect()->route("dashboard.sertifikasi");
    }

}
