<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold bg-gradient-to-r from-purple-700 to-pink-600 bg-clip-text text-transparent" style="font-family: 'Playfair Display', serif;">
            ✨ Add New Product
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-xl border border-purple-100/50 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-purple-500 via-pink-500 to-rose-500"></div>
                <div class="p-8">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-purple-200">
                            <span class="text-3xl">🧴</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">New Perfume Product</h3>
                        <p class="text-sm text-gray-400 mt-1">Fill in the details for your new fragrance</p>
                    </div>

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-3 rounded-xl border border-purple-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 bg-white/50 placeholder-gray-300" placeholder="e.g. Baccarat Rouge 540" required>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                                <select name="category_id" id="category_id" class="w-full px-4 py-3 rounded-xl border border-purple-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 bg-white/50" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">Price (Rp)</label>
                                <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" class="w-full px-4 py-3 rounded-xl border border-purple-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 bg-white/50 placeholder-gray-300" placeholder="e.g. 5000000" required>
                                @error('price')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="stock" class="block text-sm font-semibold text-gray-700 mb-2">Stock</label>
                                <input type="number" name="stock" id="stock" value="{{ old('stock') }}" class="w-full px-4 py-3 rounded-xl border border-purple-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 bg-white/50 placeholder-gray-300" placeholder="e.g. 100" required>
                                @error('stock')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                            <textarea name="description" id="description" rows="4" class="w-full px-4 py-3 rounded-xl border border-purple-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all duration-200 bg-white/50 placeholder-gray-300" placeholder="Describe the fragrance notes, scent profile, and inspiration...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end space-x-3">
                            <a href="{{ route('products.index') }}" class="px-5 py-2.5 text-gray-500 hover:text-gray-700 font-medium rounded-xl hover:bg-gray-100 transition-all duration-200">Cancel</a>
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white font-semibold rounded-xl shadow-lg shadow-purple-200 hover:shadow-xl transition-all duration-300">
                                Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
