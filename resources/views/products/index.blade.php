<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-serif font-light text-[#2E2C2A] tracking-wide">
                Produk
            </h2>
            <a href="{{ route('products.create') }}" class="inline-flex items-center px-5 py-2.5 bg-[#2E2C2A] hover:bg-[#4E4B48] text-white font-semibold rounded-sm text-xs uppercase tracking-widest transition-all duration-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Produk
            </a>
        </div>
    </x-slot>

    <div class="py-8" x-data="{ deleteOpen: false, deleteUrl: '', deleteItemName: '' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 bg-[#F2EDE4] border border-[#EFEAE2] text-[#2E2C2A] px-6 py-4 rounded-sm flex items-center shadow-sm" role="alert">
                    <svg class="w-5 h-5 mr-3 text-[#2E2C2A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($products as $product)
                    <div class="group bg-white border border-[#EFEAE2] rounded-sm hover:border-[#2E2C2A]/30 transition-all duration-300 overflow-hidden flex flex-col justify-between">
                        <!-- Product Image Box -->
                        <div class="h-48 bg-[#F2EDE4] relative overflow-hidden flex items-center justify-center p-4 border-b border-[#EFEAE2]">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-contain mix-blend-multiply transition duration-500 group-hover:scale-105">
                            @else
                                <span class="text-5xl opacity-30">🧴</span>
                            @endif
                            <div class="absolute top-3 right-3">
                                <span class="px-2.5 py-1 bg-white/90 border border-[#EFEAE2] text-[10px] uppercase tracking-wider font-semibold rounded-sm text-[#2E2C2A] shadow-sm">
                                    {{ $product->category->name }}
                                </span>
                            </div>
                            <div class="absolute bottom-3 left-3">
                                <span class="px-2.5 py-1 bg-[#2E2C2A]/90 text-[10px] uppercase tracking-wider font-semibold rounded-sm text-[#F9F6F0]">
                                    Stok: {{ $product->stock }}
                                </span>
                            </div>
                        </div>

                        <div class="p-5 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-serif font-medium text-[#2E2C2A] mb-1">{{ $product->name }}</h3>
                                <p class="text-xs text-[#7A7570] font-light mb-4 line-clamp-2">{{ $product->description ?: 'A luxurious fragrance for every occasion.' }}</p>
                                
                                <!-- Scent profile info -->
                                <div class="grid grid-cols-2 gap-4 bg-[#F9F6F0] border border-[#EFEAE2] p-3 mb-4 text-[10px] uppercase tracking-wider rounded-sm">
                                    <div>
                                        <span class="font-bold text-[#2E2C2A] block">Aroma</span>
                                        <span class="text-[#7A7570] font-light truncate block" title="{{ $product->scent_notes }}">{{ $product->scent_notes ?: '-' }}</span>
                                    </div>
                                    <div>
                                        <span class="font-bold text-[#2E2C2A] block">Durasi</span>
                                        <span class="text-[#7A7570] font-light truncate block" title="{{ $product->longevity }}">{{ $product->longevity ?: '-' }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="flex items-center justify-between mb-4 pt-2">
                                    <span class="text-base font-serif font-medium text-[#2E2C2A]">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-end space-x-2 pt-4 border-t border-[#EFEAE2]">
                                    <a href="{{ route('products.edit', $product->id) }}" class="inline-flex items-center px-3 py-1.5 border border-[#EFEAE2] bg-[#F9F6F0] text-[#2E2C2A] hover:bg-[#EFEAE2] rounded-sm text-xs uppercase tracking-wider font-semibold transition-colors duration-200">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        Edit
                                    </a>
                                    <button type="button" @click="deleteUrl = '{{ route('products.destroy', $product->id) }}'; deleteItemName = '{{ $product->name }}'; deleteOpen = true" class="inline-flex items-center px-3 py-1.5 border border-rose-200 bg-rose-50/50 text-rose-800 hover:bg-rose-100/50 rounded-sm text-xs uppercase tracking-wider font-semibold transition-colors duration-200">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white border border-[#EFEAE2] rounded-sm">
                        <div class="w-16 h-16 bg-[#F2EDE4] border border-[#EFEAE2] rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl">🧴</span>
                        </div>
                        <h3 class="text-base font-serif font-medium text-[#2E2C2A] mb-1">Belum ada produk</h3>
                        <p class="text-xs text-[#7A7570] font-light mb-4">Mulailah dengan menambahkan parfum mewah pertama Anda!</p>
                        <a href="{{ route('products.create') }}" class="inline-flex items-center px-5 py-2.5 bg-[#2E2C2A] hover:bg-[#4E4B48] text-white font-semibold rounded-sm text-xs uppercase tracking-widest transition-all duration-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tambah Produk
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    
        <!-- Custom Delete Confirmation Modal -->
        <div x-show="deleteOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
            <!-- Backdrop -->
            <div x-show="deleteOpen" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 bg-[#2E2C2A]/60 backdrop-blur-sm transition-opacity" 
                 @click="deleteOpen = false"></div>

            <!-- Modal Panel -->
            <div x-show="deleteOpen" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 scale-95" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95" 
                 class="relative transform overflow-hidden bg-[#F9F6F0] border border-[#EFEAE2] p-8 text-center shadow-2xl transition-all w-full max-w-md rounded-sm">
                
                <h3 class="text-2xl font-serif font-light text-[#2E2C2A] mb-4">Konfirmasi Hapus</h3>
                <p class="text-sm text-[#7A7570] font-light mb-8">
                    Apakah Anda yakin ingin menghapus produk <span class="font-semibold text-[#2E2C2A]" x-text="deleteItemName"></span>? Tindakan ini tidak dapat dibatalkan.
                </p>
                
                <form :action="deleteUrl" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <div class="flex items-center justify-center space-x-4">
                        <button type="button" @click="deleteOpen = false" class="px-6 py-3 border border-[#2E2C2A] text-[#2E2C2A] hover:bg-[#EFEAE2] text-xs uppercase tracking-wider font-semibold transition duration-200 rounded-sm">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-3 bg-rose-900 text-white hover:bg-rose-950 text-xs uppercase tracking-wider font-semibold transition duration-200 shadow-sm rounded-sm">
                            Ya, Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
