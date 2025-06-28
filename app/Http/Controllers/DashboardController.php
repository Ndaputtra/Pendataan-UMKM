<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data UMKM
        // Jika Anda ingin UMKM yang hanya dimiliki oleh user yang sedang login:
        // $umkms = Auth::user()->umkms;
        // Pastikan relasi 'umkms' ada di model User Anda:
        // public function umkms() { return $this->hasMany(Umkm::class); }

        // Jika Anda ingin semua UMKM terlepas dari user:
        $umkms = Umkm::all(); // Ini adalah koleksi UMKM Anda

        // Menghitung total UMKM dari koleksi yang sudah diambil
        $totalUmkm = $umkms->count(); // Gunakan $umkms

        // Mengambil daftar distrik unik dari koleksi UMKM
        $districts = $umkms->pluck('district')->unique()->sort()->values(); // Gunakan $umkms

        // Mengambil jumlah kategori unik dari koleksi UMKM
        $categories = $umkms->pluck('category')->unique()->count(); // Gunakan $umkms


        // Mengirimkan variabel yang diperlukan ke view
        // Pastikan nama variabel di compact() sesuai dengan yang Anda gunakan
        return view('dashboard.index', compact('umkms', 'totalUmkm', 'districts', 'categories')); // Gunakan 'umkms'
    }
}