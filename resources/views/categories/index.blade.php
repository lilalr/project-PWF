<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold bg-gradient-to-r from-purple-700 to-pink-600 bg-clip-text text-transparent" style="font-family: 'Playfair Display', serif;">
                🏷️ Categories
            </h2>
            <a href="{{ route('categories.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-700 hover:to-pink-600 text-white font-semibold rounded-xl shadow-lg shadow-purple-200 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300 text-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add Category
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-xl shadow-sm flex items-center" role="alert">
                    <svg class="w-5 h-5 mr-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($categories as $category)
                    <div class="group bg-white/80 backdrop-blur-lg rounded-2xl shadow-lg border border-purple-100/50 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                        <!-- Colored Header Bar -->
                        @php
                            $colors = [
                                'from-purple-500 to-indigo-500',
                                'from-pink-500 to-rose-500',
                                'from-violet-500 to-purple-500',
                                'from-fuchsia-500 to-pink-500',
                                'from-rose-500 to-orange-400',
                                'from-indigo-500 to-blue-500',
                            ];
                            $colorClass = $colors[$loop->index % count($colors)];
                        @endphp
                        <div class="h-2 bg-gradient-to-r {{ $colorClass }}"></div>
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br {{ $colorClass }} rounded-xl flex items-center justify-center shadow-lg">
                                        <span class="text-white font-bold text-lg">{{ strtoupper(substr($category->name, 0, 1)) }}</span>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-800">{{ $category->name }}</h3>
                                        <p class="text-sm text-gray-400">{{ $category->products->count() }} products</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-end space-x-2 mt-4 pt-4 border-t border-gray-100">
                                <a href="{{ route('categories.edit', $category->id) }}" class="inline-flex items-center px-3 py-1.5 bg-indigo-50 text-indigo-600 hover:bg-indigo-100 rounded-lg text-sm font-medium transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg text-sm font-medium transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-600 mb-2">No categories yet</h3>
                        <p class="text-gray-400 mb-4">Start by creating your first fragrance category!</p>
                        <a href="{{ route('categories.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-purple-600 to-pink-500 text-white font-semibold rounded-xl shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Create Category
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
