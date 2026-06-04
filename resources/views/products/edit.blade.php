<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-serif font-light text-[#2E2C2A] tracking-wide">
            Edit Product
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-[#EFEAE2] rounded-sm overflow-hidden">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <div class="w-12 h-12 bg-[#F2EDE4] border border-[#EFEAE2] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#2E2C2A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <h3 class="text-lg font-serif font-medium text-[#2E2C2A]">Edit Product</h3>
                        <p class="text-xs text-[#7A7570] font-light mt-1">Update details for "{{ $product->name }}"</p>
                    </div>

                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                            <div>
                                <label for="name" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm transition-all duration-200" required>
                                @error('name')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="category_id" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Category</label>
                                <select name="category_id" id="category_id" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm transition-all duration-200" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="price" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Price (Rp)</label>
                                <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm transition-all duration-200" required>
                                @error('price')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="stock" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Stock</label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm transition-all duration-200" required>
                                @error('stock')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="scent_notes" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Aroma Notes / Rasa</label>
                                <input type="text" name="scent_notes" id="scent_notes" value="{{ old('scent_notes', $product->scent_notes) }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="e.g. Violets, Amber & Jasmine">
                                @error('scent_notes')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="longevity" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Longevity / Ketahanan</label>
                                <input type="text" name="longevity" id="longevity" value="{{ old('longevity', $product->longevity) }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="e.g. 6-8 Hours">
                                @error('longevity')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="image" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Image Path</label>
                                <input type="text" name="image" id="image" value="{{ old('image', $product->image) }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="e.g. images/perfume_radiance.png">
                                <p class="text-[10px] text-[#7A7570] font-light mt-1.5 leading-normal">
                                    Available seeded images: <code class="bg-[#F2EDE4] px-1 py-0.5 rounded-sm">images/perfume_radiance.png</code>, <code class="bg-[#F2EDE4] px-1 py-0.5 rounded-sm">images/perfume_enclaye.png</code>, <code class="bg-[#F2EDE4] px-1 py-0.5 rounded-sm">images/perfume_opulent.png</code>, <code class="bg-[#F2EDE4] px-1 py-0.5 rounded-sm">images/perfume_eclipse.png</code>, <code class="bg-[#F2EDE4] px-1 py-0.5 rounded-sm">images/about_perfume.png</code>
                                </p>
                                @error('image')
                                    <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Description</label>
                            <textarea name="description" id="description" rows="4" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm placeholder-gray-400 transition-all duration-200" placeholder="Describe the fragrance notes...">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="text-rose-950 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-4 pt-4 border-t border-[#EFEAE2]">
                            <a href="{{ route('products.index') }}" class="px-5 py-2.5 text-[#7A7570] hover:text-[#2E2C2A] font-semibold text-xs uppercase tracking-widest transition-all duration-200">Cancel</a>
                            <button type="submit" class="px-6 py-2.5 bg-[#2E2C2A] hover:bg-[#4E4B48] text-white font-semibold rounded-sm text-xs uppercase tracking-widest transition-all duration-300">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
