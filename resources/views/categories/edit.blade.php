<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-serif font-light text-[#2E2C2A] tracking-wide">
            Edit Kategori
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-[#EFEAE2] rounded-sm overflow-hidden">
                <div class="p-8">
                    <div class="text-center mb-8">
                        <div class="w-12 h-12 bg-[#F2EDE4] border border-[#EFEAE2] rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#2E2C2A]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <h3 class="text-lg font-serif font-medium text-[#2E2C2A]">Edit Kategori</h3>
                        <p class="text-xs text-[#7A7570] font-light mt-1">Perbarui detail untuk "{{ $category->name }}"</p>
                    </div>

                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-8">
                            <label for="name" class="block text-xs uppercase tracking-widest font-semibold text-[#2E2C2A] mb-2">Nama Kategori</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="w-full px-4 py-3 rounded-sm border border-[#EFEAE2] focus:border-[#2E2C2A] focus:ring-0 bg-[#F9F6F0]/50 text-[#2E2C2A] text-sm transition-all duration-200" required>
                            @error('name')
                                <p class="text-rose-950 text-xs mt-2 flex items-center font-semibold"><svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end space-x-4 pt-4 border-t border-[#EFEAE2]">
                            <a href="{{ route('categories.index') }}" class="px-5 py-2.5 text-[#7A7570] hover:text-[#2E2C2A] font-semibold text-xs uppercase tracking-widest transition-all duration-200">Batal</a>
                            <button type="submit" class="px-6 py-2.5 bg-[#2E2C2A] hover:bg-[#4E4B48] text-white font-semibold rounded-sm text-xs uppercase tracking-widest transition-all duration-300">
                                Perbarui Kategori
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
