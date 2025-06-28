@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-100">
    <div class="hidden md:flex md:flex-shrink-0">
        <div class="flex flex-col w-64 bg-blue-800 text-white">
            <div class="flex items-center justify-center h-16 px-4 border-b border-blue-700">
                <i class="fas fa-store text-2xl mr-2"></i>
                <span class="text-xl font-semibold">UMKM Data</span>
            </div>
            <nav class="flex-1 space-y-2 px-4 py-4">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg">
                    <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                </a>
                {{-- Logout Form - Diaktifkan --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center px-4 py-3 w-full text-left text-blue-200 hover:text-white hover:bg-blue-700 rounded-lg">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
    </div>
    <div class="flex flex-col flex-1 overflow-hidden">
        <div class="flex items-center justify-between h-16 px-4 bg-white border-b border-gray-200">
            <div class="flex items-center">
                <button class="md:hidden text-gray-500 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="ml-4 text-lg font-semibold text-gray-800">Dashboard</h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <button class="text-gray-500 focus:outline-none">
                        <i class="fas fa-bell"></i>
                    </button>
                    <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
                </div>
                <div class="flex items-center">
                    {{-- Pastikan menggunakan nama_lengkap sesuai DB di model User --}}
                    {{-- Ini akan berfungsi jika Auth::user() tersedia dan memiliki kolom 'nama_lengkap' --}}
                    @auth
                        <img class="h-8 w-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}" alt="User profile">
                        <span class="ml-2 text-sm font-medium text-gray-700">{{ Auth::user()->name ?? 'Guest' }}</span>
                    @else
                        <img class="h-8 w-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name=Guest" alt="Guest profile">
                        <span class="ml-2 text-sm font-medium text-gray-700">Guest</span>
                    @endauth
                </div>
            </div>
        </div>
        <main class="flex-1 overflow-y-auto p-4 bg-gray-50">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-all card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total UMKM</p>
                            {{-- Menggunakan $totalUmkm dari Controller --}}
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalUmkm }}</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-store text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-all card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Districts</p>
                            {{-- Menggunakan $districts dari Controller --}}
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $districts->count() }}</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-map-marked-alt text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-all card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Categories</p>
                            {{-- Menggunakan $categories dari Controller --}}
                            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $categories }}</p>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-tags text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">Recent UMKM</h2>
                        {{-- Mengubah link "View All" untuk mengarah ke umkm.index --}}
                        <a href="{{ route('umkm.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            View All
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    {{-- BARU: Kolom Foto --}}
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">District</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                {{-- Menggunakan @forelse untuk menangani kasus kosong --}}
                                {{-- Pastikan nama variabel adalah $umkms (plural) sesuai controller --}}
                                @forelse($umkms as $umkmItem)
                                    <tr>
                                        {{-- BARU: Tampilkan Foto Profil UMKM --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            @if ($umkmItem->image)
                                                <img src="{{ asset('storage/' . $umkmItem->image) }}" alt="Foto {{ $umkmItem->name }}" class="w-10 h-10 object-cover rounded-full">
                                            @else
                                                <img src="{{ asset('images/default_profile.png') }}" alt="Default" class="w-10 h-10 object-cover rounded-full border border-gray-300">
                                            @endif
                                        </td>
                                        {{-- Menggunakan nama kolom yang benar dari DB --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $umkmItem->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $umkmItem->category }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $umkmItem->district }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{-- Link Lihat Detail (jika ada route show di dashboard) --}}
                                            <a href="{{ route('umkm.show', $umkmItem->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                            {{-- Tombol Edit --}}
                                            <a href="{{ route('umkm.edit', $umkmItem->id) }}" class="text-blue-600 hover:text-blue-900 mr-2" title="Edit UMKM"><i class="fas fa-edit"></i></a>
                                            {{-- Form Hapus --}}
                                            <form method="POST" action="{{ route('umkm.destroy', $umkmItem->id) }}" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus UMKM ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus UMKM"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- Ini akan ditampilkan jika $umkms kosong --}}
                                    <tr>
                                        {{-- PERBAIKAN: colspan menjadi 5 karena ada kolom Foto --}}
                                        <td colspan="5" class="text-center text-gray-500 py-4">Belum ada data UMKM.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- **PILIHAN 1: FORM UNTUK MENAMBAHKAN SATU UMKM SAJA** --}}
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Add New UMKM (Single)</h2>
                    <form method="POST" action="{{ route('umkm.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" class="w-full mb-4 px-3 py-2 border border-gray-300 rounded-md" placeholder="UMKM Name" required>
                        <select name="category" class="w-full mb-4 px-3 py-2 border border-gray-300 rounded-md" required>
                            <option value="">Select Category</option>
                            <option>Retail</option>
                            <option>Food & Beverage</option>
                            <option>Automotive</option>
                            <option>Fashion</option>
                            <option>Services</option>
                        </select>
                        <select name="district" class="w-full mb-4 px-3 py-2 border border-gray-300 rounded-md" required>
                            <option value="">Select District</option>
                            <option>Kec. Genteng</option>
                            <option>Kec. Tegalsari</option>
                            <option>Kec. Simokerto</option>
                            <option>Kec. Bubutan</option>
                            <option>Kec. Wonokromo</option>
                            <option>Kec. Wonocolo</option>
                            <option>Kec. Wiyung</option>
                            <option>Kec. Karangpilang</option>
                            <option>Kec. Jambangan</option>
                            <option>Kec. Gayungan</option>
                            <option>Kec. Sawahan</option>
                            <option>Kec. Dukuh Pakis</option>
                        </select>
                        <textarea name="description" rows="3" class="w-full mb-4 px-3 py-2 border border-gray-300 rounded-md" placeholder="Description"></textarea>
                        <label for="image_upload" class="block text-sm font-medium text-gray-700 mb-1">Pilih File</label>
                        <input type="file" name="image" id="image_upload" class="mb-4">
                        <button type="submit" class="w-full py-2 px-4 rounded-md text-white bg-blue-600 hover:bg-blue-700">Add UMKM</button>
                    </form>
                </div>

                {{-- **PILIHAN 2: FORM UNTUK MENAMBAHKAN BANYAK UMKM SEKALIGUS (dengan JS)** --}}
                {{-- Anda bisa mengaktifkan form ini dengan menghapus komentar jika ingin fitur multiple add --}}
                {{-- END OF PILIHAN 2 --}}

            </div>
            <div class="mt-6 bg-white p-6 rounded-lg shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">UMKM by District</h2>
                    {{-- Ini tetap mengarah ke dashboard karena mungkin tidak ada halaman detail untuk distrik --}}
                    <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        View Details
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach($districts as $district)
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-gray-800">{{ $district }}</h3>
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                {{ $umkms->where('district', $district)->count() }} UMKM {{-- Menggunakan $umkms --}}
                            </span>
                        </div>
                        <div class="mt-2 h-2 w-full bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-500 rounded-full" style="width: {{ $umkms->where('district', $district)->count() / max(1, $umkms->count()) * 100 }}%"></div> {{-- Menggunakan $umkms --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>

{{-- Script JavaScript untuk fitur Add Another UMKM (jika Anda memilih Pilihan 2) --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addUmkmRowButton = document.getElementById('add-umkm-row');
        if (addUmkmRowButton) { // Hanya jalankan jika tombol ada (yaitu, jika Pilihan 2 diaktifkan)
            let umkmCount = 1; // Mulai dari 1 karena indeks pertama di HTML adalah 0

            addUmkmRowButton.addEventListener('click', function() {
                const container = document.getElementById('umkm-entries-container');
                const newEntry = document.createElement('div');
                newEntry.classList.add('umkm-entry', 'border', 'p-4', 'mb-4', 'rounded-md', 'bg-gray-50');
                newEntry.innerHTML = `
                    <h3 class="font-semibold mb-2">UMKM #${umkmCount + 1}</h3>
                    <input type="text" name="umkms[${umkmCount}][name]" class="w-full mb-2 px-3 py-2 border border-gray-300 rounded-md" placeholder="UMKM Name" required>
                    <select name="umkms[${umkmCount}][category]" class="w-full mb-2 px-3 py-2 border border-gray-300 rounded-md" required>
                        <option value="">Select Category</option>
                        <option>Retail</option>
                        <option>Food & Beverage</option>
                        <option>Automotive</option>
                        <option>Fashion</option>
                        <option>Services</option>
                    </select>
                    <select name="umkms[${umkmCount}][district]" class="w-full mb-2 px-3 py-2 border border-gray-300 rounded-md" required>
                        <option value="">Select District</option>
                        <option>Kec. Genteng</option>
                        <option>Kec. Tegalsari</option>
                        <option>Kec. Simokerto</option>
                        <option>Kec. Bubutan</option>
                        <option>Kec. Wonokromo</option>
                        <option>Kec. Wonocolo</option>
                        <option>Kec. Wiyung</option>
                        <option>Kec. Karangpilang</option>
                        <option>Kec. Jambangan</option>
                        <option>Kec. Gayungan</option>
                        <option>Kec. Sawahan</option>
                        <option>Kec. Dukuh Pakis</option>
                    </select>
                    <textarea name="umkms[${umkmCount}][description]" rows="3" class="w-full mb-2 px-3 py-2 border border-gray-300 rounded-md" placeholder="Description"></textarea>
                    <label for="image_${umkmCount}" class="block text-sm font-medium text-gray-700">Image for UMKM #${umkmCount + 1}</label>
                    <input type="file" name="umkms[${umkmCount}][image]" id="image_${umkmCount}" class="mb-2">
                    <button type="button" class="remove-umkm-row text-red-600 hover:text-red-900 text-sm mt-2">Remove This UMKM</button>
                `;
                container.appendChild(newEntry);

                // Tambahkan event listener untuk tombol remove pada baris baru
                newEntry.querySelector('.remove-umkm-row').addEventListener('click', function() {
                    newEntry.remove();
                });

                umkmCount++;
            });

            // Event listener untuk tombol remove pada baris yang sudah ada (jika ada)
            document.querySelectorAll('.remove-umkm-row').forEach(button => {
                button.addEventListener('click', function() {
                    button.closest('.umkm-entry').remove();
                });
            });
        }
    });
</script>
@endpush

{{-- PASTIKAN ANDA MEMILIKI @stack('scripts') DI FILE LAYOUTS/APP.BLADE.PHP ANDA, SEBELUM TAG </body> --}}