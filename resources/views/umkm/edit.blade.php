{{-- Menggunakan layout utama aplikasi --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Edit UMKM</h2>
            <a href="{{ route('umkm.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        {{-- Menampilkan pesan sukses atau error --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops!</strong> Ada masalah dengan input Anda:
                <ul class="mt-3 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('umkm.update', $umkm->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- PENTING: Untuk menandakan ini adalah request UPDATE --}}

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama UMKM</label>
                <input type="text" name="name" id="name"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                       value="{{ old('name', $umkm->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="category" id="category"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                    <option value="">Pilih Kategori</option>
                    <option value="Retail" {{ old('category', $umkm->category) == 'Retail' ? 'selected' : '' }}>Retail</option>
                    <option value="Food & Beverage" {{ old('category', $umkm->category) == 'Food & Beverage' ? 'selected' : '' }}>Food & Beverage</option>
                    <option value="Automotive" {{ old('category', $umkm->category) == 'Automotive' ? 'selected' : '' }}>Automotive</option>
                    <option value="Fashion" {{ old('category', $umkm->category) == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                    <option value="Services" {{ old('category', $umkm->category) == 'Services' ? 'selected' : '' }}>Services</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="district" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                <select name="district" id="district"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                    <option value="">Pilih Kecamatan</option>
                    <option value="Kec. Menteng" {{ old('district', $umkm->district) == 'Kec. Menteng' ? 'selected' : '' }}>Kec. Menteng</option>
                    <option value="Kec. Gambir" {{ old('district', $umkm->district) == 'Kec. Gambir' ? 'selected' : '' }}>Kec. Gambir</option>
                    <option value="Kec. Senen" {{ old('district', $umkm->district) == 'Kec. Senen' ? 'selected' : '' }}>Kec. Senen</option>
                    <option value="Kec. Cempaka Putih" {{ old('district', $umkm->district) == 'Kec. Cempaka Putih' ? 'selected' : '' }}>Kec. Cempaka Putih</option>
                    <option value="Kec. Johar Baru" {{ old('district', $umkm->district) == 'Kec. Johar Baru' ? 'selected' : '' }}>Kec. Johar Baru</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                          >{{ old('description', $umkm->description) }}</textarea>
            </div>

            {{-- Bagian Upload Gambar --}}
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Foto Profil UMKM</label>
                @if ($umkm->image)
                    <div class="mt-2 mb-3">
                        <p class="text-sm text-gray-600">Gambar saat ini:</p>
                        <img src="{{ asset('storage/' . $umkm->image) }}" alt="Foto UMKM saat ini" class="w-32 h-32 object-cover rounded-md shadow-sm">
                    </div>
                @else
                    <div class="mt-2 mb-3">
                        <p class="text-sm text-gray-600">Tidak ada gambar saat ini.</p>
                        <img src="{{ asset('images/default_profile.png') }}" alt="Default Foto" class="w-32 h-32 object-cover rounded-md border border-gray-300">
                    </div>
                @endif
                <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                <p class="mt-1 text-sm text-gray-500">Biarkan kosong jika tidak ingin mengubah gambar.</p>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('umkm.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Batal
                </a>
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Perbarui UMKM
                </button>
            </div>
        </form>
    </div>
</div>
@endsection