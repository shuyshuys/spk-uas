<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\KonsistensiRasio;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $konsistensis = KonsistensiRasio::all();

        return view('pages.alternatif', compact('alternatifs', 'konsistensis'));
    }
}