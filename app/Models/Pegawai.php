<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'master_karyawan';

    protected $primaryKey = 'nid';

    protected $fillable = [
        'karyawan_id',
        'karyawan_pk',
        'nid',
        'nama_lengkap',
        'lokasi_unit',
        'direktorat',
        'divisi_asal',
        'email',
        'telpon',
        'posisi',
        'tgl_jabatan',
        'tgl_lahir',
        'agama',
        'alamat_ktp',
        'kota_ktp',
        'provinsi_ktp',
        'kode_pos_ktp',
        'alamat_domisili',
        'kota_dosimili',
        'provinsi_domisili',
        'kode_pos_domisili',
        'jenjang_jabatan',
        'ktp',
        'npwp',
        'jenis_kelamin',
        'status_kawin',
        'asal_pegawai'
    ];
}
