<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT Helpdesk System</title>
    
    <!-- Memuat aset CSS & JS dari Laravel Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Script Tailwind CDN sementara untuk berjaga-jaga -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,900;1,900&family=Poppins:wght@400;600;700;800&display=swap');
        body { font-family: 'Poppins', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="antialiased bg-gray-50 overflow-x-hidden">

    <!-- Navbar Hijau -->
    <nav class="fixed top-0 z-50 w-full bg-[#1abc9c] text-white shadow-md">
        <!-- Elemen menyebar penuh ke sisi layar -->
        <div class="w-full px-6 md:px-12 py-3 flex justify-between items-center">
            
            <!-- Logo & Nama Sistem (Paling Kiri) -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center text-xs text-black font-bold">IT</div>
                <span class="text-xl font-bold tracking-wide">IT Helpdesk</span>
            </div>

            <!-- Menu Tengah -->
            <div class="hidden lg:flex space-x-8 text-sm font-semibold">
                <a href="#" class="hover:text-gray-200 border-b-2 border-white pb-1">Beranda</a>
                <a href="#" class="hover:text-gray-200">Kategori Masalah</a>
                <a href="#" class="hover:text-gray-200">Teknisi IT</a>
                <a href="#" class="hover:text-gray-200">Knowledge Base</a>
                <a href="#" class="hover:text-gray-200">Aset PC</a>
            </div>

            <!-- Ikon Kanan (Paling Kanan) -->
            <div class="hidden lg:block">
                 <div class="w-9 h-9 bg-yellow-400 rounded-full flex items-center justify-center text-xs text-black font-bold">ADM</div>
            </div>
            
            <!-- Menu Mobile Hamburger -->
            <button class="lg:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </nav>

    <!-- Hero Section Area -->
    <section class="relative w-full h-screen min-h-[700px] flex items-center pt-20">
        
        <!-- Background Image & Gradien Putih -->
        <div class="absolute inset-0 z-0">
            <!-- Background gambar server/IT -->
            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=2000" alt="Background IT" class="w-full h-full object-cover opacity-20" />
            <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-transparent"></div>
        </div>

        <div class="container mx-auto px-4 md:px-10 relative z-10 w-full flex flex-col md:flex-row items-center h-full">
            
            <!-- Area Kiri: Teks Typografi -->
            <div class="w-full md:w-3/5 text-left z-30 pt-10 md:pt-0">
                
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-gray-800 leading-tight mb-2 relative">
                    <!-- Teks raksasa HELPDESK transparan di latar belakang -->
                    <span class="absolute -z-10 text-[60px] md:text-[110px] lg:text-[150px] text-gray-900/5 -left-4 md:-left-10 top-[-40px] md:top-[-80px] font-serif tracking-widest pointer-events-none uppercase">HELPDESK</span>
                    Sistem IT Support <br> <span class="text-gray-400 drop-shadow-md text-5xl md:text-6xl lg:text-7xl">& Helpdesk</span>
                </h1>
                
                <p class="text-gray-600 mt-6 mb-8 max-w-lg text-lg font-medium">
                    Layanan terpadu untuk pengelolaan infrastruktur teknologi informasi, basis pengetahuan teknis (FAQ), hingga inventaris aset PC perusahaan.
                </p>

                <a href="#" class="inline-flex items-center gap-2 bg-[#1abc9c] hover:bg-[#128f76] text-white font-bold py-3 px-8 rounded shadow-lg transition duration-300">
                    Buka Dashboard &rarr;
                </a>
            </div>
            
        </div>
    </section>

</body>
</html>