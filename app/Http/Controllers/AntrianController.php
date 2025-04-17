<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    // public function index()
    // {
    //     $antrian = Antrian::getCurrentAntrian();
    //     return view('perawat.antrian', compact('antrian'));
    // }

    public function next()
    {
        $antrian = Antrian::getCurrentAntrian();
        $nextNumber = $antrian->next();

        return response()->json([
            'nomor' => $nextNumber,
            'audio' => "Antrian Nomor $nextNumber"
        ]);
    }

    public function reset()
    {
        $antrian = Antrian::getCurrentAntrian();
        $antrian->reset();

        return redirect()->back()->with('success', 'Antrian telah direset');
    }
}
