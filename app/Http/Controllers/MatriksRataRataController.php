<?php

namespace App\Http\Controllers;

use App\Models\KonsistensiRasio;
use Illuminate\Http\Request;

class MatriksRataRataController extends Controller
{
    public function index()
    {
        $konsistensis = KonsistensiRasio::all();

        return view('pages.matriks-rata-rata', compact('konsistensis'));
    }
}
