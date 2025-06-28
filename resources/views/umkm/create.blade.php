{{-- Menggunakan layout utama aplikasi --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Tambah UMKM Baru</h2>
            <p class="mt-2 text-sm text-gray-600">Masukkan detail UMKM yang ingin Anda tambahkan.</p>
        </div>

        {{-- Menampilkan pesan sukses atau error --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form untuk menambahkan UMKM --}}
        <form action="{{ route('umkm.store') }}" method="POST" class="space-y-6">
            @csrf {{-- Token CSRF untuk keamanan Laravel --}}

            {{-- Nama UMKM --}}
            <div>
                <label for="nama_umkm" class="block text-sm font-medium text-gray-700">Nama UMKM</label>
                <input type="text" name="nama_umkm" id="nama_umkm" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       value="{{ old('nama_umkm') }}">
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                          >{{ old('deskripsi') }}</textarea>
            </div>

            {{-- Kategori --}}
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" name="kategori" id="kategori" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       value="{{ old('kategori') }}">
            </div>

            {{-- Alamat --}}
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                <textarea name="alamat" id="alamat" rows="2" required
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                          >{{ old('alamat') }}</textarea>
            </div>

            {{-- Kecamatan --}}
            <div>
                <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       value="{{ old('kecamatan') }}">
            </div>

            {{-- Telepon --}}
            <div>
                <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" name="telepon" id="telepon"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       value="{{ old('telepon') }}">
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email (Opsional)</label>
                <input type="email" name="email" id="email"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       value="{{ old('email') }}">
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('umkm.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan UMKM
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
