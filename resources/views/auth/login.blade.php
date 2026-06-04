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
        <div class="flex flex-col">
            <label for="password" class="text-xs uppercase tracking-wider text-[#2E2C2A] font-semibold">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" 
                   class="mt-1 block w-full bg-transparent border-b border-[#2E2C2A]/30 text-[#2E2C2A] py-2 px-1 focus:outline-none focus:border-[#2E2C2A] text-sm font-light">
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
