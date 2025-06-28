@extends('layouts.app') {{-- Ini harus ada di paling atas --}}

@section('content') {{-- Ini harus mengawali konten spesifik halaman ini --}}

<!-- resources/views/auth/login.blade.php -->

<div class="flex items-center justify-center h-screen">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
        <div class="text-center">
            <i class="fas fa-store text-5xl text-blue-600 mb-4"></i>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Sign in to your account
            </h2>
        </div>

        <form action="{{ route('login') }}" method="POST">
            <!-- CSRF Token -->
            @csrf

            <div class="space-y-4">
                <!-- Email -->
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Email Address" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Password" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Sign In
            </button>
        </form>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Don't have an account? <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">Register</a>
            </p>
        </div>
    </div>
</div>

@endsection {{-- Ini harus mengakhiri bagian 'content' --}}