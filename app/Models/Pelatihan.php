<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'data_pelatihan';

    protected $primaryKey = 'pelatihan_id';

    protected $fillable = [
        'pelatihan_id',
        'course_id',
        'course_title'
    ];
}
