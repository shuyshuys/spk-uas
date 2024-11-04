<?php

namespace App\Http\Controllers;

use App\Models\AlternatifKriteria;
use App\Models\Hasil;
use Illuminate\Http\Request;

class SawController extends Controller
{
    public function index()
    {
        $hasils = Hasil::orderBy('id', 'desc')->limit(5)->get();
        $saws = AlternatifKriteria::all();

        $sawsGrouped = $saws->groupBy('alternatif_id');

        return view('pages.saw', compact('hasils', 'saws', 'sawsGrouped'));
    }
}
