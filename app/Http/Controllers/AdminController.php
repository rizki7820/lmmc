<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Pendaftaran;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $today = now()->toDateString();
        // Cek apakah user memiliki nomor antrian hari ini
        $antrian = Pendaftaran::where('tanggal_booking', $today)
        ->orderBy('nomor_antrian', 'asc')
        ->first();

            return view('admin/home', [
            'user' => $user,
            'antrian' => $antrian
            ]);
    }
}
