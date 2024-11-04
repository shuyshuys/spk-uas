<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\KonsistensiRasio;
use Illuminate\Http\Request;

class KonsistensiController extends Controller
{
    public function index()
    {
        $hasils = Hasil::orderBy('id', 'desc')->limit(5)->get();
        $konsistensis = KonsistensiRasio::all();

        return view('pages.konsistensi', compact('hasils', 'konsistensis'));
    }
}
