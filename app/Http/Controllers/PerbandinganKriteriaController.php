<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\KonsistensiRasio;
use App\Models\Kriteria;
use App\Models\PerbandinganKriteria;
use Illuminate\Http\Request;

class PerbandinganKriteriaController extends Controller
{
    public function index()
    {
        $perbandingans = PerbandinganKriteria::all();
        $hasils = Hasil::orderBy('id', 'desc')->limit(3)->get();
        $kriteria = Kriteria::all();
        $perbandingansGrouped = $perbandingans->groupBy('kriteria2_id');
        $perbandingans = PerbandinganKriteria::all()->groupBy('kriteria1_id');
        $konsistensis = KonsistensiRasio::all();

        return view('pages.perbandingan-kriteria', compact('perbandingansGrouped', 'perbandingans', 'kriteria', 'hasils', 'konsistensis'));
    }

    public function update(Request $request)
    {
        $updates = $request->input('updates');

        foreach ($updates as $update) {
            $perbandingan = PerbandinganKriteria::find($update['id']);
            if ($perbandingan) {
                $perbandingan->nilai_perbandingan = $update['nilai_perbandingan'];
                $perbandingan->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function saveBobot(Request $request)
    {
        $bobots = $request->input('bobots');
        // dd($bobots);

        foreach ($bobots as $bobot) {
            $kriteria = Kriteria::find($bobot['kriteria']);
            if ($kriteria) {
                $kriteria->bobot = $bobot['bobot'];
                $kriteria->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function storeHasil(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            't' => 'required|numeric',
            'ci' => 'required|numeric',
            'ri' => 'required|numeric',
            'hasil' => 'required|string|in:Konsisten,Tidak Konsisten',
        ]);

        Hasil::create($validatedData);

        return response()->json(['success' => true]);
        // $alternatifId = $request->input('alternatif_id');
        // $hasil = $request->input('hasil');

        // Hasil::create([
        //     'alternatif_id' => $alternatifId,
        //     'hasil' => $hasil
        // ]);

        // return response()->json(['success' => true]);
    }
}
