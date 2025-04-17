<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{

    protected $fillable = ['nip', 'nama_dokter', 'poli', 'jam_operasional'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'dokter_id');
    }
}
