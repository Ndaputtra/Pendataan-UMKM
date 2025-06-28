@extends('layouts.app') {{-- Pastikan ini mengacu pada layout utama Anda --}}

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- Pesan Status (misal: 'Profile updated successfully!') --}}
        @if (session('status'))
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="bg-indigo-500 text-white p-3 rounded-md shadow-md mb-4 text-center">
                {{ session('status') }}
            </div>
        @endif

        {{-- Bagian untuk Update Informasi Profil --}}
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                {{-- Anda bisa langsung menempatkan form di sini, atau menggunakan partial --}}
                {{-- Jika Anda menggunakan partial (disarankan untuk kerapian): --}}
                @include('profile.partials.update-profile-information-form')

                {{-- Jika Anda tidak menggunakan partial, Anda bisa letakkan kode formnya langsung di sini: --}}
                {{--
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Informasi Profil</h2>
                        <p class="mt-1 text-sm text-gray-600">Perbarui informasi profil dan alamat email akun Anda.</p>
                    </header>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
                            <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input id="email" name="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('email', $user->email) }}" required autocomplete="email">
                            @error('email')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <p class="text-sm mt-2 text-gray-800">
                                    Alamat email Anda belum diverifikasi.
                                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Klik di sini untuk mengirim ulang email verifikasi.
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-sm text-green-600">
                                        Tautan verifikasi baru telah dikirim ke alamat email Anda.
                                    </p>
                                @endif
                            @endif
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Simpan</button>
                        </div>
                    </form>
                </section>
                --}}
            </div>
        </div>

        {{-- Bagian untuk Update Password --}}
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                {{-- Menggunakan partial: --}}
                @include('profile.partials.update-password-form')

                {{-- Jika tidak menggunakan partial, kode formnya di sini --}}
            </div>
        </div>

        {{-- Bagian untuk Delete Akun --}}
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                {{-- Menggunakan partial: --}}
                @include('profile.partials.delete-user-form')

                {{-- Jika tidak menggunakan partial, kode formnya di sini --}}
            </div>
        </div>
    </div>
</div>
@endsection