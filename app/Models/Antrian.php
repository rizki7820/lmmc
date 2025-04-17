<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $fillable = ['nomor', 'tanggal'];

    public static function getCurrentAntrian()
    {
        return self::firstOrCreate(
            ['tanggal' => now()->toDateString()],
            ['nomor' => 0]
        );
    }

    public function next()
    {
        $this->increment('nomor');
        return $this->nomor;
    }

    public function reset()
    {
        $this->update(['nomor' => 0, 'tanggal' => now()->toDateString()]);
    }
}
