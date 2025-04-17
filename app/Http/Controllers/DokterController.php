<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\Lab;
use App\Models\Obat;
use App\Models\Pendaftaran;
use App\Models\Soap;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

        return view('dokter.home', [
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
            'nip' => 'required|numeric',
            'nama_dokter' => 'required|string|max:255',
            'poli' => 'required',
            'jam_operasional' => 'required|string'
        ]);

        $dokter->update($request->all());
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil diperbarui!');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus!');
    }

    public function pasien()
    {

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

        return view('dokter.pasien', [
            'pendaftaran' => $pendaftaran,
            'jumlahPendaftar' => $jumlahPendaftar,
            'jumlahMenunggu' => $jumlahMenunggu,
            'jumlahProses' => $jumlahProses,
        ]);
    }

    public function saveObat(Request $req)
    {
        $req->validate([
            'obat_pasien_id' => [
                'required'
            ],
            'id_obat' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!is_array($value)) {
                        return $fail('Format obat harus array');
                    }

                    $habis = Obat::whereIn('id', $value)->where('stok', 0)->exists();
                    if ($habis) {
                        return $fail('Obat yang dipilih ada yang stoknya habis!');
                    }
                }
            ]
        ]);

        try {
            foreach ($req->id_obat as $id) {
                try {
                    $obat = Obat::findOrFail($id);
                    $obat->stok -= 1;
                    $obat->save();
                } catch (Exception $e) {
                    throw new Exception($e->getMessage());
                }
            }

            $pendaftaran = Pendaftaran::find($req->obat_pasien_id);
            $pendaftaran->obat_id = $req->id_obat;
            $pendaftaran->save();

            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menyimpan data'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function saveSoap(Request $req)
    {
        try {
            $soap = new Soap();
            $soap->pendaftaran_id = $req->soap_pasien_id ?? null;
            $soap->subjektif_dokter = $req->subjektif_dokter ?? null;
            $soap->objektif_dokter = $req->objektif_dokter ?? null;
            $soap->assesment_dokter = $req->assesment_dokter ?? null;
            $soap->planning_dokter = $req->planning_dokter ?? null;
            $soap->save();

            $pendaftaran = Pendaftaran::find($req->soap_pasien_id);
            $pendaftaran->soap_id = $soap->id;
            $pendaftaran->save();

            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menyimpan data'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    public function saveLab(Request $req)
    {
        $req->validate([
            'dlo' => ['required'],
            'kimia_darah' => ['required'],
            'urinalisis' => ['required'],
            'narkoba' => ['required'],
            'serologi_dengue' => ['required'],
            'widal' => ['required'],
            'golongan_darah' => ['required'],
            'anti_d_rhesus' => ['required'],
        ]);

        try {
            $lab = new Lab();
            $lab->dlo = $req->dlo ?? null;
            $lab->kimia_darah = $req->kimia_darah ?? null;
            $lab->urinalisis = $req->urinalisis ?? null;
            $lab->narkoba = $req->narkoba ?? null;
            $lab->serologi_dengue = $req->serologi_dengue ?? null;
            $lab->widal = $req->widal ?? null;
            $lab->golongan_darah = $req->golongan_darah ?? null;
            $lab->anti_d_rhesus = $req->anti_d_rhesus ?? null;
            $lab->save();

            $pendaftaran = Pendaftaran::find($req->lab_pasien_id);
            $pendaftaran->lab_id = $lab->id;
            $pendaftaran->save();

            return redirect()->route('dokter.pasien');
        } catch (Exception $e) {
            return redirect()
                ->route('dokter.pasien')
                ->with('error', $e->getMessage());
        }
    }

    public function setSelesai(Pendaftaran $pendaftaran)
    {
        try {
            if (is_null($pendaftaran->obat_id) || is_null($pendaftaran->soap_id) || is_null($pendaftaran->lab_id)) {
                throw new Exception("Mohon isi SOAP, Resep dan Lab terlebih dahulu");
            }

            $pendaftaran->status = "Selesai";
            return redirect()->route('dokter.pasien.selesai', ['id' => $pendaftaran->id]);
        } catch (Exception $e) {
            return redirect()
                ->route('dokter.pasien')
                ->with('error', $e->getMessage());
        }
    }

    public function selesai($id)
    {
        try {
            $pendaftaran = Pendaftaran::find($id);
            return view('resume_medis', compact('pendaftaran'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
