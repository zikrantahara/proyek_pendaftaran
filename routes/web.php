<?php

use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route ini akan menangani semua request CRUD untuk pendaftaran
Route::resource('pendaftaran', PendaftaranController::class);

// TAMBAHKAN ROUTE DI BAWAH INI
Route::get('pendaftaran-export', [PendaftaranController::class, 'export'])->name('pendaftaran.export');

// TAMBAHKAN DUA ROUTE DI BAWAH INI
Route::get('pendaftaran-import', [PendaftaranController::class, 'showImportForm'])->name('pendaftaran.show_import_form');
Route::post('pendaftaran-import', [PendaftaranController::class, 'import'])->name('pendaftaran.import');
