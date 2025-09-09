<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Exports\KaryawanExport;
use App\Imports\KaryawanImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

// Route utama → redirect ke daftar karyawan
Route::get('/', function () {
    return redirect()->route('karyawan.index');
});

// Route resource untuk CRUD karyawan
Route::resource('karyawan', KaryawanController::class);

// Route untuk export data karyawan ke Excel
Route::get('/export-karyawan', function () {
    return Excel::download(new KaryawanExport, 'karyawan.xlsx');
})->name('karyawan.export');

// Route untuk menampilkan form import Excel
Route::get('/import-karyawan', function () {
    return view('karyawan.import'); // file blade import
})->name('karyawan.import');

// Route untuk memproses upload dan import Excel
Route::post('/import-karyawan', function (Request $request) {
    // Validasi file Excel
    $request->validate([
        'file' => 'required|mimes:xlsx,csv'
    ]);

    $file = $request->file('file');

    // Import Excel ke database dengan update jika duplikat
    Excel::import(new KaryawanImport, $file);

    return redirect()->back()->with('success', 'Data berhasil diimport dan update jika duplikat!');
})->name('karyawan.import.post');
