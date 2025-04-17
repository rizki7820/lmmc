<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Pendaftaran;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['jadwal']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
            $user = Auth::user();
            $today = now()->toDateString();
            $ant = Antrian::getCurrentAntrian();

            // Cek apakah user memiliki nomor antrian hari ini
            $antrian = Pendaftaran::where('tanggal_booking', $today)
            ->where('user_id', $user->id)
            ->with('dokter') // Pastikan relasi dokter di-load
            ->orderBy('nomor_antrian', 'asc')
            ->first();

            return view('home', [
                'user' => $user,
                'antrian' => $antrian,
                'ant' => $ant,
            ]);

    }

    public function jadwal()
    {

            // Cek apakah user memiliki nomor antrian hari ini
            $dokter = Dokter::all();

            return view('jadwal_dokter', compact('dokter'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function antrian_admin(Request $request)
{
    $user = Auth::user();
    $today = Carbon::today();
    $dokter = 'Dr. Iskandar Halim, SP.A';

    // Total pendaftaran pasien berdasarkan dokter
    $totalPendaftaran = Pendaftaran::where('dokter', $dokter)->count();

    // Total daftar tunggu berdasarkan dokter, tanggal hari ini, dan status "Menunggu"
    $daftarTunggu = Pendaftaran::where('dokter', $dokter)
                        ->whereDate('tanggal_booking', $today)
                        ->where('status', 'Menunggu')
                        ->count();

    // Hanya mengambil data pendaftaran HARI INI berdasarkan dokter
    $pendaftaran = Pendaftaran::where('dokter', $dokter)
                        ->whereDate('tanggal_booking', $today)
                        ->get();

    // Cek apakah user memiliki nomor antrian hari ini
    $antrian = Pendaftaran::whereDate('tanggal_booking', $today)
                ->where('user_id', $user->id)
                ->orderBy('nomor_antrian', 'asc')
                ->first();

    return view('admin.antrian', compact('user', 'antrian', 'pendaftaran', 'totalPendaftaran', 'daftarTunggu'));
}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }

    public function pasien()
    {
        $pendaftaran = Pendaftaran::where('dokter', 'Dr. Iskandar Halim, SP.A')
        ->with('user')
        ->get();

        return view('admin.rekam-medis', compact('pendaftaran'));
    }

}
