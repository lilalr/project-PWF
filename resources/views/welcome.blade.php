@extends('layouts.liora')

@section('title', 'LIORA FRAGRANCE — Essence of Elegance')

@section('content')

    <!-- Hero Section -->
    <section class="w-full bg-[#F2EDE4] py-12 md:py-20 lg:py-24 border-b border-[#EFEAE2]">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Hero Text (Left) -->
            <div class="lg:col-span-6 flex flex-col items-start text-left space-y-8">
                <h1 class="text-6xl sm:text-7xl md:text-8xl font-serif font-light text-[#2E2C2A] leading-[1.05] tracking-tight">
                    Essence<br>
                    of Elegance
                </h1>
                <p class="text-base sm:text-lg text-[#5A5550] max-w-lg leading-relaxed font-light">
                    Step into a world of curated scents. Liora Fragrance offers premium collections of luxury perfume, hand-poured with botanical essences to define your individual signature.
                </p>
                <a href="{{ route('public.fragrances') }}" class="inline-block bg-[#2E2C2A] text-white hover:bg-[#4E4B48] px-10 py-4 text-xs uppercase tracking-widest font-semibold transition duration-300 shadow-sm">
                    Explore Fragrances
                </a>
            </div>

            <!-- Hero Image (Right) -->
            <div class="lg:col-span-6 flex justify-center">
                <div class="w-full max-w-md aspect-[4/5] overflow-hidden flex items-center justify-center p-6 bg-transparent">
                    <img src="{{ asset('images/scentaris_hero.png') }}" alt="LIORA FRAGRANCE Scent Bottle" class="w-full h-full object-contain filter drop-shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="w-full py-20 md:py-28 bg-[#F9F6F0]">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-serif font-light text-[#2E2C2A] mb-12 text-center md:text-left">
                Featured Products
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($featuredProducts as $product)
                    <div class="flex flex-col group">
                        <!-- Image Container -->
                        <div class="bg-[#F2EDE4] w-full aspect-square flex justify-center items-center p-6 overflow-hidden transition-all duration-300 group-hover:shadow-lg relative">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain transition duration-500 group-hover:scale-105 mix-blend-multiply">
                            
                            <!-- Hover Quick View Scent & Longevity Details -->
                            <div class="absolute inset-0 bg-[#2E2C2A]/90 text-[#F9F6F0] p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-center text-center space-y-3">
                                <h4 class="font-serif text-lg tracking-wide">Scent Profile</h4>
                                <p class="text-xs font-light text-white/80">{{ $product->scent_notes }}</p>
                                <div class="h-px bg-[#EFEAE2]/20 w-12 mx-auto"></div>
                                <p class="text-[11px] uppercase tracking-widest text-[#EFEAE2]">Duration: {{ $product->longevity }}</p>
                            </div>
                        </div>
                        <!-- Meta Details -->
                        <h3 class="text-2xl font-serif text-[#2E2C2A] mt-4 font-normal">{{ $product->name }}</h3>
                        <p class="text-xs text-[#7A7570] font-sans mt-1 uppercase tracking-wider font-light">{{ $product->scent_notes }}</p>
                        <span class="text-sm text-[#2E2C2A] mt-2 font-medium">${{ number_format($product->price, 0) }}</span>
                        
                        <!-- Add to Cart Form -->
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full mt-4 border border-[#2E2C2A] text-[#2E2C2A] hover:bg-[#2E2C2A] hover:text-white py-3 text-xs uppercase tracking-wider font-semibold transition duration-300">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-12 text-[#7A7570] font-light">
                        No products found in the catalog.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Split Highlights Section -->
    <section class="w-full py-20 bg-[#F2EDE4] border-t border-b border-[#EFEAE2]">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Scent Highlight Left (7 cols) -->
            <div class="lg:col-span-7 flex flex-col justify-center space-y-6">
                <h2 class="text-4xl md:text-5xl font-serif font-light text-[#2E2C2A]">
                    Signature Scent Highlight
                </h2>
                <span class="text-xs uppercase tracking-widest text-[#7A7570] font-semibold">Introducing / Velour</span>
                <p class="text-lg text-[#5A5550] leading-relaxed font-serif font-light">
                    A sensual blend of musk and wild rose. We invite you to experience the soft textures, delicate petals, and warm underlying woody base that defines our latest masterpiece.
                </p>
            </div>

            <!-- Introducing Velour Promo Card Right (5 cols) -->
            <div class="lg:col-span-5 bg-[#F9F6F0] border border-[#EFEAE2] p-8 md:p-12 flex flex-col justify-between space-y-8">
                @if ($velour)
                    <div>
                        <h3 class="text-3xl font-serif text-[#2E2C2A] font-light">Introducing: {{ $velour->name }}</h3>
                        <p class="text-sm text-[#5A5550] mt-2 font-light">{{ $velour->scent_notes }} &mdash; Tahan {{ $velour->longevity }}</p>
                    </div>
                    <form action="{{ route('cart.add', $velour->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="inline-block bg-[#2E2C2A] text-white hover:bg-[#4E4B48] text-xs uppercase tracking-widest font-semibold px-8 py-3.5 transition duration-300 self-start shadow-sm">
                            Shop Now (Add to Cart)
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="w-full py-24 bg-[#F9F6F0]">
        <div class="max-w-3xl mx-auto px-6 flex flex-col items-center text-center space-y-8">
            <h2 class="text-3xl md:text-4xl font-serif font-light text-[#2E2C2A] leading-tight">
                Stay in the scent loop —<br>
                exclusive launches & stories.
            </h2>
            
            <form class="w-full flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                <input type="email" placeholder="Email address" required class="bg-transparent border-b border-[#2E2C2A] text-[#2E2C2A] placeholder-[#7A7570] py-2.5 px-1 focus:outline-none w-full sm:w-80 text-sm font-light">
                <button type="submit" class="w-full sm:w-auto border border-[#2E2C2A] text-[#2E2C2A] hover:bg-[#2E2C2A] hover:text-white px-8 py-3 text-xs uppercase tracking-widest font-semibold transition duration-300">
                    Subscribe
                </button>
            </form>
        </div>
    </section>

@endsection
