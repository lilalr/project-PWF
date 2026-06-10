<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pemesanan Berhasil — LIORA FRAGRANCE</title>
        
        <!-- Google Fonts: Cormorant Garamond & Inter -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .font-serif {
                font-family: 'Cormorant Garamond', Georgia, serif;
            }
            .font-sans {
                font-family: 'Inter', system-ui, -apple-system, sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-[#F9F6F0] text-[#2E2C2A] font-sans selection:bg-[#EFEAE2] selection:text-[#2E2C2A]">

        <!-- Navigation Header -->
        <header class="w-full bg-[#F9F6F0] border-b border-[#EFEAE2] sticky top-0 z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
                <!-- Branding / Logo -->
                <div class="flex-1 lg:flex-none">
                    <a href="{{ route('public.home') }}" class="text-2xl font-semibold tracking-widest font-serif text-[#2E2C2A]">LIORA FRAGRANCE</a>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden md:flex flex-1 justify-center items-center space-x-10 text-xs uppercase tracking-widest font-medium text-[#2E2C2A]/80">
                    <a href="{{ route('public.home') }}" class="hover:text-[#2E2C2A] transition duration-200">Beranda</a>
                    <a href="{{ route('public.fragrances') }}" class="hover:text-[#2E2C2A] transition duration-200">Parfum</a>
                    <a href="{{ route('public.cart') }}" class="hover:text-[#2E2C2A] transition duration-200">
                        Keranjang (0)
                    </a>
                </nav>

                <!-- Auth & Utility Links -->
                <div class="flex-1 lg:flex-none flex items-center justify-end space-x-6">
                    <button class="text-[#2E2C2A] hover:opacity-70 transition duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.602 10.602Z" />
                        </svg>
                    </button>

                    @if (Route::has('login'))
                        <div class="flex items-center space-x-4 border-l border-[#EFEAE2] pl-6">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-xs uppercase tracking-widest text-[#2E2C2A] hover:opacity-75 font-semibold transition duration-200">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-xs uppercase tracking-widest text-[#2E2C2A]/80 hover:text-[#2E2C2A] transition duration-200">
                                    Masuk
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="text-xs uppercase tracking-widest bg-[#2E2C2A] text-white hover:bg-[#4E4B48] px-4 py-2 transition duration-200">
                                        Daftar
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- Checkout Success Card Section -->
        <section class="w-full py-28 bg-[#F9F6F0]">
            <div class="max-w-2xl mx-auto px-6 text-center space-y-8 bg-[#F2EDE4] border border-[#EFEAE2] p-12 md:p-16 rounded-sm shadow-sm">
                <!-- Checkmark Icon -->
                <div class="w-16 h-16 bg-[#2E2C2A] text-[#F9F6F0] rounded-full flex items-center justify-center mx-auto shadow-md">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                </div>

                <div class="space-y-4">
                    <h1 class="text-4xl md:text-5xl font-serif font-light text-[#2E2C2A]">Terima Kasih Atas Pesanan Anda</h1>
                    <p class="text-xs uppercase tracking-widest text-[#7A7570] font-semibold">Referensi Pesanan: LF-{{ rand(10000, 99999) }}</p>
                </div>

                <p class="text-base text-[#5A5550] leading-relaxed font-serif font-light max-w-md mx-auto">
                    Pesanan Anda telah berhasil ditempatkan dan sedang disiapkan dengan sangat hati-hati. Email konfirmasi beserta rincian telah dikirimkan ke alamat terdaftar Anda.
                </p>

                <div class="pt-6">
                    <a href="{{ route('public.fragrances') }}" class="inline-block bg-[#2E2C2A] text-white hover:bg-[#4E4B48] px-10 py-4 text-xs uppercase tracking-widest font-semibold transition duration-300 shadow-sm">
                        Lanjutkan Belanja
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="w-full bg-[#F2EDE4] border-t border-[#EFEAE2] text-[#5A5550] pt-16 pb-12 font-light">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
                <!-- Left Block -->
                <div class="md:col-span-6 space-y-4">
                    <h3 class="text-xl font-serif text-[#2E2C2A] font-semibold tracking-wider">ABOUT LIORA FRAGRANCE</h3>
                    <p class="text-sm leading-relaxed text-[#7A7570] font-serif max-w-md">
                        Liora Fragrance is a modern luxury fragrance house dedicated to crafting unique sensory experiences. We combine raw sustainable botanicals with modern artistry to create scents that evoke emotion, redefine personal expression, and stand as statements of quiet sophistication.
                    </p>
                </div>

                <!-- Center Block -->
                <div class="md:col-span-3 space-y-4 text-sm">
                    <h3 class="text-xs uppercase tracking-widest font-bold text-[#2E2C2A]">Butik Kami</h3>
                    <p class="text-[#7A7570] leading-relaxed">
                        Universitas Muhammadiyah Yogyakarta<br>
                        Jl. Brawijaya, Kasihan, Bantul<br>
                        Yogyakarta, Indonesia, 55183
                    </p>
                </div>

                <!-- Right Block -->
                <div class="md:col-span-3 space-y-4 text-sm">
                    <h3 class="text-xs uppercase tracking-widest font-bold text-[#2E2C2A]">Connect with Us</h3>
                    <div class="flex flex-col space-y-2 text-[#7A7570]">
                        <a href="https://instagram.com/liorafragrance" target="_blank" class="hover:text-[#2E2C2A] transition duration-200">Instagram</a>
                        <a href="https://facebook.com/liorafragrance" target="_blank" class="hover:text-[#2E2C2A] transition duration-200">Facebook</a>
                        <a href="mailto:hello@liorafragrance.com" class="hover:text-[#2E2C2A] transition duration-200">hello@liorafragrance.com</a>
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright Line -->
            <div class="max-w-7xl mx-auto px-6 pt-8 border-t border-[#EFEAE2] flex flex-col sm:flex-row justify-between items-center text-xs tracking-widest uppercase text-[#7A7570]">
                <p>&copy; 2026 LIORA FRAGRANCE. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 sm:mt-0">
                    <a href="#" class="hover:text-[#2E2C2A] transition duration-200">Privacy Policy</a>
                    <a href="#" class="hover:text-[#2E2C2A] transition duration-200">Terms of Use</a>
                </div>
            </div>
        </footer>

    </body>
</html>
