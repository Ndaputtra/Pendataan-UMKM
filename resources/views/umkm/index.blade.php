{{-- Menggunakan layout utama aplikasi --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl w-full bg-white p-8 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Daftar UMKM</h2>
            <a href="{{ route('umkm.create') }}"
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="fas fa-plus-circle mr-2"></i> Tambah UMKM Baru
            </a>
        </div>

        {{-- Menampilkan pesan sukses atau error --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Berhasil!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th> {{-- <-- Pastikan kolom ini ada --}}
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama UMKM</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kecamatan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($umkms as $umkm_item) {{-- <-- Pastikan $umkms dan $umkm_item digunakan --}}
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{-- INI ADALAH KODE UNTUK MENAMPILKAN GAMBAR --}}
                            @if ($umkm_item->image)
                                <img src="{{ asset('storage/' . $umkm_item->image) }}" alt="Foto {{ $umkm_item->name }}" class="w-10 h-10 object-cover rounded-full">
                            @else
                                <img src="{{ asset('images/default_profile.png') }}" alt="Default" class="w-10 h-10 object-cover rounded-full border border-gray-300">
                            @endif
                        </td>
                        {{-- Pastikan nama kolom sesuai DB --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $umkm_item->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $umkm_item->category }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $umkm_item->district }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('umkm.show', $umkm_item->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Lihat</a>
                            <a href="{{ route('umkm.edit', $umkm_item->id) }}" class="text-green-600 hover:text-green-900 mr-3">Edit</a>
                            <form action="{{ route('umkm.destroy', $umkm_item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus UMKM ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Belum ada data UMKM.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{-- {{ $umkms->links() }} --}}
        </div>
    </div>
</div>
@endsection