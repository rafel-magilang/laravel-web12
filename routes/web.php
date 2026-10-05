<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat datang di website kampus PCR';
});

Route::get('/mahasiswa', function () {
    return 'Halo mahasiswa';
})->name('mahasiswa.show');

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya : ' . $param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'nim saya : ' . $param1;
});

Route::get('/mahasiswa/detail', function () {
    return view('halaman-mahasiswa-detail');
});

Route::get('/mahasiswa/profil', function () {
    return view('halaman-mahasiswa-profil');
});

Route::get('/about', function () {
    return view('halaman-about');
});



use App\Http\Controllers\MataKuliahController;

Route::get('/mata-kuliah', [MataKuliahController::class, 'index']);
Route::get('/mata-kuliah/show/{kode?}', [MataKuliahController::class, 'show']);
