<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-serif font-light text-[#2E2C2A] tracking-wide">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Banner -->
            <div class="relative overflow-hidden bg-[#F2EDE4] border border-[#EFEAE2] p-8 mb-8 rounded-sm">
                <div class="relative z-10">
                    <h3 class="text-3xl font-serif font-light text-[#2E2C2A] mb-2">
                        Selamat datang kembali, {{ Auth::user()->name }}! 🌸
                    </h3>
                    <p class="text-[#5A5550] text-sm font-light">Kelola koleksi parfum mewah Anda dari dashboard ini.</p>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Products -->
                <div class="bg-white border border-[#EFEAE2] p-6 rounded-sm hover:border-[#2E2C2A]/30 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-[#7A7570] uppercase tracking-widest font-sans">Total Produk</p>
                            <p class="text-3xl font-light text-[#2E2C2A] mt-1 font-serif">
                                {{ \App\Models\Product::count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-[#F2EDE4] border border-[#EFEAE2] rounded-sm flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#2E2C2A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Total Categories -->
                <div class="bg-white border border-[#EFEAE2] p-6 rounded-sm hover:border-[#2E2C2A]/30 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-[#7A7570] uppercase tracking-widest font-sans">Kategori</p>
                            <p class="text-3xl font-light text-[#2E2C2A] mt-1 font-serif">
                                {{ \App\Models\Category::count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-[#F2EDE4] border border-[#EFEAE2] rounded-sm flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#2E2C2A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Total Stock -->
                <div class="bg-white border border-[#EFEAE2] p-6 rounded-sm hover:border-[#2E2C2A]/30 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-semibold text-[#7A7570] uppercase tracking-widest font-sans">Total Stok</p>
                            <p class="text-3xl font-light text-[#2E2C2A] mt-1 font-serif">
                                {{ \App\Models\Product::sum('stock') }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-[#F2EDE4] border border-[#EFEAE2] rounded-sm flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#2E2C2A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('products.create') }}" class="group bg-white border border-[#EFEAE2] p-6 rounded-sm hover:border-[#2E2C2A]/40 transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-[#2E2C2A] rounded-sm flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-base uppercase tracking-wider font-semibold text-[#2E2C2A] font-serif">Tambah Produk Baru</h4>
                            <p class="text-xs text-[#7A7570] font-light mt-1">Tambahkan parfum baru ke koleksi Anda</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('categories.create') }}" class="group bg-white border border-[#EFEAE2] p-6 rounded-sm hover:border-[#2E2C2A]/40 transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-[#2E2C2A] rounded-sm flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-base uppercase tracking-wider font-semibold text-[#2E2C2A] font-serif">Tambah Kategori Baru</h4>
                            <p class="text-xs text-[#7A7570] font-light mt-1">Buat kategori parfum baru</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
