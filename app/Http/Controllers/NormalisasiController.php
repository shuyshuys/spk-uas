<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\MatriksKeputusan;
use App\Models\PerbandinganKriteria;
use Illuminate\Http\Request;

class NormalisasiController extends Controller
{
    public function index()
    {
        $matriks = MatriksKeputusan::with(['kriteria'])->get();
        $hasils = Hasil::orderBy('id', 'desc')->limit(5)->get();

        // Group by kriteria_id and then by alternatif_id
        $matriksGrouped = $matriks->groupBy('kriteria_id');

        $perbandingans = PerbandinganKriteria::all();
        $perbandingansGrouped = $perbandingans->groupBy('kriteria2_id');

        return view('pages.matriks-keputusan', compact('matriksGrouped', 'hasils', 'perbandingansGrouped'));
    }

    public function update(Request $request)
    {
        $updates = $request->input('updates');

        foreach ($updates as $update) {
            $matriksKeputusan = MatriksKeputusan::find($update['id']);
            if ($matriksKeputusan) {
                $matriksKeputusan->nilai = $update['nilai'];
                $matriksKeputusan->save();
            }
        }

        return response()->json(['success' => true]);
    }
}
