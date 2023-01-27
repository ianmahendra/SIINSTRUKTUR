<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => "admin sisfo",
            'username' => "tes_admin",
            'password' => Hash::make('tesAdmin'),
            'user_type' => "superadmin"
        ]);

        DB::table('master_karyawan')->insert([
            'karyawan_pk' => "6895029P",
            'nid' => "6895029P",
            'nama_lengkap' => "GONG MATUA HASIBUAN",
            'lokasi_unit' => "KANTOR PUSAT",
            'direktorat' => "DIRUT",
            'divisi_asal' => "DIRUT",
            'email' => "gong.matua@ptpjb.com",
            'telpon' => "+628111807448",
            'posisi' => "DIREKTUR UTAMA",
            'tgl_jabatan' => "20210219",
            'tgl_lahir' => "19680221",
            'agama' => "Islam",
            'alamat_ktp' => "L.CIPINANG BARU BUNDER NO. 25 0	",
            'kota_ktp' => "KOTA JAKARTA TIMUR",
            'provinsi_ktp' => "DKI JAKARTA	",
            'kode_pos_ktp' => "0",
            'alamat_domisili' => "L.CIPINANG BARU BUNDER NO. 25 0",
            'kota_domisili' => "KOTA JAKARTA TIMUR",
            'provinsi_domisili' => "DKI JAKARTA",
            'kode_pos_domisili' => "0",
            'jenjang_jabatan' => "DIREKSI",
            'ktp' => "1271172102680001",
            'npwp' => "479870701121000",
            'jenis_kelamin' => "Laki",
            'status_kawin' => "Kawin",
            'asal_pegawai' => "PEGAWAI PLN/ANORGANIK"
        ]);
    }
}
