@extends('layouts.liora')

@section('title', 'Fragrances Catalog — LIORA FRAGRANCE')

@section('content')

    <!-- Header Intro Section -->
    <section class="w-full bg-[#F2EDE4] py-16 border-b border-[#EFEAE2] text-center">
        <div class="max-w-3xl mx-auto px-6 space-y-4">
            <h1 class="text-4xl md:text-5xl font-serif font-light text-[#2E2C2A]">The Fragrance Library</h1>
            <p class="text-sm text-[#7A7570] font-light max-w-md mx-auto leading-relaxed">
                Browse our full olfactory catalog. Each creation is defined by custom scent characteristics, detailed aromatics, and long-lasting notes.
            </p>
        </div>
    </section>

    <!-- Products Showcase Catalog -->
    <section class="w-full py-20 bg-[#F9F6F0]">
        <div class="max-w-7xl mx-auto px-6">
            
            <div class="space-y-24">
                @forelse ($products as $product)
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center border-b border-[#EFEAE2] pb-20 last:border-0 last:pb-0">
                        <!-- Image Left (5 cols) -->
                        <div class="lg:col-span-5 bg-[#F2EDE4] aspect-square flex justify-center items-center p-8 overflow-hidden rounded-sm">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain mix-blend-multiply">
                        </div>

                        <!-- Content Right (7 cols) -->
                        <div class="lg:col-span-7 space-y-6 flex flex-col justify-center">
                            <div>
                                <span class="text-xs uppercase tracking-widest text-[#7A7570] font-semibold">{{ $product->category->name }}</span>
                                <h2 class="text-4xl md:text-5xl font-serif font-light text-[#2E2C2A] mt-1">{{ $product->name }}</h2>
                            </div>

                            <p class="text-base text-[#5A5550] leading-relaxed font-serif font-light">
                                {{ $product->description }}
                            </p>

                            <!-- Scent profile attributes details -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 bg-[#F2EDE4]/60 border border-[#EFEAE2] p-6 text-sm">
                                <div>
                                    <h4 class="text-xs uppercase tracking-wider text-[#2E2C2A] font-bold">Aroma Notes / Rasa</h4>
                                    <p class="text-xs text-[#7A7570] mt-1 font-light">{{ $product->scent_notes }}</p>
                                </div>
                                <div>
                                    <h4 class="text-xs uppercase tracking-wider text-[#2E2C2A] font-bold">Longevity / Ketahanan</h4>
                                    <p class="text-xs text-[#7A7570] mt-1 font-light">{{ $product->longevity }}</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4">
                                <span class="text-2xl font-serif text-[#2E2C2A] font-normal">${{ number_format($product->price, 0) }}</span>
                                
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-[#2E2C2A] text-white hover:bg-[#4E4B48] px-10 py-4 text-xs uppercase tracking-widest font-semibold transition duration-300 shadow-sm">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-20 text-[#7A7570] font-light">
                        No products are available in the catalog yet.
                    </div>
                @endforelse
            </div>

        </div>
    </section>

@endsection
