<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi_instruktur';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_instruktur',
        'kampus_instruktur',
        'course_title',
        'tgl_mulai',
        'tgl_selesai',
        'jam_start',
        'jam_selesai',
        'evidence_link',
        'evidence_file',
    ];
}
