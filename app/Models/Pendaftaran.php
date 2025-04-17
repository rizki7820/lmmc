<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftarans'; // Pastikan tabelnya benar
    protected $fillable = [
        'user_id',
        'obat_id',
        'soap_id',
        'lab_id',
        'nik_anak',
        'nama_orang_tua',
        'tanggal_booking',
        'poli_tujuan',
        'dokter_id',
        'nomor_antrian',
        'status',
        'rekam_medis'
    ];

    protected $casts = [
        'obat_id' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pasien()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'user_id', 'id');
    }

    public function soap()
    {
        return $this->hasOne(Soap::class, 'pendaftaran_id', 'id');
    }

    public function lab()
    {
        return $this->hasOne(Lab::class, 'id', 'lab_id');
    }

    public static function generateRekamMedis()
    {
        // Ambil rekam medis terakhir
        $lastRecord = self::latest()->first();

        // Ambil nomor terakhir dan tambahkan 1
        $nextNumber = $lastRecord ? ((int) substr($lastRecord->rekam_medis, -4)) + 1 : 1;

        // Format nomor agar selalu 4 digit
        $formattedNumber = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        // Format tanggal menjadi DDMMYY
        $formattedDate = date('dmy'); // Contoh: 09 Maret 2025 → 090325

        return 'RM-' . $formattedDate . '-' . $formattedNumber;
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
