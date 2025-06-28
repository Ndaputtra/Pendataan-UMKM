<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')
@section('content')
<div class="flex items-center justify-center h-screen">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
        <div class="text-center">
            <i class="fas fa-store text-5xl text-blue-600 mb-4"></i>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Register a new account
            </h2>
        </div>

        <form action="#" method="POST">
            <!-- CSRF Token -->
            @csrf

            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="sr-only">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Full Name" required>
                </div>

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

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Confirm Password" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Register
            </button>
        </form>

        <!-- Login Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">
                Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Login</a>
            </p>
        </div>
    </div>
</div>
@endsection