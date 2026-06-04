<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LUXURA - Premium Perfume Collection</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700,800,900|inter:300,400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <!-- Hero Section -->
        <div class="min-h-screen bg-gradient-to-br from-purple-900 via-purple-800 to-pink-800 relative overflow-hidden">
            <!-- Animated Background Blobs -->
            <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
            <div class="absolute top-40 right-10 w-96 h-96 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-rose-500 rounded-full mix-blend-multiply filter blur-3xl opacity-15 animate-pulse" style="animation-delay: 4s;"></div>

            <!-- Navigation -->
            <nav class="relative z-10 max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <span class="text-2xl">✨</span>
                    <span class="text-2xl font-bold tracking-wider text-white" style="font-family: 'Playfair Display', serif;">LUXURA</span>
                </div>
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white rounded-xl font-medium backdrop-blur-sm transition-all duration-300">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-6 py-2.5 text-purple-200 hover:text-white font-medium transition-all duration-300">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-6 py-2.5 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white rounded-xl font-semibold shadow-lg shadow-pink-500/30 hover:shadow-xl transition-all duration-300">
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>

            <!-- Hero Content -->
            <div class="relative z-10 max-w-7xl mx-auto px-6 pt-20 pb-32 flex flex-col items-center text-center">
                <div class="mb-6">
                    <span class="px-4 py-2 bg-white/10 border border-white/20 rounded-full text-sm text-purple-200 backdrop-blur-sm">
                        🌸 Premium Fragrance Management System
                    </span>
                </div>
                
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight" style="font-family: 'Playfair Display', serif;">
                    Discover Your
                    <br>
                    <span class="bg-gradient-to-r from-pink-300 via-rose-300 to-orange-200 bg-clip-text text-transparent">
                        Signature Scent
                    </span>
                </h1>
                
                <p class="text-lg md:text-xl text-purple-200 max-w-2xl mb-10 leading-relaxed">
                    Manage your luxury perfume collection with elegance. Track inventory, organize categories, and explore your fragrance portfolio.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-8 py-4 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white rounded-2xl font-semibold text-lg shadow-2xl shadow-pink-500/30 hover:shadow-pink-500/50 hover:-translate-y-1 transition-all duration-300">
                            Go to Dashboard →
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-8 py-4 bg-gradient-to-r from-pink-500 to-rose-500 hover:from-pink-600 hover:to-rose-600 text-white rounded-2xl font-semibold text-lg shadow-2xl shadow-pink-500/30 hover:shadow-pink-500/50 hover:-translate-y-1 transition-all duration-300">
                            Get Started →
                        </a>
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-white/10 hover:bg-white/20 border border-white/20 text-white rounded-2xl font-semibold text-lg backdrop-blur-sm hover:-translate-y-1 transition-all duration-300">
                            Create Account
                        </a>
                    @endauth
                </div>

                <!-- Feature Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-20 w-full max-w-5xl">
                    <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-6 text-left hover:bg-white/15 transition-all duration-300">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-pink-400 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-2">Product Management</h3>
                        <p class="text-purple-300 text-sm">Add, edit, and manage your entire perfume inventory with ease.</p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-6 text-left hover:bg-white/15 transition-all duration-300">
                        <div class="w-12 h-12 bg-gradient-to-br from-rose-400 to-orange-400 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-2">Smart Categories</h3>
                        <p class="text-purple-300 text-sm">Organize fragrances by type, brand, or custom categories.</p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-lg border border-white/10 rounded-2xl p-6 text-left hover:bg-white/15 transition-all duration-300">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-400 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-2">Secure API</h3>
                        <p class="text-purple-300 text-sm">RESTful API with token authentication for integration.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
