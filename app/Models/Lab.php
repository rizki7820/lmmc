<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = [
        'dlo',
        'kimia_darah',
        'urinalisis',
        'narkoba',
        'serologi_dengue',
        'widal',
        'golongan_darah',
        'anti_d_rhesus',
    ];

    protected $casts = [
        'dlo' => 'json',
        'kimia_darah' => 'json',
        'urinalisis' => 'json',
        'narkoba' => 'json',
        'serologi_dengue' => 'json',
        'widal' => 'json',
        'golongan_darah' => 'json',
        'anti_d_rhesus' => 'json',
    ];
}
