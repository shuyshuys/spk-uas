<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;

class MatriksRataRataController extends Controller
{
    public function index()
    {
        $hasils = Hasil::orderBy('id', 'desc')->limit(5)->get();

        return view('pages.matriks-rata-rata', compact('hasils'));
    }
}
