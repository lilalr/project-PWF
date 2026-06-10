<x-guest-layout>
    <!-- Header -->
    <div class="mb-8 text-center sm:text-left">
        <h2 class="text-3xl font-serif font-light text-[#2E2C2A]">Log In</h2>
        <p class="text-xs text-[#7A7570] mt-1 font-light">Access your Liora Fragrance account.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6 text-sm text-[#2E2C2A] bg-[#EFEAE2] p-3 border border-[#EFEAE2] font-light" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="flex flex-col">
            <label for="email" class="text-xs uppercase tracking-wider text-[#2E2C2A] font-semibold">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                   class="mt-1 block w-full bg-transparent border-b border-[#2E2C2A]/30 text-[#2E2C2A] py-2 px-1 focus:outline-none focus:border-[#2E2C2A] text-sm font-light">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-rose-900" />
        </div>

        <!-- Password -->
        <div class="flex flex-col" x-data="{ show: false }">
            <label for="password" class="text-xs uppercase tracking-wider text-[#2E2C2A] font-semibold">Password</label>
            <div class="relative w-full">
                <input id="password" :type="show ? 'text' : 'password'" name="password" required autocomplete="current-password" 
                       class="mt-1 block w-full bg-transparent border-b border-[#2E2C2A]/30 text-[#2E2C2A] py-2 pr-10 pl-1 focus:outline-none focus:border-[#2E2C2A] text-sm font-light">
                <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-1 flex items-center text-[#7A7570] hover:text-[#2E2C2A] transition duration-200">
                    <!-- Eye Open (shown when password is text) -->
                    <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <!-- Eye Slashed (shown when password is hidden) -->
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-rose-900" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" 
                   class="rounded-sm border-[#2E2C2A]/30 text-[#2E2C2A] focus:ring-0 focus:ring-offset-0 bg-transparent">
            <label for="remember_me" class="ms-2 text-xs text-[#7A7570] font-light">Remember me</label>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-[#2E2C2A] text-white hover:bg-[#4E4B48] py-3.5 text-xs uppercase tracking-widest font-semibold transition duration-300 shadow-sm">
                Log in
            </button>
        </div>
    </form>

    <!-- Links Footer -->
    <div class="mt-8 flex flex-col space-y-2 text-center text-xs text-[#7A7570] border-t border-[#EFEAE2] pt-6">
        @if (Route::has('password.request'))
            <a class="hover:text-[#2E2C2A] transition duration-200 font-light" href="{{ route('password.request') }}">
                Forgot your password?
            </a>
        @endif

        @if (Route::has('register'))
            <a class="hover:text-[#2E2C2A] transition duration-200 font-semibold" href="{{ route('register') }}">
                Don't have an account? Register here
            </a>
        @endif
    </div>
</x-guest-layout>
