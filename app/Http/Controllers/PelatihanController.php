<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelatihanController extends Controller
{
    public function getDetailPelatihan(Request $request)
    {
        $course_id = $request-> course_id;
        $dataDetail = DB::table('data_pelatihan')
                    ->where('course_id', '=', $course_id)
                    ->first();
        //ddd($dataCompetency);
        return response()->json($dataDetail);
    }

    public function getEditPelatihan(Request $request)
    {
        $course_id = $request->course_id;
        $dataEdit = DB::table('data_pelatihan')
                    ->where('course_id', '=', $course_id)
                    ->first();
        //ddd($dataCompetency);
        return response()->json($dataEdit);
    }

    public function PostAddPelatihan(Request $request){
        $pelatihan = new Pelatihan;
        // ddd($pelatihan);
        $pelatihan-> course_id = $request-> course_id2;
        $pelatihan-> course_title = $request-> course_title2;
        $pelatihan-> jenis_pelatihan = $request-> jenis_pelatihan2;
        $pelatihan-> train_location1 = $request-> train_location12;
        $pelatihan-> train_location2 = $request-> train_location22;
        $pelatihan->save();
        return redirect()->route("dashboard.pelatihan");
    }

    public function PostEditPelatihan(Request $request)
    {
        // dd($request);
        $pelatihan = Pelatihan::find($request->course_id);
        $pelatihan-> course_id = $request-> course_id2;
        $pelatihan-> course_title = $request-> course_title2;
        $pelatihan-> jenis_pelatihan = $request-> jenis_pelatihan2;
        $pelatihan-> train_location1 = $request-> train_location12;
        $pelatihan-> train_location2 = $request-> train_location22;
        $pelatihan->save();
        return redirect()->route("dashboard.pelatihan");
    }

    public function DeleteDataPelatihan(Request $request)
    {
        //dd($request);
        $course_id = $request -> course_id;
        $pelatihan = Pelatihan::find($course_id);
        $pelatihan ->delete();
        return redirect()->route("dashboard.pelatihan");
    }

}
