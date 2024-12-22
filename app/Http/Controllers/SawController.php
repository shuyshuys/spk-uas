<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Hasil;
use App\Models\Kriteria;
use App\Models\MatriksKeputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SawController extends Controller
{
    public function index()
    {
        $hasils = Hasil::orderBy('id', 'desc')->limit(3)->get();
        $saws = AlternatifKriteria::all();
        $bobots = MatriksKeputusan::all();
        // Fetch all alternatives and criteria
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all();

        $sawsGrouped = $saws->groupBy('alternatif_id');

        // Ensure all alternatives have entries in the alternatif-kriterias table
        foreach ($alternatifs as $alternatif) {
            foreach ($kriterias as $kriteria) {
                AlternatifKriteria::firstOrCreate(
                    ['alternatif_id' => $alternatif->id, 'kriteria_id' => $kriteria->id],
                    ['nilai' => 0] // Default initial value
                );
            }
        }

        return view('pages.saw', compact('hasils', 'saws', 'sawsGrouped', 'bobots'));
    }

    public function updateAlternatifKriteria(Request $request)
    {
        $data = $request->input('data');

        foreach ($data as $item) {
            DB::table('alternatif_kriterias')
                ->updateOrInsert(
                    ['alternatif_id' => $item['alternatif_id'], 'kriteria_id' => $item['kriteria_id']],
                    ['nilai' => $item['nilai']]
                );
        }

        return response()->json(['success' => true]);
        // return redirect()->route('saw');
    }
}
