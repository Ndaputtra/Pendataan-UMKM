<?php

namespace App\Http\Controllers;

use App\Models\Umkm; // Pastikan ini ada dan mengarah ke model UMKM Anda
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk manajemen file
use Illuminate\Support\Facades\Auth; // Penting untuk mengakses user login

class UmkmController extends Controller
{
    /**
     * Menampilkan halaman selamat datang.
     *
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Menampilkan halaman dashboard dengan ringkasan data UMKM.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Mendapatkan semua data UMKM untuk statistik dan tabel terbaru
        // Pastikan Anda mendapatkan *koleksi* dari UMKM.
        // Jika Anda ingin UMKM yang hanya dimiliki oleh user yang sedang login:
        // $umkms = Auth::user()->umkms()->latest()->get(); // Perlu relasi umkms di model User
        // Jika Anda ingin semua UMKM terlepas dari user:
        $umkms = Umkm::latest()->get(); // Mengambil semua UMKM terbaru sebagai koleksi

        // Menghitung total UMKM dari koleksi yang sudah diambil
        $totalUmkm = $umkms->count();

        // Mengambil daftar distrik unik dari koleksi UMKM
        // Gunakan pluck('district') untuk mendapatkan array nilai distrik, unique(), lalu values()
        $districts = $umkms->pluck('district')->unique()->sort()->values();

        // Mengambil jumlah kategori unik dari koleksi UMKM
        $categories = $umkms->pluck('category')->unique()->count();

        // Mengirimkan variabel yang diperlukan ke view 'dashboard.blade.php'
        // Gunakan 'umkms' (plural) untuk koleksi data UMKM
        return view('dashboard', compact('umkms', 'totalUmkm', 'districts', 'categories'));
    }

    /**
     * Menampilkan daftar semua UMKM. Berfungsi sebagai endpoint Web dan API.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $umkms = Umkm::all(); // Mengambil semua data UMKM

        // Jika permintaan adalah AJAX (misalnya dari aplikasi frontend atau Postman), kembalikan JSON
        if (request()->expectsJson()) {
            return response()->json($umkms);
        }

        // Jika permintaan dari web browser, kembalikan view
        return view('umkm.index', compact('umkms'));
    }

    /**
     * Menampilkan formulir untuk membuat UMKM baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Method ini hanya perlu mengembalikan view yang berisi form tambah UMKM
        return view('umkm.create');
    }

    /**
     * Menyimpan UMKM baru ke database (SINGLE UMKM). Berfungsi untuk permintaan Web dan API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Lakukan validasi data yang masuk dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240' // Validasi untuk file gambar (max 10MB)
        ]);

        // Tangani upload gambar jika ada
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('umkm-images', 'public');
        } else {
            $validatedData['image'] = null; // Pastikan image diset null jika tidak ada file diupload
        }

        // Tambahkan user_id dari user yang sedang login
        if (Auth::check()) {
            $validatedData['user_id'] = Auth::id();
        } else {
            // Jika user tidak login, ini adalah error karena user_id NOT NULL
            return redirect()->back()->withErrors('Anda harus login untuk menambahkan UMKM.');
        }

        // Buat entri UMKM baru di database
        $umkm = Umkm::create($validatedData); // Gunakan $validatedData yang sudah ada user_id

        // Jika permintaan adalah AJAX, kembalikan respons JSON
        if ($request->expectsJson()) {
            return response()->json($umkm, 201); // 201 Created
        }

        // Jika permintaan dari web browser, redirect dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'UMKM berhasil ditambahkan!'); // Redirect ke dashboard
    }

    /**
     * Menyimpan BANYAK UMKM baru ke database. (Tambahan untuk kebutuhan "banyak data UMKM").
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function storeMultiple(Request $request)
    {
        // Validasi input untuk setiap UMKM dalam array
        $request->validate([
            'umkms' => 'required|array', // Pastikan 'umkms' adalah array
            'umkms.*.name' => 'required|string|max:255', // Validasi setiap elemen array
            'umkms.*.category' => 'required|string|max:255',
            'umkms.*.district' => 'required|string|max:255',
            'umkms.*.description' => 'nullable|string',
            'umkms.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        // Pastikan user login
        if (!Auth::check()) {
            return redirect()->back()->withErrors('Anda harus login untuk menambahkan UMKM.');
        }

        $userId = Auth::id(); // Ambil ID user yang login sekali saja

        foreach ($request->input('umkms') as $key => $umkmData) {
            $dataToStore = [
                'name' => $umkmData['name'],
                'category' => $umkmData['category'],
                'district' => $umkmData['district'],
                'description' => $umkmData['description'] ?? null, // Gunakan null coalescing operator
                'user_id' => $userId, // Tambahkan user_id ke setiap entri UMKM
            ];

            // Tangani gambar untuk setiap UMKM
            if ($request->hasFile("umkms.{$key}.image")) {
                $dataToStore['image'] = $request->file("umkms.{$key}.image")->store('umkm-images', 'public');
            } else {
                $dataToStore['image'] = null;
            }

            Umkm::create($dataToStore);
        }

        return redirect()->route('dashboard')->with('success', 'Semua UMKM berhasil ditambahkan!');
    }


    /**
     * Menampilkan detail UMKM tertentu. Berfungsi untuk permintaan Web dan API.
     *
     * @param  \App\Models\Umkm  $umkm (Menggunakan Route Model Binding)
     * @return \Illuminate\View\View|\Illuminate\Http\JsonResponse
     */
    public function show(Umkm $umkm)
    {
        // Jika permintaan adalah AJAX, kembalikan JSON
        if (request()->expectsJson()) {
            return response()->json($umkm);
        }

        // Jika permintaan dari web browser, kembalikan view
        return view('umkm.show', compact('umkm'));
    }

    /**
     * Menampilkan formulir untuk mengedit UMKM yang ada.
     *
     * @param  \App\Models\Umkm  $umkm // Variabel tunggal untuk Route Model Binding
     * @return \Illuminate\View\View
     */
    public function edit(Umkm $umkm) // Ubah $umkms menjadi $umkm
    {
        // Anda mungkin ingin menambahkan otorisasi di sini, misal:
        // if (Auth::id() !== $umkm->user_id) {
        //     abort(403, 'Unauthorized action.');
        // }
        return view('umkm.edit', compact('umkm')); // Ini sekarang akan benar karena $umkm ada
    }

    /**
     * Memperbarui UMKM yang ada di database. Berfungsi untuk permintaan Web dan API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Umkm  $umkm
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Umkm $umkm)
    {
        // Anda mungkin ingin menambahkan otorisasi di sini, misal:
        // if (Auth::id() !== $umkm->user_id) {
        //     abort(403, 'Unauthorized action.');
        // }

        // Lakukan validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240' // Validasi untuk file gambar
        ]);

        // Tangani update gambar jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada dan file-nya memang ada di storage
            if ($umkm->image && Storage::disk('public')->exists($umkm->image)) {
                Storage::disk('public')->delete($umkm->image);
            }
            // Simpan gambar baru
            $validatedData['image'] = $request->file('image')->store('umkm-images', 'public');
        } else {
            // Jika tidak ada gambar baru diupload,
            // dan jika tidak ada gambar lama yang disimpan, set image ke null
            // JIKA ADA GAMBAR LAMA, JANGAN SENTUH $validatedData['image']
            // ATAU HAPUS image DARI $validatedData jika tidak ada file baru
            // ini agar tidak menimpa dengan null jika tidak ada upload baru
            unset($validatedData['image']); // Ini akan memastikan gambar lama tidak diubah jika tidak ada file baru
        }

        // Perbarui data UMKM
        $umkm->update($validatedData);

        // Jika permintaan adalah AJAX, kembalikan JSON
        if ($request->expectsJson()) {
            return response()->json($umkm);
        }

        // Jika permintaan dari web browser, redirect dengan pesan sukses
        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil diperbarui!'); // Redirect ke umkm.index
    }

    /**
     * Menghapus UMKM dari database. Berfungsi untuk permintaan Web dan API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Umkm  $umkm (Menggunakan Route Model Binding)
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Umkm $umkm)
    {
        // Anda mungkin ingin menambahkan otorisasi di sini, misal:
        // $this->authorize('delete', $umkm);

        // Hapus gambar terkait jika ada dan file-nya memang ada di storage
        if ($umkm->image && Storage::disk('public')->exists($umkm->image)) {
            Storage::disk('public')->delete($umkm->image);
        }
        $umkm->delete(); // Hapus UMKM

        // Jika permintaan adalah AJAX, kembalikan JSON
        if ($request->expectsJson()) {
            return response()->json(['message' => 'UMKM deleted successfully']);
        }

        // Jika permintaan dari web browser, redirect kembali dengan pesan sukses
        return back()->with('success', 'UMKM berhasil dihapus!');
    }
}