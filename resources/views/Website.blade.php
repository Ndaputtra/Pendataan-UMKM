<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="path/to/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('storage/favicon-32x32.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Warung Cak Ma'in</title>
</head>
<body class="h-full min-h-screen flex flex-col w-full overflow-x-hidden">
    <nav class="bg-orange-700 fixed top-0 left-0 right-0 z-50" x-data="{ isOpen: false }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Kiri: Nama Warung -->
                <div class="flex items-center">
                    <h2 class="text-lg font-bold text-amber-200">Warung Cak Ma'in</h2>
                </div>
    
                <!-- Tengah: Navigasi untuk Desktop -->
                <div class="hidden md:flex flex-1 ml-10">
                    <a href="#home" class="text-white hover:bg-amber-400 hover:text-white rounded-md px-4 py-2 text-sm font-medium">Home</a>
                    <a href="#menu" class="text-white hover:bg-amber-400 hover:text-white rounded-md px-4 py-2 text-sm font-medium">Menu</a>
                    <a href="#about" class="text-white hover:bg-amber-400 hover:text-white rounded-md px-4 py-2 text-sm font-medium">About Us</a>
                    <a href="#contact" class="text-white hover:bg-amber-400 hover:text-white rounded-md px-4 py-2 text-sm font-medium">Contact</a>
                </div>

    
                <!-- Kanan: Dropdown Menu dan Button Mobile -->
                <div class="relative flex -mr-2 md:hidden">
                    <!-- Button Mobile Menu -->
                    <button type="button" @click="isOpen = !isOpen"
                        class="relative  inline-flex items-center justify-center rounded-md bg-amber-300 p-2 text-orange-800 hover:bg-orange-500 hover:text-white focus:ring-2 focus:ring-amber-400">
                        <span class="sr-only">Open main menu</span>
                        <!-- Ikon menu (hamburger) -->
                        <svg :class="{'hidden': isOpen, 'block': !isOpen}" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!-- Ikon close (X) -->
                        <svg :class="{'block': isOpen, 'hidden': !isOpen}" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
    
                    <!-- Dropdown Menu -->
                    <div x-show="isOpen"
                        x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-16 w-48 bg-amber-200 rounded-md shadow-lg ring-1 ring-black/5">
                        <a href="#home" class="font-bold block px-4 py-2 text-sm text-orange-700 hover:bg-orange-700 hover:text-white">Home</a>
                        <a href="#about" class="font-bold block px-4 py-2 text-sm text-orange-700 hover:bg-orange-700 hover:text-white">About Us</a>
                        <a href="#menu" class="font-bold block px-4 py-2 text-sm text-orange-700 hover:bg-orange-700 hover:text-white">Menu</a>
                        <a href="#contact" class="font-bold block px-4 py-2 text-sm text-orange-700 hover:bg-orange-700 hover:text-white">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    

    <header class="bg-white shadow-sm pt-12">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8" id="home">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Home</h1>
        </div>
    </header>

    {{-- Konten Utama --}}
    <main class="flex-grow w-full">
        <div class="container mx-auto px-6 py-6 md:px-6 md:-mt-20 lg: -mt-8 relative">
            <!-- home section start -->
            <div class="text-white min-h-screen flex flex-col items-center justify-center pt-20">
            
                <!-- Hero Section -->
                <div class="flex flex-col md:flex-row items-center min-h-[600px] w-full bg-orange-800 text-white rounded-lg shadow-lg py-12 px-6 md:px-12 -mt-16">
                    
                    <!-- Text -->
                    <div class="w-full md:w-1/2 flex flex-col justify-center text-center md:text-left gap-4 md:pr-20">
                        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-yellow-400">Warung Cak Ma'in</h1>
                        <h2 class="text-2xl sm:text-3xl font-light text-yellow-200">Beragam Hidangan Lezat, Cita Rasa Autentik</h2>
                        <p class="mt-4 text-gray-100">
                            Dari soto ayam yang gurih hingga lele penyet yang menggoda, nikmati aneka hidangan khas dengan rasa yang tak terlupakan. Temukan menu favoritmu hanya di Warung Cak Ma'in!
                        </p>
                        <a href="#menu">
                            <button class="mx-auto justify-center mt-6 px-6 py-3 w-40 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-400 transition">
                                Lihat Menu
                            </button>
                        </a>                                
                    </div>
        
                    <!-- Image Section -->
                    <div class="w-full md:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-4 justify-center md:justify-end items-center mt-6 md:mt-0">
                        <img src="{{ asset('storage/soto ayam.jpeg') }}" class="w-full h-64 md:h-[512px] object-cover rounded-lg shadow-lg border-4 border-yellow-400">
                        <img src="{{ asset('storage/Lele Penyet.jpeg') }}" class="w-full h-64 md:h-[512px] object-cover rounded-lg shadow-lg border-4 border-yellow-400">
                    </div>
                </div>
            </div>

        
        
            
            <!-- Top Menu -->
            <div class="max-w-7xl mx-auto py-10 px-6 -mt-8">
                <h2 class="text-4xl font-bold text-center text-gray-800 mb-6">Top Menu</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="relative bg-white p-6 rounded-lg shadow-xl flex flex-row items-center w-full max-w-2xl h-[250px] cursor-pointer
                        transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105 hover:ring-4 hover:ring-orange-600">
                        <!-- Text Section (Kiri) -->
                        <div class="mx-auto md:w-1/2 text-left mt-16">
                            <h3 class="text-lg font-semibold text-gray-800">Fresh Food Eatery</h3>
                            <p class="text-gray-500">Soto Ayam</p>
                            <a href="https://wa.me/6281332440129" target="_blank" class="mt-4 text-orange-500 font-semibold hover:underline">Order Now →</a>

                            <!-- Icon Like -->
                            <div class="flex md:justify-start mt-10 pb-2">
                                <i class="fas fa-heart text-3xl text-yellow-400"></i>
                            </div>

                        </div>
                        
                        <!-- Image Section (Kanan) -->
                        <div class="md:w-2/2 flex -mr-6 justify-end">
                            <img src="{{ asset('storage/soto ayam cp.jpeg') }}" 
                                class="rounded-lg object-cover shadow-lg border-2 border-gray-300"
                                style="width: 90%; height: 250px; object-fit: cover;">
                        </div>
                        
                    </div>
                    <!-- Card 2 -->
                    <div class="relative bg-white p-6 rounded-lg shadow-xl flex flex-row items-center w-full max-w-2xl h-[250px] cursor-pointer
                        transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105 hover:ring-4 hover:ring-yellow-400">
                        <!-- Text Section (Kiri) -->
                        <div class="mx-auto md:w-1/2 text-left mt-16">
                            <h3 class="text-lg font-semibold text-gray-800">Fresh Food Eatery</h3>
                            <p class="text-gray-500 mt-2">Sayur Sop</p>
                            <a href="https://wa.me/6281332440129" target="_blank" class="mt-4 text-orange-500 font-semibold hover:underline">Order Now →</a>
                        
                            <!-- Icon Like -->
                            <div class="flex md:justify-start mt-10 pb-2">
                                <i class="fas fa-heart text-3xl text-yellow-400"></i>
                            </div>

                        </div>
                        
                        <!-- Image Section (Kanan) -->
                        <div class="md:w-2/2 flex -mr-6 justify-end">
                            <img src="{{ asset('storage/Sayur Sop.jpeg') }}" 
                                class="rounded-lg object-cover shadow-lg border-2 border-gray-300"
                                style="width: 90%; height: 250px; object-fit: cover;">
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="relative bg-white p-6 rounded-lg shadow-xl flex flex-row items-center w-full max-w-2xl h-[250px] cursor-pointer
                        transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105 hover:ring-4 hover:ring-orange-600">
                        <!-- Text Section (Kiri) -->
                        <div class="mx-auto md:w-1/2 text-left mt-16">
                            <h3 class="text-lg font-semibold text-gray-800">Fresh Food Eatery</h3>
                            <p class="text-gray-500 mt-2">Sayur Lodeh</p>
                            <a href="https://wa.me/6281332440129" target="_blank" class="mt-4 text-orange-500 font-semibold hover:underline">Order Now →</a>
                            
                            <!-- Icon Like -->
                            <div class="flex md:justify-start mt-10 pb-2">
                                <i class="fas fa-heart text-3xl text-yellow-400"></i>
                            </div>

                        </div>
                        
                        <!-- Image Section (Kanan) -->
                        <div class="md:w-2/2 flex -mr-6 justify-end">
                            <img src="{{ asset('storage/Sayur Lodeh Cp.jpeg') }}" 
                                class="rounded-lg object-cover shadow-lg border-2 border-gray-300"
                                style="width: 90%; height: 250px; object-fit: cover;">
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="relative bg-white p-6 rounded-lg shadow-xl flex flex-row items-center w-full max-w-2xl h-[250px] cursor-pointer
                        transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105 hover:ring-4 hover:ring-yellow-400">
                        <!-- Text Section (Kiri) -->
                        <div class="mx-auto md:w-1/2 text-left mt-16">
                            <h3 class="text-lg font-semibold text-gray-800">Fresh Food Eatery</h3>
                            <p class="text-gray-500 mt-2">Kotokan Pee</p>
                            <a href="https://wa.me/6281332440129" target="_blank" class="mt-4 text-orange-500 font-semibold hover:underline">Order Now →</a>
                            
                            <!-- Icon Like -->
                            <div class="flex md:justify-start mt-10 pb-2">
                                <i class="fas fa-heart text-3xl text-yellow-400"></i>
                            </div>

                        </div>
                        
                        <!-- Image Section (Kanan) -->
                        <div class="md:w-2/2 flex -mr-6 justify-end">
                            <img src="{{ asset('storage/Kotokan Pee Cp.jpeg') }}" 
                                class="rounded-lg object-cover shadow-lg border-2 border-gray-300"
                                style="width: 90%; height: 250px; object-fit: cover;">
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="relative bg-white p-6 rounded-lg shadow-xl flex flex-row items-center w-full max-w-2xl h-[250px] cursor-pointer
                        transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105 hover:ring-4 hover:ring-orange-600">
                        <!-- Text Section (Kiri) -->
                        <div class="mx-auto md:w-1/2 text-left mt-16">
                            <h3 class="text-lg font-semibold text-gray-800">Fresh Food Eatery</h3>
                            <p class="text-gray-500 mt-2">Penyetan Telur</p>
                            <a href="https://wa.me/6281332440129" target="_blank" class="mt-4 text-orange-500 font-semibold hover:underline">Order Now →</a>
                            
                            <!-- Icon Like -->
                            <div class="flex md:justify-start mt-10 pb-2">
                                <i class="fas fa-heart text-3xl text-yellow-400"></i>
                            </div>

                        </div>
                        
                        <!-- Image Section (Kanan) -->
                        <div class="md:w-2/2 flex -mr-6 justify-end">
                            <img src="{{ asset('storage/Telur Penyet.jpeg') }}" 
                                class="rounded-lg object-cover shadow-lg border-2 border-gray-300"
                                style="width: 90%; height: 250px; object-fit: cover;">
                        </div>
                    </div>
                    <!-- Card 6 -->
                    <div class="relative bg-white p-6 rounded-lg shadow-xl flex flex-row items-center w-full max-w-2xl h-[250px] cursor-pointer
                        transition-all duration-500 ease-in-out hover:shadow-2xl hover:scale-105 hover:ring-4 hover:ring-yellow-400">
                        <!-- Text Section (Kiri) -->
                        <div class="mx-auto md:w-1/2 text-left mt-16">
                            <h3 class="text-lg font-semibold text-gray-800">Fresh Food Eatery</h3>
                            <p class="text-gray-500 mt-2">Nasi Pecel</p>
                            <a href="https://wa.me/6281332440129"  target="_blank" class="mt-4 text-orange-500 font-semibold hover:underline">Order Now →</a>
                            
                            <!-- Icon Like -->
                            <div class="flex md:justify-start mt-10 pb-2">
                                <i class="fas fa-heart text-3xl text-yellow-400"></i>
                            </div>

                        </div>
                        
                        <!-- Image Section (Kanan) -->
                        <div class="md:w-2/2 flex -mr-6 justify-end">
                            <img src="{{ asset('storage/Pecel.jpeg') }}" 
                                class="rounded-lg object-cover shadow-lg border-2 border-gray-300"
                                style="width: 90%; height: 250px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>



            <div class="container mx-auto px-4 py-12" id="about">
                <h2 class="text-center text-3xl font-bold border-b-4 border-yellow-500 pb-2 mt-6">About Us</h2>
            
                <div class="flex flex-col md:flex-row items-center bg-orange-800 text-white rounded-lg shadow-lg py-12 px-6 md:px-12 mt-8">
                    
                    <!-- Image Section -->
                    <div class="w-full md:w-1/2 flex justify-center">
                        <div class="rounded-lg shadow-lg overflow-hidden">
                            <img src="{{ asset('storage/Warung.jpg') }}" alt="Toko" class="w-full h-[300px] md:h-[500px] object-cover">
                        </div>
                    </div>
            
                    <!-- Text Section -->
                    <div class="w-full md:w-1/2 flex flex-col justify-center px-4 md:px-8 mt-6 md:mt-0">
                        <h3 class="text-4xl font-extrabold text-amber-300 leading-tight">Warung Cak Ma'in</h3>
                        <p class="mt-4 text-justify leading-relaxed">
                            Warung Cak Ma'in telah menjadi bagian dari kuliner khas Surabaya sejak tahun 2000. 
                            Berdiri di Jalan Gresik No. 39 Surabaya, warung ini menawarkan cita rasa autentik masakan 
                            rumahan yang lezat dan menggugah selera.
                        </p>
                        <p class="mt-2 text-justify leading-relaxed">
                            Di sini, pelanggan dapat menikmati berbagai menu favorit seperti Soto Ayam, Penyetan, 
                            Sayur Sop, Sayur Lodeh, Bali, hingga Kotokan Pe yang selalu menggugah selera. Dengan 
                            bahan-bahan segar dan bumbu khas, setiap hidangan yang disajikan memberikan rasa yang 
                            otentik dan penuh kehangatan, layaknya masakan rumahan.
                        </p>
                        <p class="mt-2 text-justify leading-relaxed">
                            Warung Cak Ma'in tidak hanya dikenal karena cita rasanya yang khas, tetapi juga suasana 
                            yang ramah dan nyaman.
                        </p>
            
                        <!-- Icons Section -->
                        <div class="flex justify-center md:justify-start gap-6 mt-6">
                            <i class="fas fa-utensils text-3xl text-yellow-400"></i>
                            <i class="fas fa-bowl-rice text-3xl text-yellow-400"></i>
                            <i class="fas fa-drumstick-bite text-3xl text-yellow-400"></i>
                            <i class="fas fa-fish text-3xl text-yellow-400"></i>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="container mx-auto px-4 py-15 mt-8" id="menu">
                <h2 class="text-center text-3xl font-bold border-b-4 border-yellow-500 pb-2">Menu</h2>
                
                <h2 class="text-3xl font-bold mt-5 mb-4">Makanan</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    @foreach([
                        ['name' => 'Penyetan Ayam', 'image' => 'Penyetan Ayam.jpeg', 'description' => 'Ayam goreng penyet dengan sambal', 'price' => 'Rp. 12.000'],
                        ['name' => 'Soto Ayam', 'image' => 'soto ayam.jpeg', 'description' => 'Soto ayam dengan kuah gurih', 'price' => 'Rp. 12.000'],
                        ['name' => 'Penyetan Tempe', 'image' => 'Tempe Penyet.jpeg', 'description' => 'Tempe penyet dengan sambal pedas', 'price' => 'Rp. 8.000'],
                        ['name' => 'Penyetan Lele', 'image' => 'Lele Penyet.jpeg', 'description' => 'Lele goreng crispy dengan sambal ulek', 'price' => 'Rp. 12.000'],
                        ['name' => 'Penyetan Telur', 'image' => 'Telur Penyet.jpeg', 'description' => 'Telur penyet dengan sambal khas', 'price' => 'Rp. 9.000'],
                        ['name' => 'Penyetan Mujair', 'image' => 'Mujair Penyet.jpeg', 'description' => 'Mujair penyet dengan sambal pedas', 'price' => 'Rp. 12.000'],
                        ['name' => 'Pengganan Pee', 'image' => 'Ikan pari bakar.jpeg', 'description' => 'Ikan pari bakar dengan sambal pedas', 'price' => 'Rp. 12.000'],
                        ['name' => 'Penyetan Bandeng', 'image' => 'Bandeng Penyet.jpeg', 'description' => 'Bandeng penyet dengan lalapan segar', 'price' => 'Rp. 12.000']
                    ] as $food)
                    <div class="bg-white p-4 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('storage/' . $food['image']) }}" alt="{{ $food['name'] }}" 
                        class="img-fluid rounded-lg shadow-lg mx-auto" 
                        style="width: 90%; height: 250px; object-fit: cover;">
                        <h3 class="mt-3 text-lg font-bold">{{ $food['name'] }}</h3>
                        <p class="text-gray-600">{{ $food['description'] }}</p>
                        <p class="mt-2 font-semibold text-orange-700">{{ $food['price'] }}</p>

                        <!-- Tombol WhatsApp -->
                        <a href="https://wa.me/6281332440129?text=Halo%20saya%20ingin%20memesan%20{{ urlencode($food['name']) }}%20seharga%20{{ urlencode($food['price']) }}" 
                            target="_blank"
                            class="inline-block mt-3 px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">
                            Pesan Sekarang
                        </a>
                    </div>                        
                    @endforeach
                </div>
                
                
                <!-- Menu Makanan Tambahan yang Disembunyikan -->
                <div id="hiddenMenu" class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6 hidden">
                    @foreach([
                        ['name' => 'Kotokan Pee', 'image' => 'Kotokan Pee.jpeg', 'description' => 'Ikan pari dengan kuah pedas', 'price' => 'Rp. 13.000'],
                        ['name' => 'Sayur Lodeh', 'image' => 'Sayur Lodeh Cp.jpeg', 'description' => 'Sayur lodeh dengan kuah santan gurih', 'price' => 'Rp. 10.000'],
                        ['name' => 'Rawon', 'image' => 'Rawon.jpeg', 'description' => 'Rawon daging sapi khas Jawa Timur', 'price' => 'Rp. 12.000'],
                        ['name' => 'Nasi Pecel', 'image' => 'Pecel.jpeg', 'description' => 'Nasi dengan sayur dan bumbu kacang', 'price' => 'Rp. 12.000'],
                        ['name' => 'Bali Telur', 'image' => 'Bali Telur.jpeg', 'description' => 'Telur yang dimasak dengan bumbu bali', 'price' => 'Rp. 10.000'],
                        ['name' => 'Sayur Sop', 'image' => 'Sayur Sop.jpeg', 'description' => 'Nasi dengan sayur dan bumbu kacang', 'price' => 'Rp. 12.000']
                    ] as $food)
                    <div class="bg-white p-4 rounded-lg shadow-lg text-center">
                        <img src="{{ asset('storage/' . $food['image']) }}" alt="{{ $food['name'] }}" class="img-fluid rounded-lg shadow-lg mx-auto" 
                        style="width: 90%; height: 250px; object-fit: cover;">
                        <h3 class="mt-3 text-lg font-bold">{{ $food['name'] }}</h3>
                        <p class="text-gray-600">{{ $food['description'] }}</p>
                        <p class="mt-2 font-semibold text-orange-700">{{ $food['price'] }}</p>

                        <!-- Tombol WhatsApp -->
                        <a href="https://wa.me/6281332440129?text=Halo%20saya%20ingin%20memesan%20{{ urlencode($food['name']) }}%20seharga%20{{ urlencode($food['price']) }}" 
                            target="_blank"
                            class="inline-block mt-3 px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">
                            Pesan Sekarang
                        </a>
                    </div>
                    @endforeach
                </div>
                
                <!-- Minuman (Juga Disembunyikan) -->
                <div id="hiddenMenuDrink" class="hidden">
                    <h2 class="text-3xl font-bold mt-5 mb-4">Minuman</h2>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
                        @foreach([
                            ['name' => 'Es Jeruk', 'image' => 'Es Jeruk.jpeg', 'description' => 'Perasan jeruk segar dengan es, memberikan sensasi segar', 'price' => 'Rp. 5.000'],
                            ['name' => 'Es Teh Manis', 'image' => 'Es Teh.jpeg', 'description' => 'Teh dingin yang manis dan menyegarkan', 'price' => 'Rp. 3.000'],
                            ['name' => 'Joshua', 'image' => 'Joshua.jpg', 'description' => 'Minuman perpaduan Extra Joss dengan Susu menciptakan rasa yang enak', 'price' => 'Rp. 8.000'],
                            ['name' => 'Teh Hangat', 'image' => 'Teh Hangat.jpeg', 'description' => 'Teh panas yang menenangkan dan menghangatkan tubuh', 'price' => 'Rp. 2.000']
                        ] as $drink)
                        <div class="bg-white p-4 rounded-lg shadow-lg text-center">
                            <img src="{{ asset('storage/' . $drink['image']) }}" alt="{{ $drink['name'] }}" class="img-fluid rounded-lg shadow-lg mx-auto" 
                            style="width: 90%; height: 250px; object-fit: cover;">
                            <h3 class="mt-3 text-lg font-bold">{{ $drink['name'] }}</h3>
                            <p class="text-gray-600">{{ $drink['description'] }}</p>
                            <p class="mt-2 font-semibold text-orange-700">{{ $drink['price'] }}</p>

                            <!-- Tombol WhatsApp -->
                            <a href="https://wa.me/6281332440129?text=Halo%20saya%20ingin%20memesan%20{{ urlencode($drink['name']) }}%20seharga%20{{ urlencode($drink['price']) }}" 
                                target="_blank"
                                class="inline-block mt-3 px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg shadow-md hover:bg-yellow-600 transition duration-300">
                                Pesan Sekarang
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Tombol untuk menampilkan menu lainnya -->
                <div class="text-center mt-4">
                    <button id="showMoreBtn" class="bg-orange-700 text-white px-4 py-2 rounded-lg font-bold hover:bg-orange-500">
                        Lihat Menu Lainnya
                    </button>
                </div>
            </div>

            <div class="container mx-auto px-4 py-5 mt-8 pb-2" id="contact">
                <!-- Judul "Contact" dengan Garis Bawah -->
                <div class="text-center text-3xl font-bold text-black border-b-4 border-yellow-400 pb-2 mb-4">
                    Contact
                </div>
            </div>            

            <div class="py-6 px-6 md:px-6">
                <div class="w-full -mt-10">
                    <div class="flex flex-col md:flex-row items-center bg-orange-800 text-white rounded-lg shadow-lg py-8 px-6 md:px-10 gap-6">
                        
                        <!-- Left Section -->
                        <div class="w-full md:w-1/2 flex flex-col justify-center space-y-4">
                            <h1 class="text-3xl md:text-4xl font-extrabold text-amber-300 leading-tight">
                                Hubungi <br> Warung Makan Cak Ma'in 🍽
                            </h1>
                            <p class="text-white text-lg">
                                Nikmati hidangan khas Surabaya dengan cita rasa autentik! Kami siap melayani Anda dengan sepenuh hati. 🍛🔥
                            </p>
                            
                            <!-- Info Pemesanan -->
                            <div class="bg-amber-200 p-4 rounded-lg shadow">
                                <p class="text-orange-900 font-semibold">
                                    ✅ Warung Makan Cak Ma'in MENERIMA PESANAN untuk acara, keluarga, dan kantor! 🎉
                                </p>
                                <p class="text-black text-sm mt-1">
                                    Pesan sekarang dan nikmati hidangan khas kami dengan kualitas terbaik!
                                </p>
                            </div>
                            
                            <!-- Info Kontak -->
                            <div class="text-lg space-y-1">
                                <p class="flex items-center">
                                    📍 <span class="ml-2">Jl. Gresik No. 39, Surabaya</span>
                                </p>
                                <p class="flex items-center">
                                    📞 <span class="ml-2 font-bold text-amber-300">0813-3244-0129</span>
                                </p>
                                <p class="flex items-center">
                                    ⏰ <span class="ml-2">Buka: 07.00 - 17.00 WIB</span>
                                </p>
                            </div>
                            
                            <!-- Tombol WhatsApp -->
                            <a href="https://wa.me/6281332440129" target="_blank">
                                <button class="mt-4 bg-yellow-500 text-white px-6 py-3 rounded-lg text-lg font-bold hover:bg-yellow-600  transition flex items-center shadow">
                                    📩 Chat Sekarang
                                </button>
                            </a>
                        </div>
                        
                        <!-- Right Section (Images) -->
                        <div class="w-full md:w-1/2 flex justify-center">
                            <div class="relative bg-amber-200">
                                <img src="{{ asset('storage/Order rb.png') }}" alt="Interior" class="w-full h-[300px] md:h-[400px] object-cover rounded-lg shadow-lg" />
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>                                                                
        </div>
    </main>     
    <footer class=" bg-orange-700 text-amber-200 py-6 w-full mt-auto">
      <div class="container mx-auto text-center">
          <p class="text-lg font-semibold">&copy; {{ date('Y') }} Warung Makan Cak Ma'in. All Rights Reserved.</p>
          <p class="text-sm mt-2">Website dibuat oleh <span class="text-white font-bold">Muhammad Fajar Saputra</span>.</p>
      </div>
    </footer>  
    
    <!-- JavaScript -->
    <script>
        document.getElementById('showMoreBtn').addEventListener('click', function () {
            let menuMakanan = document.getElementById('hiddenMenu');
            let menuMinuman = document.getElementById('hiddenMenuDrink');

            menuMakanan.classList.toggle('hidden');
            menuMinuman.classList.toggle('hidden');

            if (menuMakanan.classList.contains('hidden')) {
                this.textContent = 'Lihat Menu Lainnya';
            } else {
                this.textContent = 'Sembunyikan Menu';
            }
        });
    </script>
</body>                          
</html>