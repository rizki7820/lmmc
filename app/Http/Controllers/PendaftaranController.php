<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;
use App\Models\Soap;
use App\Models\User;
use Carbon\Carbon;
use Exception;

class PendaftaranController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        return view('daftar', compact('user'));
    }

    public function getDokterByPoli(Request $request)
    {
        $dokters = Dokter::where('poli', $request->poli)->get();
        return response()->json($dokters);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // $request->validate([
        //     'nama_orang_tua' => 'nullable|string|max:255',
        //     'nik_anak' => 'nullable|string|max:16',
        //     'nik' => 'required|string|max:16',
        //     'tempat_lahir' => 'required|string|max:255',
        //     'tanggal_lahir' => 'required|date',
        //     'alamat' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'nomor_telepon' => 'required|string|max:15',
        //     'tanggal_booking' => 'required|date',
        //     'jenis_layanan' => 'required|string|max:255',
        //     'poli_tujuan' => 'required|string|max:255',
        //     'dokter' => 'required|string|max:255',
        //     'jam_booking' => 'required|string|max:255',
        // ]);

        $today = Carbon::today();
        $lastAntrian = Pendaftaran::where('tanggal_booking', $today)->max('nomor_antrian');
        $nomorAntrian = $lastAntrian ? $lastAntrian + 1 : 1;

        $user = Auth::user();

        // Cek apakah sudah ada pendaftaran dengan dokter dan tanggal yang sama
        $existingBooking = Pendaftaran::where('user_id', Auth::id())
            ->where('dokter_id', $request->dokter_id)
            ->where('tanggal_booking', $request->tanggal_booking)
            ->first();

        if ($existingBooking) {
            return back()->withErrors(['error' => 'Anda sudah mendaftar dengan dokter ini pada tanggal yang sama.'])->withInput();
        }

        // **Cek apakah data di tabel users kosong, jika kosong, isi dari form**
        User::find($user->id)->update([
            'nik' => $user->nik ?: $request->nik,
            'tempat_lahir' => $user->tempat_lahir ?: $request->tempat_lahir,
            'tanggal_lahir' => $user->tanggal_lahir ?: $request->tanggal_lahir,
            'alamat' => $user->alamat ?: $request->alamat,
            'email' => $user->email ?: $request->email,
            'nomor_telepon' => $user->nomor_telepon ?: $request->nomor_telepon,
        ]);

        // Hitung nomor antrian berdasarkan tanggal booking
        $nomor_antrian = Pendaftaran::where('tanggal_booking', $request->tanggal_booking)->count() + 1;
        $rekamMedis = Pendaftaran::generateRekamMedis();
        // Simpan data pendaftaran
        Pendaftaran::create([
            'user_id' => Auth::id(),
            'nik_anak' => $request->nik_anak,
            'nama_orang_tua' => $request->nama_orang_tua,
            'tanggal_booking' => $request->tanggal_booking,
            'nomor_telepon' => $request->nomor_telepon,
            'poli_tujuan' => $request->poli_tujuan,
            'dokter_id' => $request->dokter_id,
            'nomor_antrian' => $this->generateNomorAntrian($request->tanggal_booking),
            'status' => 'Menunggu',
            'rekam_medis' => Pendaftaran::generateRekamMedis()
        ]);


        return redirect()->route('home')->with('success', 'Pendaftaran berhasil! Nomor Antrian Anda: ' . $nomor_antrian);
    }

    private function generateNomorAntrian($tanggal)
    {
        $count = Pendaftaran::whereDate('tanggal_booking', $tanggal)->count();
        return $count + 1;
    }

    public function profil()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftaran::where('user_id', $user->id)->first();


        return view('profil', compact('pendaftaran', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nomor_telepon' => 'nullable|string|max:15',
            'nik' => 'nullable|string|max:16',
            'jenis_kelamin' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'alamat' => 'nullable|string',
        ]);

        User::find($user->id)->update($request->only([
            'name',
            'email',
            'nomor_telepon',
            'nik',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
        ]));

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function setKategori(Request $req)
    {
        $req->validate([
            'pendaftaran_id' => 'required',
            'kategori' => 'required'
        ]);

        try {
            Soap::where('pendaftaran_id', $req->pendaftaran_id)
                ->update([
                    'objektif_perawat' => $req->kategori
                ]);

            return response()->json([
                'status' => 200,
                'message' => 'success'
            ], 200);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
