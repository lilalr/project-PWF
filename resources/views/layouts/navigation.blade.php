<nav x-data="{ open: false }" class="bg-[#F9F6F0] border-b border-[#EFEAE2]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex space-x-12">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-2xl font-semibold tracking-widest font-serif text-[#2E2C2A]">
                        LIORA FRAGRANCE
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:-my-px sm:flex sm:space-x-8">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-xs uppercase tracking-widest font-medium transition duration-200 {{ request()->routeIs('dashboard') ? 'border-[#2E2C2A] text-[#2E2C2A]' : 'border-transparent text-[#7A7570] hover:text-[#2E2C2A] hover:border-[#2E2C2A]/30' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('categories.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-xs uppercase tracking-widest font-medium transition duration-200 {{ request()->routeIs('categories.*') ? 'border-[#2E2C2A] text-[#2E2C2A]' : 'border-transparent text-[#7A7570] hover:text-[#2E2C2A] hover:border-[#2E2C2A]/30' }}">
                        Categories
                    </a>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 text-xs uppercase tracking-widest font-medium transition duration-200 {{ request()->routeIs('products.*') ? 'border-[#2E2C2A] text-[#2E2C2A]' : 'border-transparent text-[#7A7570] hover:text-[#2E2C2A] hover:border-[#2E2C2A]/30' }}">
                        Products
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-[#EFEAE2] rounded-sm text-xs uppercase tracking-widest font-medium text-[#2E2C2A] bg-[#F2EDE4] hover:bg-[#EFEAE2] focus:outline-none transition duration-200">
                            <!-- Clean Monogram Avatar -->
                            <div class="w-6 h-6 rounded-full bg-[#2E2C2A] flex items-center justify-center text-[#F9F6F0] font-bold text-[10px] mr-2 shadow-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-xs uppercase tracking-widest text-[#2E2C2A] hover:bg-[#EFEAE2]">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-xs uppercase tracking-widest text-rose-900 hover:bg-[#EFEAE2] font-semibold">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-sm text-[#7A7570] hover:text-[#2E2C2A] hover:bg-[#F2EDE4] focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#F9F6F0] border-t border-[#EFEAE2] pb-4">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 border-l-2 text-xs uppercase tracking-widest font-semibold {{ request()->routeIs('dashboard') ? 'border-[#2E2C2A] text-[#2E2C2A] bg-[#F2EDE4]' : 'border-transparent text-[#7A7570] hover:bg-[#F2EDE4] hover:text-[#2E2C2A]' }}">
                Dashboard
            </a>
            <a href="{{ route('categories.index') }}" class="block px-4 py-2 border-l-2 text-xs uppercase tracking-widest font-semibold {{ request()->routeIs('categories.*') ? 'border-[#2E2C2A] text-[#2E2C2A] bg-[#F2EDE4]' : 'border-transparent text-[#7A7570] hover:bg-[#F2EDE4] hover:text-[#2E2C2A]' }}">
                Categories
            </a>
            <a href="{{ route('products.index') }}" class="block px-4 py-2 border-l-2 text-xs uppercase tracking-widest font-semibold {{ request()->routeIs('products.*') ? 'border-[#2E2C2A] text-[#2E2C2A] bg-[#F2EDE4]' : 'border-transparent text-[#7A7570] hover:bg-[#F2EDE4] hover:text-[#2E2C2A]' }}">
                Products
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-[#EFEAE2] px-4">
            <div>
                <div class="font-serif text-base text-[#2E2C2A] font-semibold">{{ Auth::user()->name }}</div>
                <div class="text-xs text-[#7A7570] font-light">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-xs uppercase tracking-widest font-medium text-[#7A7570] hover:text-[#2E2C2A]">
                    {{ __('Profile') }}
                </a>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-xs uppercase tracking-widest font-semibold text-rose-900">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
