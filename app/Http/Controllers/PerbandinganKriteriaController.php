<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\PerbandinganKriteria;
use Illuminate\Http\Request;

class PerbandinganKriteriaController extends Controller
{
    public function index()
    {
        $perbandingans = PerbandinganKriteria::all();
        $hasils = Hasil::orderBy('id', 'desc')->limit(3)->get();
        $perbandingansGrouped = $perbandingans->groupBy('kriteria2_id');

        return view('pages.perbandingan-kriteria', compact('perbandingansGrouped', 'hasils'));
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
