<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold bg-gradient-to-r from-purple-700 to-pink-600 bg-clip-text text-transparent" style="font-family: 'Playfair Display', serif;">
            ✨ Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Banner -->
            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-purple-600 via-pink-500 to-rose-500 p-8 mb-8 shadow-2xl">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-60 h-60 bg-white/5 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <h3 class="text-3xl font-bold text-white mb-2" style="font-family: 'Playfair Display', serif;">
                        Welcome back, {{ Auth::user()->name }}! 🌸
                    </h3>
                    <p class="text-purple-100 text-lg">Manage your luxury perfume collection from this dashboard.</p>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Products -->
                <div class="bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-purple-100/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Products</p>
                            <p class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-500 bg-clip-text text-transparent mt-1">
                                {{ \App\Models\Product::count() }}
                            </p>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg shadow-purple-200">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Total Categories -->
                <div class="bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-rose-100/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Categories</p>
                            <p class="text-3xl font-bold bg-gradient-to-r from-rose-500 to-orange-400 bg-clip-text text-transparent mt-1">
                                {{ \App\Models\Category::count() }}
                            </p>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-rose-500 to-orange-400 rounded-xl flex items-center justify-center shadow-lg shadow-rose-200">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Total Stock -->
                <div class="bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-emerald-100/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Stock</p>
                            <p class="text-3xl font-bold bg-gradient-to-r from-emerald-500 to-teal-400 bg-clip-text text-transparent mt-1">
                                {{ \App\Models\Product::sum('stock') }}
                            </p>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-400 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-200">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('products.create') }}" class="group bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-purple-100/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">Add New Product</h4>
                            <p class="text-sm text-gray-500">Add a new perfume to your collection</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('categories.create') }}" class="group bg-white/80 backdrop-blur-lg rounded-2xl p-6 shadow-lg border border-pink-100/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800">Add New Category</h4>
                            <p class="text-sm text-gray-500">Create a new fragrance category</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
