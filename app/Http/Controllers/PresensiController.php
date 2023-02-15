<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    public function PresensiInput()
    {
        $instrukturs = DB::table('instruktur_new')->select('id_instruktur' , 'nama_instruktur') -> get();
        $kampuss = DB::table('instruktur_new')->select('kampus_instruktur') -> groupBy('kampus_instruktur') -> get();
        $pelatihans = DB::table('data_pelatihan')->select('course_id' , 'course_title') -> limit(100) -> get();
        return view('page.dashboard-presensi', ['instrukturs'=> $instrukturs, 'kampuss' => $kampuss, 'pelatihans' => $pelatihans]);
    }

    public function PostAddPresensi(Request $request){
        $presensis = new Presensi;
        // ddd($pelatihan);
        $presensis-> nama_instruktur = $request-> nama_instruktur;
        $presensis-> kampus_instruktur = $request-> kampus_instruktur;
        $presensis-> course_title = $request-> course_title;
        $presensis-> tgl_mulai = $request-> tgl_mulai;
        $presensis-> tgl_selesai = $request-> tgl_selesai;
        $presensis-> jam_start = $request-> jam_start;
        $presensis-> jam_finish = $request-> jam_finish;
        $presensis-> evidence_link = $request-> evidence_link;
        if ($request->hasFile('evidence_file')) {
            $dataGambar = $request->file("evidence_file");
            $uploadedFileName = $dataGambar->getClientOriginalName() . '-' . rand(0, 1919) . time() . '.' . $dataGambar->getClientOriginalExtension();
            $fileFoto = $dataGambar->storeAs('evidence', $uploadedFileName);
            $presensis->evidence_file = $fileFoto;
        }
        $presensis->save();
        return redirect()->route("PresensiInput");
    }

    public function HistoryPresensi(Request $request)
    {
        $dataPresensis = DB::table('presensi_instruktur') -> where("nama_instruktur", "=", $request -> nama) -> get();
        return view('page.dashboard-historypresensi', ['dataPresensis'=> $dataPresensis]);
    }

    public function RecentPresensi(Request $request)
    {
        $dataPresensis = DB::table('presensi_instruktur') -> get();
        return view('page.dashboard-history', ['dataPresensis'=> $dataPresensis]);
    }

    public function getDetailHistoryPresensi(Request $request)
    {
        $id = $request->id;
        $dataDetail = DB::table('presensi_instruktur')
                    ->where('id', '=', $id)
                    ->first();
        //ddd($dataCompetency);
        return response()->json($dataDetail);
    }

    public function getEditHistoryPresensi(Request $request)
    {
        $id = $request->id;
        $dataEdit = DB::table('presensi_instruktur')
                    ->where('id', '=', $id)
                    ->first();
        //ddd($dataCompetency);
        return response()->json($dataEdit);
    }

    public function DeleteDataHistoryPresensi(Request $request)
    {
        //dd($request);
        $id = $request -> id;
        $presensis = Presensi::find($id);
        $presensis ->delete();
        return back();
    }

    public function PostEditHistoryPresensi(Request $request)
    {
        // dd($request);
        $presensis = Presensi::find($request->id);
        //$presensis-> nama_instruktur = $request-> nama_instruktur2;
        $presensis-> kampus_instruktur = $request-> kampus_instruktur2;
        $presensis-> course_title = $request-> course_title2;
        $presensis-> tgl_mulai = $request-> tgl_mulai2;
        $presensis-> tgl_selesai = $request-> tgl_mulai2;
        $presensis-> jam_start = $request-> jam_start2;
        $presensis-> jam_finish = $request-> jam_finish2;
        $presensis-> evidence_link = $request-> evidence_link2;
        $presensis-> evidence_file = $request-> evidence_file2;
        $presensis->save();
        return back();
    }

    public function DownloadEvidence(Request $request)
    {
        return response()->download(storage_path("app/" . $request->file));
    }


}
