<?php

namespace App\Http\Controllers;

use App\Models\KonsistensiRasio;
use Illuminate\Http\Request;

class NormalisasiController extends Controller
{
    public function index()
    {
        $konsistensis = KonsistensiRasio::all();

        return view('pages.normalisasi', compact('konsistensis'));
    }
}
