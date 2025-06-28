<!-- resources/views/landing.blade.php -->
@extends('layouts.app') {{-- Penting: Menggunakan layout app.blade.php --}}


@section('content')
{{-- Bagian tombol navigasi tetap di sini, karena terkait dengan logika showView Anda --}}
{{-- <div class="fixed top-4 right-4 z-50 flex space-x-2">
    <button onclick="showView('landing')" class="px-3 py-1 bg-blue-500 text-white rounded">Landing</button>
    <button onclick="showView('auth')" class="px-3 py-1 bg-green-500 text-white rounded">Auth</button>
    <button onclick="showView('dashboard')" class="px-3 py-1 bg-purple-500 text-white rounded">Dashboard</button>
</div> --}}

<!-- Landing Page View -->
<div id="landing-view" class="fade-in">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-store text-2xl text-blue-600 mr-2"></i>
                        <span class="text-xl font-bold text-gray-800">UMKM Data</span>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#Home" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="#About" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">About</a>
                    <a href="#Contact" class="text-gray-800 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    {{-- <button onclick="showView('auth')" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-all">
                        Login / Register
                    </button> --}}
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-all">
                    Login / Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div id="Home" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Empowering Local Businesses</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">A comprehensive platform for managing and discovering small and medium enterprises in your area.</p>
            <div class="flex justify-center space-x-4">
                <button onclick="showView('auth')" class="bg-white text-blue-600 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold transition-all">
                    Get Started
                </button>
                <button class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 px-6 py-3 rounded-lg font-semibold transition-all">
                    Learn More
                </button>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="About" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Why Choose Our Platform</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Simple, efficient, and powerful tools for managing UMKM data.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition-all">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-chart-line text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Data Insights</h3>
                    <p class="text-gray-600">Get valuable insights about UMKM distribution across different districts.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition-all">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-map-marked-alt text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Location Based</h3>
                    <p class="text-gray-600">Find UMKM near you sorted by district for easy navigation.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition-all">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-user-shield text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Secure Access</h3>
                    <p class="text-gray-600">Role-based access control ensures data security and integrity.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="Contact" class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">UMKM Data</h3>
                    <p class="text-gray-400">A platform dedicated to supporting small and medium enterprises through better data management.</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#Home" class="text-gray-400 hover:text-white transition-all">Home</a></li>
                        <li><a href="#About" class="text-gray-400 hover:text-white transition-all">About</a></li>
                        <li><a href="#Contact" class="text-gray-400 hover:text-white transition-all">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <p class="text-gray-400 mb-2"><i class="fas fa-envelope mr-2"></i> info@umkmdata.com</p>
                    <p class="text-gray-400"><i class="fas fa-phone-alt mr-2"></i> +62 123 4567 890</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 UMKM Data. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>
@endsection