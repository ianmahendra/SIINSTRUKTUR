<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;

    protected $table = 'instruktur_new';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_instruktur',
        'nama_instruktur',
        'kompetensi_instruktur',
        'status_instruktur',
        'hp_instruktur',
        'email_instruktur',
        'kualifikasi_instruktur',
        'kampus_instruktur',
        'sertifikasi_tot',
        'kompetensi_instruktur',
    ];
}
