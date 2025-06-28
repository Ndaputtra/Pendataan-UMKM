<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UmkmController;

// Rute untuk menguji koneksi API secara umum
Route::get('/test', function () {
    return response()->json([
        'message' => 'API Berhasil!',
        'status' => 'success'
    ]);
});

// Endpoint CRUD UMKM (contoh statis, bisa diganti pakai controller)
Route::get('/umkm', function () {
    return response()->json([
        [
            'id' => 1,
            'nama' => 'UMKM Bakso Pak Slamet',
            'kategori' => 'Kuliner',
            'lokasi' => 'Kecamatan Sukajadi',
            'deskripsi' => 'Bakso enak dan murah.'
        ],
        [
            'id' => 2,
            'nama' => 'UMKM Batik Melati',
            'kategori' => 'Kerajinan',
            'lokasi' => 'Kecamatan Tamansari',
            'deskripsi' => 'Batik khas daerah.'
        ]
    ]);
});
Route::post('/umkm', function (Request $request) {
    return response()->json([
        'message' => 'UMKM berhasil ditambahkan!',
        'data' => $request->all()
    ], 201);
});
Route::put('/umkm/{id}', function ($id, Request $request) {
    return response()->json([
        'message' => "UMKM id $id berhasil diupdate!",
        'data' => $request->all()
    ]);
});
Route::delete('/umkm/{id}', function ($id) {
    return response()->json([
        'message' => "UMKM id $id berhasil dihapus!"
    ], 204);
});

// AUTH API
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route yang butuh token (login dulu)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});

Route::delete('/umkm/{id}', function ($id) {
    return response()->json([
        'message' => "UMKM id $id berhasil dihapus!"
    ], 204);
});
