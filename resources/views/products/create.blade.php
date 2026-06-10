<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-serif font-light text-[#2E2C2A] tracking-wide">
            Tambah Produk Baru
        </h2>
    </x-slot>

    <div class="py-8" x-data="{ confirmOpen: false }">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-[#EFEAE2] rounded-sm overflow-hidden">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <div class="w-12 h-12 bg-[#F2EDE4] border border-[#EFEAE2] rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🧴</span>
                        </div>
                        <h3 class="text-lg font-serif font-medium text-[#2E2C2A]">Produk Parfum Baru</h3>
                        <p class="text-xs text-[#7A7570] font-light mt-1">Isi rincian informasi untuk wewangian baru Anda</p>
                    </div>

                    <form action="{{ route('products.store') }}" method="POST" id="create-product-form">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                            <div>
                                <label for="name" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Nama Produk</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="Contoh: Radiance" required>
                                @error('name')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="category_id" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Kategori</label>
                                <select name="category_id" id="category_id" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm transition-all duration-200" required>
                                    <option value="" class="text-gray-400">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="price" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Harga (Rp)</label>
                                <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="Contoh: 120000" required>
                                @error('price')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="stock" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Stok</label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock') }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="Contoh: 10" required>
                                @error('stock')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="scent_notes" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Catatan Aroma / Rasa</label>
                                <input type="text" name="scent_notes" id="scent_notes" value="{{ old('scent_notes') }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="Contoh: Violets, Amber & Jasmine" required>
                                @error('scent_notes')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="longevity" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Daya Tahan / Ketahanan</label>
                                <input type="text" name="longevity" id="longevity" value="{{ old('longevity') }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="Contoh: 6-8 Jam" required>
                                @error('longevity')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="image" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Path Gambar</label>
                                <input type="text" name="image" id="image" value="{{ old('image') }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="Contoh: images/perfume_radiance.png" required>
                                <p class="text-[10px] text-[#7A7570] font-light mt-1.5 leading-normal">
                                    Gambar bawaan yang tersedia: <code class="bg-[#F2EDE4] px-1 py-0.5 rounded-sm">images/perfume_radiance.png</code>, <code class="bg-[#F2EDE4] px-1 py-0.5 rounded-sm">images/perfume_enclaye.png</code>, <code class="bg-[#F2EDE4] px-1 py-0.5 rounded-sm">images/perfume_opulent.png</code>, <code class="bg-[#F2EDE4] px-1 py-0.5 rounded-sm">images/perfume_eclipse.png</code>, <code class="bg-[#F2EDE4] px-1 py-0.5 rounded-sm">images/about_perfume.png</code>
                                </p>
                                @error('image')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Deskripsi</label>
                            <textarea name="description" id="description" rows="4" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="Jelaskan aroma wewangian, profil aroma, dan inspirasi parfum..." required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-4 border-t border-[#EFEAE2]">
                            <a href="{{ route('products.index') }}" class="px-5 py-2.5 text-[#7A7570] hover:text-[#2E2C2A] font-semibold text-xs uppercase tracking-widest transition-all duration-200">Batal</a>
                            <button type="button" @click="if ($el.closest('form').checkValidity()) { confirmOpen = true } else { $el.closest('form').reportValidity() }" class="px-6 py-2.5 bg-[#2E2C2A] hover:bg-[#4E4B48] text-white font-semibold rounded-sm text-xs uppercase tracking-widest transition-all duration-300">
                                Simpan Produk
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Custom Confirmation Modal -->
        <div x-show="confirmOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
            <!-- Backdrop -->
            <div x-show="confirmOpen" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="fixed inset-0 bg-[#2E2C2A]/60 backdrop-blur-sm transition-opacity" 
                 @click="confirmOpen = false"></div>

            <!-- Modal Panel -->
            <div x-show="confirmOpen" 
                 x-transition:enter="ease-out duration-300" 
                 x-transition:enter-start="opacity-0 scale-95" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="ease-in duration-200" 
                 x-transition:leave-start="opacity-100 scale-100" 
                 x-transition:leave-end="opacity-0 scale-95" 
                 class="relative transform overflow-hidden bg-[#F9F6F0] border border-[#EFEAE2] p-8 text-center shadow-2xl transition-all w-full max-w-md rounded-sm">
                
                <h3 class="text-2xl font-serif font-light text-[#2E2C2A] mb-4">Konfirmasi Produk</h3>
                <p class="text-sm text-[#7A7570] font-light mb-8">Apakah Anda ingin menambahkan produk ini?</p>
                
                <div class="flex items-center justify-center space-x-4">
                    <button type="button" @click="confirmOpen = false" class="px-6 py-3 border border-[#2E2C2A] text-[#2E2C2A] hover:bg-[#EFEAE2] text-xs uppercase tracking-wider font-semibold transition duration-200 rounded-sm">
                        Batal
                    </button>
                    <button type="button" @click="document.getElementById('create-product-form').submit()" class="px-6 py-3 bg-[#2E2C2A] text-white hover:bg-[#4E4B48] text-xs uppercase tracking-wider font-semibold transition duration-200 shadow-sm rounded-sm">
                        Ya, Tambahkan
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
