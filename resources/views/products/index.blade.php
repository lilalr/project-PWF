<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-serif font-light text-[#2E2C2A] tracking-wide">
                Products
            </h2>
            <a href="{{ route('products.create') }}" class="inline-flex items-center px-5 py-2.5 bg-[#2E2C2A] hover:bg-[#4E4B48] text-white font-semibold rounded-sm text-xs uppercase tracking-widest transition-all duration-300">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add Product
            </a>
        </div>
    </x-slot>

    <div class="py-8">
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
                                    Stock: {{ $product->stock }}
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
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-rose-200 bg-rose-50/50 text-rose-800 hover:bg-rose-100/50 rounded-sm text-xs uppercase tracking-wider font-semibold transition-colors duration-200">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16 bg-white border border-[#EFEAE2] rounded-sm">
                        <div class="w-16 h-16 bg-[#F2EDE4] border border-[#EFEAE2] rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-3xl">🧴</span>
                        </div>
                        <h3 class="text-base font-serif font-medium text-[#2E2C2A] mb-1">No products yet</h3>
                        <p class="text-xs text-[#7A7570] font-light mb-4">Start by adding your first luxury perfume!</p>
                        <a href="{{ route('products.create') }}" class="inline-flex items-center px-5 py-2.5 bg-[#2E2C2A] hover:bg-[#4E4B48] text-white font-semibold rounded-sm text-xs uppercase tracking-widest transition-all duration-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Add Product
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
