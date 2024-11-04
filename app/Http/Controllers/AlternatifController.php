<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Hasil;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $hasils = Hasil::orderBy('id', 'desc')->limit(5)->get();

        return view('pages.alternatif', compact('alternatifs', 'hasils'));
    }
}
