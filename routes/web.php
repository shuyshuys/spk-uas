<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonsistensiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MatriksKeputusanController;
use App\Http\Controllers\MatriksRataRataController;
use App\Http\Controllers\NormalisasiController;
use App\Http\Controllers\PerbandinganKriteriaController;
use App\Http\Controllers\SawController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('');
// })->name('homepage');

Route::get('/', function () {
    return view('pages.coming-soon');
})->name('index');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria');

Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif');

Route::get('/ahp', [PerbandinganKriteriaController::class, 'index'])->name('perbandingan-kriteria');

Route::post('/perbandingan-kriteria/update', [PerbandinganKriteriaController::class, 'update'])->name('perbandingan-kriteria.update');

Route::post('/perbandingan-kriteria/save-bobot', [PerbandinganKriteriaController::class, 'saveBobot'])->name('perbandingan-kriteria.save-bobot');

Route::get('/saw', [SawController::class, 'index'])->name('saw');

Route::get('/matriks-keputusan', [MatriksKeputusanController::class, 'index'])->name('matriks-keputusan');

// Route::get('/normalisasi', [NormalisasiController::class, 'index'])->name('normalisasi');

Route::get('/matriks-rata-rata', [MatriksRataRataController::class, 'index'])->name('matriks-rata-rata');

Route::get('/konsistensi', [KonsistensiController::class, 'index'])->name('konsistensi');

Route::get('/hasil', [HasilController::class, 'index'])->name('hasil');

Route::post('/perhitungan', function () {
    return view('pages.perhitungan');
})->name('perhitungan');

Route::get('/ranking', function () {
    return view('pages.ranking');
})->name('ranking');


Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
})->name('privacy-policy');

Route::get('/terms-of-use', function () {
    return view('pages.terms-of-use');
})->name('terms-of-use');

Route::get('/faqs', function () {
    return view('pages.faqs');
})->name('faqs');
