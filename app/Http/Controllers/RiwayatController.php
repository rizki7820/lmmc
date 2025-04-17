<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{

public function index()
{
    $user = Auth::user();

    // Ambil semua data pendaftaran pengguna yang login
    $pendaftarans = Pendaftaran::where('user_id', $user->id)
                                ->with('dokter')
                               ->orderBy('created_at', 'desc')
                               ->get();

    return view('riwayat_pemeriksaan', compact('user', 'pendaftarans'));
}

}
