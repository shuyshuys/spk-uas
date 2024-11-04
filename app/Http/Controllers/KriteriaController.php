<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        $hasils = Hasil::orderBy('id', 'desc')->limit(3)->get();

        return view('pages.kriteria', compact('kriterias', 'hasils'));
    }
}
