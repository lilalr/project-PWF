<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-serif font-light text-[#2E2C2A] tracking-wide">
            Create Category
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-[#EFEAE2] rounded-sm overflow-hidden">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <div class="w-12 h-12 bg-[#F2EDE4] border border-[#EFEAE2] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#2E2C2A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                        <h3 class="text-lg font-serif font-medium text-[#2E2C2A]">New Fragrance Category</h3>
                        <p class="text-xs text-[#7A7570] font-light mt-1">Add a new category to organize your perfume collection</p>
                    </div>

                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-8">
                            <label for="name" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Category Name</label>
                            <input type="text" name="name" id="name" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] placeholder-gray-400 text-sm transition-all duration-200" placeholder="e.g. Eau de Parfum, Eau de Toilette..." required>
                            @error('name')
                                <p class="text-rose-950 text-xs mt-2 flex items-center font-semibold"><svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end space-x-4 pt-4 border-t border-[#EFEAE2]">
                            <a href="{{ route('categories.index') }}" class="px-5 py-2.5 text-[#7A7570] hover:text-[#2E2C2A] font-semibold text-xs uppercase tracking-widest transition-all duration-200">Cancel</a>
                            <button type="submit" class="px-6 py-2.5 bg-[#2E2C2A] hover:bg-[#4E4B48] text-white font-semibold rounded-sm text-xs uppercase tracking-widest transition-all duration-300">
                                Save Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
