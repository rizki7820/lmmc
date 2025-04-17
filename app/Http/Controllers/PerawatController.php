<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Pendaftaran;
use App\Models\User;
use Carbon\Carbon;

class PerawatController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $today = now()->toDateString();
        // Cek apakah user memiliki nomor antrian hari ini
        $antrian = Pendaftaran::where('tanggal_booking', $today)
        ->orderBy('nomor_antrian', 'asc')
        ->first();

            return view('perawat/home', [
            'user' => $user,
            'antrian' => $antrian
            ]);
    }

    public function antrian(){

        $today = now()->toDateString();

        $pendaftaran = Pendaftaran::where('tanggal_booking', $today)
        ->with('user')
        ->orderBy('nomor_antrian', 'asc')
        ->get();

        // Hitung jumlah pendaftar hari ini
        $jumlahPendaftar = $pendaftaran->count();

        // Hitung jumlah pendaftar dengan status "menunggu"
        $jumlahMenunggu = Pendaftaran::where('tanggal_booking', $today)
        ->where('status', 'menunggu')
        ->count();

        $jumlahProses = Pendaftaran::where('tanggal_booking', $today)
        ->where('status', 'proses')
        ->count();

            return view('perawat/antrian', [
            'pendaftaran' => $pendaftaran,
            'jumlahPendaftar' => $jumlahPendaftar,
            'jumlahMenunggu' => $jumlahMenunggu,
            'jumlahProses' => $jumlahProses,
            ]);
    }

    public function pemeriksaan(Request $request, $id)
{
    // Ambil data pendaftaran beserta relasi user
    $pendaftar = Pendaftaran::with('user')->findOrFail($id);

    // Ambil user terkait dari pendaftaran
    $user = $pendaftar->user;

    // Periksa apakah user ditemukan
    if (!$user) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    // Update data pada tabel pendaftarans
    $user->update($request->all());

    // Update status user menjadi 'proses'
    $pendaftar->status = 'proses';
    $pendaftar->save();

    return redirect()->back()->with('success', 'Data pendaftar berhasil diperbarui');
}

}
