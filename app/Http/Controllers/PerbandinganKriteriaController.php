<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
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


        return view('pages.perbandingan-kriteria', compact('perbandingansGrouped', 'perbandingans', 'kriteria', 'hasils'));
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
}
