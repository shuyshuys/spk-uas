<?php

namespace App\Http\Controllers;

use App\Models\MatriksKeputusan;
use Illuminate\Http\Request;

class MatriksKeputusanController extends Controller
{
    public function index()
    {
        $matriks = MatriksKeputusan::with(['kriteria', 'alternatif'])->get();

        // Group by kriteria_id and then by alternatif_id
        $matriksGrouped = $matriks->groupBy('kriteria_id');

        return view('pages.matriks-keputusan', compact('matriksGrouped'));
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
