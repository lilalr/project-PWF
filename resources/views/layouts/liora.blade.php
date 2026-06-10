<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'LIORA FRAGRANCE — Essence of Elegance')</title>
        
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
            [x-cloak] { display: none !important; }
        </style>
        <!-- SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="antialiased bg-[#F9F6F0] text-[#2E2C2A] font-sans selection:bg-[#EFEAE2] selection:text-[#2E2C2A]" x-data="{ cartOpen: {{ session('open_cart') ? 'true' : 'false' }} }">
        
        <!-- Flash Alert Notification -->
        @if (session('success'))
            <div class="fixed top-6 right-6 z-50 bg-[#2E2C2A] text-white px-6 py-4 shadow-xl border border-[#EFEAE2] flex items-center space-x-4" id="alert-toast">
                <span class="text-xs uppercase tracking-widest font-semibold">{{ session('success') }}</span>
                <button onclick="document.getElementById('alert-toast').remove()" class="text-white/70 hover:text-white">&times;</button>
            </div>
        @endif
        @if (session('error'))
            <div class="fixed top-6 right-6 z-50 bg-rose-950 text-white px-6 py-4 shadow-xl border border-[#EFEAE2] flex items-center space-x-4" id="alert-toast-err">
                <span class="text-xs uppercase tracking-widest font-semibold">{{ session('error') }}</span>
                <button onclick="document.getElementById('alert-toast-err').remove()" class="text-white/70 hover:text-white">&times;</button>
            </div>
        @endif

        <!-- Navigation Header -->
        <header class="w-full bg-[#F9F6F0] border-b border-[#EFEAE2] sticky top-0 z-40 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
                <!-- Branding / Logo -->
                <div class="flex-1 lg:flex-none">
                    <a href="{{ route('public.home') }}" class="text-2xl font-semibold tracking-widest font-serif text-[#2E2C2A]">LIORA FRAGRANCE</a>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden md:flex flex-1 justify-center items-center space-x-10 text-xs uppercase tracking-widest font-medium text-[#2E2C2A]/80">
                    <a href="{{ route('public.home') }}" class="{{ Route::currentRouteName() == 'public.home' ? 'text-[#2E2C2A] font-semibold' : 'hover:text-[#2E2C2A] transition duration-200' }}">Beranda</a>
                    <a href="{{ route('public.fragrances') }}" class="{{ Route::currentRouteName() == 'public.fragrances' ? 'text-[#2E2C2A] font-semibold' : 'hover:text-[#2E2C2A] transition duration-200' }}">Parfum</a>
                    <button @click="cartOpen = true" class="hover:text-[#2E2C2A] transition duration-200 uppercase tracking-widest">
                        Keranjang ({{ count(session('cart', [])) }})
                    </button>
                </nav>

                <!-- Auth & Utility Links -->
                <div class="flex-1 lg:flex-none flex items-center justify-end space-x-6">
                    <!-- Search Form Toggle -->
                    <div x-data="{ searchOpen: false }" class="flex items-center space-x-2">
                        <form action="{{ route('public.fragrances') }}" method="GET" class="flex items-center space-x-2">
                            <input x-show="searchOpen" x-transition type="text" name="search" placeholder="Cari parfum..." value="{{ request('search') }}" class="bg-transparent border-b border-[#2E2C2A] text-[#2E2C2A] placeholder-[#7A7570] py-1 px-2 focus:outline-none text-xs font-light w-40" x-cloak>
                            <button type="button" @click="searchOpen ? (this.closest('form').submit()) : (searchOpen = true)" class="text-[#2E2C2A] hover:opacity-70 transition duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.602 10.602Z" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    @if (Route::has('login'))
                        <div class="flex items-center space-x-4 border-l border-[#EFEAE2] pl-6 text-xs uppercase tracking-widest font-medium">
                            @auth
                                @if (Auth::user()->role === 'admin')
                                    <a href="{{ url('/dashboard') }}" class="text-[#2E2C2A] hover:opacity-75 font-semibold transition duration-200">
                                        Dashboard
                                    </a>
                                @else
                                    <span class="text-[#7A7570] font-light">
                                        Halo, {{ explode(' ', Auth::user()->name)[0] }}!
                                    </span>
                                @endif

                                <!-- Logout Form -->
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-rose-900 hover:text-rose-700 font-semibold transition duration-200 ml-4">
                                        Logout
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="text-[#2E2C2A]/80 hover:text-[#2E2C2A] transition duration-200">
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-[#2E2C2A] text-white hover:bg-[#4E4B48] px-4 py-2 transition duration-200 ml-2 font-semibold">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- Interactive Centered Cart Modal -->
        <div x-show="cartOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <!-- Backdrop -->
            <div x-show="cartOpen" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 bg-[#2E2C2A]/60 backdrop-blur-sm transition-opacity" 
                 @click="cartOpen = false"></div>

            <!-- Modal Panel -->
            <div x-show="cartOpen" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 scale-95" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95" 
                 class="relative transform overflow-hidden bg-[#F9F6F0] border border-[#EFEAE2] p-8 text-left shadow-2xl transition-all w-full max-w-xl rounded-sm">
                
                <!-- Close Button -->
                <button @click="cartOpen = false" class="absolute top-6 right-6 text-[#2E2C2A] hover:opacity-75 transition duration-200">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Header -->
                <div class="border-b border-[#EFEAE2] pb-4 mb-6">
                    <h2 class="text-2xl font-serif font-light text-[#2E2C2A]" id="modal-title">Keranjang Belanja</h2>
                </div>

                <!-- Cart Items List -->
                <div class="divide-y divide-[#EFEAE2] max-h-96 overflow-y-auto pr-2">
                    @forelse (session('cart', []) as $id => $item)
                        <div class="flex py-6 items-center space-x-6">
                            <!-- Product Image (Left) -->
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden bg-[#F2EDE4] p-2 flex items-center justify-center border border-[#EFEAE2]">
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="h-full w-full object-contain mix-blend-multiply">
                            </div>

                            <!-- Product Details & Quantity (Right) -->
                            <div class="flex-1 space-y-2">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-serif text-xl text-[#2E2C2A] font-normal leading-tight">{{ $item['name'] }}</h3>
                                        <p class="text-xs text-[#7A7570] font-light mt-0.5">{{ $item['scent_notes'] }}</p>
                                    </div>
                                    <span class="text-sm font-semibold text-[#2E2C2A]">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                </div>

                                <div class="flex items-center justify-between pt-2">
                                    <span class="text-xs text-[#7A7570] font-light">Ketahanan: {{ $item['longevity'] }}</span>
                                    
                                    <!-- Plus/Minus controls -->
                                    <div class="flex items-center space-x-1.5 border border-[#2E2C2A]/20 bg-[#F2EDE4]/30 rounded-sm">
                                        <!-- Minus Form -->
                                        @if ($item['qty'] == 1)
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-2.5 py-1 text-xs text-rose-900 font-bold hover:bg-rose-50">&minus;</button>
                                            </form>
                                        @else
                                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="qty" value="{{ $item['qty'] - 1 }}">
                                                <button type="submit" class="px-2.5 py-1 text-xs text-[#2E2C2A] hover:bg-[#EFEAE2] font-bold">&minus;</button>
                                            </form>
                                        @endif
                                        
                                        <span class="text-xs text-[#2E2C2A] px-1 font-medium">{{ $item['qty'] }}</span>

                                        <!-- Plus Form -->
                                        <form action="{{ route('cart.update', $id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="qty" value="{{ $item['qty'] + 1 }}">
                                            <button type="submit" class="px-2.5 py-1 text-xs text-[#2E2C2A] hover:bg-[#EFEAE2] font-bold">+</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-16 text-[#7A7570] font-light">
                            Keranjang belanja Anda kosong.
                        </div>
                    @endforelse
                </div>

                <!-- Footer Summary -->
                @if (!empty(session('cart', [])))
                    <div class="border-t border-[#EFEAE2] pt-6 mt-6 space-y-6">
                        @php
                            $drawerTotal = 0;
                            foreach(session('cart', []) as $item) {
                                $drawerTotal += $item['price'] * $item['qty'];
                            }
                        @endphp
                        <div class="flex justify-between text-lg font-semibold text-[#2E2C2A] font-serif">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($drawerTotal, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('public.cart') }}" class="w-full text-center border border-[#2E2C2A] text-[#2E2C2A] hover:bg-[#EFEAE2] py-3.5 text-xs uppercase tracking-wider font-semibold transition duration-200">
                                Lihat Keranjang
                            </a>
                            <form action="{{ route('cart.checkout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full bg-[#2E2C2A] text-white hover:bg-[#4E4B48] py-3.5 text-xs uppercase tracking-wider font-semibold transition duration-200 shadow-sm">
                                    Beli via WhatsApp
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

            </div>
        </div>

        <!-- Main Slot Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="w-full bg-[#F2EDE4] border-t border-[#EFEAE2] text-[#5A5550] pt-16 pb-12 font-light">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
                <!-- Left Block: About -->
                <div class="md:col-span-6 space-y-4">
                    <h3 class="text-xl font-serif text-[#2E2C2A] font-semibold tracking-wider">ABOUT LIORA FRAGRANCE</h3>
                    <p class="text-sm leading-relaxed text-[#7A7570] font-serif max-w-md">
                        Liora Fragrance is a modern luxury fragrance house dedicated to crafting unique sensory experiences. We combine raw sustainable botanicals with modern artistry to create scents that evoke emotion, redefine personal expression, and stand as statements of quiet sophistication.
                    </p>
                </div>

                <!-- Center Block: Address -->
                <div class="md:col-span-3 space-y-4 text-sm">
                    <h3 class="text-xs uppercase tracking-widest font-bold text-[#2E2C2A]">Butik Kami</h3>
                    <p class="text-[#7A7570] leading-relaxed">
                        Universitas Muhammadiyah Yogyakarta<br>
                        Jl. Brawijaya, Kasihan, Bantul<br>
                        Yogyakarta, Indonesia, 55183
                    </p>
                </div>

                <!-- Right Block: Contacts -->
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
