@extends('layouts.liora')

@section('title', 'Your Cart — LIORA FRAGRANCE')

@section('content')

    <!-- Cart Main Content Section -->
    <section class="w-full py-16 bg-[#F9F6F0]">
        <div class="max-w-5xl mx-auto px-6">
            <h1 class="text-4xl md:text-5xl font-serif font-light text-[#2E2C2A] mb-12">Keranjang Belanja Anda</h1>

            @if (empty($cart))
                <div class="text-center py-20 bg-[#F2EDE4] border border-[#EFEAE2] space-y-6">
                    <p class="text-lg text-[#5A5550] font-serif font-light">Keranjang belanja Anda saat ini kosong.</p>
                    <a href="{{ route('public.fragrances') }}" class="inline-block bg-[#2E2C2A] text-white hover:bg-[#4E4B48] px-8 py-3 text-xs uppercase tracking-widest font-semibold transition duration-300">
                        Lihat Semua Parfum
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                    <!-- Items Table List (8 cols) -->
                    <div class="lg:col-span-8 space-y-6">
                        @php $subtotal = 0; @endphp
                        @foreach ($cart as $id => $item)
                            @php 
                                $itemSubtotal = $item['price'] * $item['qty']; 
                                $subtotal += $itemSubtotal;
                            @endphp
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between border-b border-[#EFEAE2] pb-6 last:border-0">
                                <!-- Product details info -->
                                <div class="flex items-center space-x-6 flex-1">
                                    <div class="bg-[#F2EDE4] w-20 h-20 flex justify-center items-center p-2 rounded-sm overflow-hidden flex-shrink-0">
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-contain mix-blend-multiply">
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-serif text-[#2E2C2A] font-normal leading-tight">{{ $item['name'] }}</h3>
                                        <p class="text-xs text-[#7A7570] font-light mt-0.5">{{ $item['scent_notes'] }}</p>
                                        <p class="text-xs text-[#2E2C2A] font-semibold mt-1">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                    </div>
                                </div>

                                <!-- Action inputs (quantity counters & delete) -->
                                <div class="flex items-center space-x-8 mt-4 sm:mt-0 w-full sm:w-auto justify-between sm:justify-end">
                                    <!-- Edit quantity forms -->
                                    <div class="flex items-center space-x-1.5 border border-[#2E2C2A]/20 bg-[#F2EDE4]/30 rounded-sm">
                                        <!-- Minus -->
                                        @if ($item['qty'] == 1)
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1.5 text-xs text-rose-900 font-bold hover:bg-rose-50">&minus;</button>
                                            </form>
                                        @else
                                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="qty" value="{{ $item['qty'] - 1 }}">
                                                <button type="submit" class="px-3 py-1.5 text-xs text-[#2E2C2A] hover:bg-[#EFEAE2] font-bold">&minus;</button>
                                            </form>
                                        @endif
                                        
                                        <span class="text-xs text-[#2E2C2A] px-2 font-medium">{{ $item['qty'] }}</span>

                                        <!-- Plus -->
                                        <form action="{{ route('cart.update', $id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="qty" value="{{ $item['qty'] + 1 }}">
                                            <button type="submit" class="px-3 py-1.5 text-xs text-[#2E2C2A] hover:bg-[#EFEAE2] font-bold">+</button>
                                        </form>
                                    </div>

                                    <!-- Remove item form -->
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-900 hover:text-rose-700 font-sans text-sm font-medium">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Order Summary Card (4 cols) -->
                    <div class="lg:col-span-4 bg-[#F2EDE4] border border-[#EFEAE2] p-8 space-y-6 self-start">
                        <h2 class="text-xl font-serif text-[#2E2C2A] tracking-wide border-b border-[#EFEAE2] pb-4">Ringkasan Pesanan</h2>
                        
                        <div class="space-y-4 text-sm font-light text-[#5A5550]">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span class="font-medium text-[#2E2C2A]">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Pengiriman</span>
                                <span class="text-xs uppercase tracking-widest text-emerald-800 font-semibold">Gratis</span>
                            </div>
                            <div class="h-px bg-[#EFEAE2] my-2"></div>
                            <div class="flex justify-between text-base text-[#2E2C2A] font-semibold">
                                <span>Total</span>
                                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Checkout action form -->
                        <form action="{{ route('cart.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-[#2E2C2A] text-white hover:bg-[#4E4B48] py-4 text-xs uppercase tracking-widest font-semibold transition duration-300 shadow-sm">
                                Beli via WhatsApp
                            </button>
                        </form>
                        <p class="text-[11px] text-[#7A7570] text-center font-light leading-relaxed">
                            Catatan: Anda harus login untuk melakukan checkout. Jika Anda belum memiliki akun, silakan mendaftar.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
