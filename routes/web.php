<?php

use App\Http\Controllers\AlternatifController;
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

Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/kriteria', function () {
    return view('pages.kriteria');
})->name('kriteria');

Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif');

Route::get('/perbandingan-kriteria', function () {
    return view('pages.perbandingan-kriteria');
})->name('perbandingan-kriteria');

Route::get('/matriks-keputusan', function () {
    return view('pages.matriks-keputusan');
})->name('matriks-keputusan');

Route::get('/normalisasi', function () {
    return view('pages.normalisasi');
})->name('normalisasi');

Route::get('/matriks-rata-rata', function () {
    return view('pages.matriks-rata-rata');
})->name('matriks-rata-rata');

Route::get('/konsistensi', function () {
    return view('pages.konsistensi');
})->name('konsistensi');

Route::get('/hasil', function () {
    return view('pages.hasil');
})->name('hasil');

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
