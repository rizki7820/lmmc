<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soap extends Model
{
    protected $fillable = [
        'pendaftaran_id',
        'subjektif_dokter',
        'objektif_perawat',
        'assesment_dokter',
        'planning_dokter',
    ];
}
