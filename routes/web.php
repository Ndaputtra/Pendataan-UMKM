<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [UmkmController::class, 'welcome'])->name('welcome');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
require __DIR__.'/auth.php';
// Arahkan logout POST ke method 'logout' di LoginController (untuk logout sesi web)

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/'); // ke halaman landing
})->name('logout');


// Jika Anda menggunakan resource controller
Route::resource('umkm', UmkmController::class);

// Atau jika Anda mendefinisikan rute secara manual
Route::delete('/umkm/{umkm}', [UmkmController::class, 'destroy'])->name('umkm.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UmkmController::class, 'dashboard'])->name('dashboard');

    // Mengganti rute umkm.store dan umkm.destroy yang lama
    Route::post('/umkm', [UmkmController::class, 'store'])->name('umkm.store'); // Dihapus/diganti
    Route::delete('/umkm/{id}', [UmkmController::class, 'destroy'])->name('umkm.destroy'); // Dihapus/diganti

    // Menggunakan Route::resource untuk UMKM
    // Ini akan otomatis membuat rute:
    // GET    /umkm           -> umkm.index
    // GET    /umkm/create    -> umkm.create
    // POST   /umkm           -> umkm.store
    // GET    /umkm/{umkm}    -> umkm.show
    // GET    /umkm/{umkm}/edit -> umkm.edit
    // PUT/PATCH /umkm/{umkm} -> umkm.update
    // DELETE /umkm/{umkm}   -> umkm.destroy
    Route::resource('umkm', UmkmController::class);
});