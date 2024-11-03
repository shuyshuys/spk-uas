<?php

namespace App\Http\Controllers;

use App\Models\PerbandinganKriteria;
use Illuminate\Http\Request;

class PerbandinganKriteriaController extends Controller
{
    public function index()
    {
        $perbandingans = PerbandinganKriteria::all();
        return view('pages.perbandingan-kriteria', compact('perbandingans'));
    }
}
