{{-- Menggunakan layout utama aplikasi --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Detail UMKM</h2>
            <a href="{{ route('umkm.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        <div class="border-t border-gray-200">
            <dl class="divide-y divide-gray-200">
                {{-- Bagian untuk menampilkan Foto Profil UMKM --}}
                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Foto Profil</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if ($umkm->image)
                            {{-- Pastikan folder 'storage/umkm_images' sudah dilink ke public/storage --}}
                            <img src="{{ asset('storage/' . $umkm->image) }}" alt="Foto Profil {{ $umkm->name }}" class="w-32 h-32 object-cover rounded-full shadow-md">
                        @else
                            {{-- Ganti dengan path ke gambar placeholder default Anda jika belum ada foto --}}
                            <img src="{{ asset('images/default_profile.png') }}" alt="Tidak Ada Foto" class="w-32 h-32 object-cover rounded-full border border-gray-300">
                        @endif
                    </dd>
                </div>
                {{-- End of Foto Profil --}}

                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nama UMKM</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $umkm->name }}</dd>
                </div>
                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Deskripsi</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $umkm->description ?? '-' }}</dd>
                </div>
                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $umkm->category }}</dd>
                </div>
                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Kecamatan</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $umkm->district }}</dd>
                </div>

                {{-- Kolom-kolom opsional yang tidak ada di migrasi terakhir Anda --}}
                {{-- Uncomment dan sesuaikan jika Anda menambahkannya ke model/migrasi --}}
                {{--
                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Alamat</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $umkm->address ?? '-' }}</dd>
                </div>
                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Telepon</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $umkm->phone ?? '-' }}</dd>
                </div>
                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $umkm->email ?? '-' }}</dd>
                </div>
                --}}
                {{-- Tanggal dibuat dan diupdate --}}
                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Dibuat Pada</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $umkm->created_at->format('d M Y, H:i') }}</dd>
                </div>
                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Diperbarui Pada</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $umkm->updated_at->format('d M Y, H:i') }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('umkm.edit', $umkm->id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Edit UMKM
            </a>
            <form action="{{ route('umkm.destroy', $umkm->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus UMKM ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Hapus UMKM
                </button>
            </form>
        </div>
    </div>
</div>
@endsection