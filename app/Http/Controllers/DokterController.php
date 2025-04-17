<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
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

        return view('dokter/home', [
            'user' => $user,
            'antrian' => $antrian,
            'ant' => $ant,
        ]);

    }

    public function index()
    {
        $dokters = Dokter::all();
        return view('dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {

        Dokter::create($request->all());
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan!');
    }

    public function edit(Dokter $dokter)
    {
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        $dokter->update($request->all());
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil diperbarui!');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus!');
    }

    public function pasien() {

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

                return view('dokter/pasien', [
                'pendaftaran' => $pendaftaran,
                'jumlahPendaftar' => $jumlahPendaftar,
                'jumlahMenunggu' => $jumlahMenunggu,
                'jumlahProses' => $jumlahProses,
                ]);
        }
}
