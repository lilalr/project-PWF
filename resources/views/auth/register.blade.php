<x-guest-layout>
    <!-- Header -->
    <div class="mb-8 text-center sm:text-left">
        <h2 class="text-3xl font-serif font-light text-[#2E2C2A]">Create Account</h2>
        <p class="text-xs text-[#7A7570] mt-1 font-light">Register a personal account to shop fine fragrances.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="flex flex-col">
            <label for="name" class="text-xs uppercase tracking-wider text-[#2E2C2A] font-semibold">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                   class="mt-1 block w-full bg-transparent border-b border-[#2E2C2A]/30 text-[#2E2C2A] py-2 px-1 focus:outline-none focus:border-[#2E2C2A] text-sm font-light">
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-rose-900" />
        </div>

        <!-- Email Address -->
        <div class="flex flex-col">
            <label for="email" class="text-xs uppercase tracking-wider text-[#2E2C2A] font-semibold">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                   class="mt-1 block w-full bg-transparent border-b border-[#2E2C2A]/30 text-[#2E2C2A] py-2 px-1 focus:outline-none focus:border-[#2E2C2A] text-sm font-light">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-rose-900" />
        </div>

        <!-- Password -->
        <div class="flex flex-col">
            <label for="password" class="text-xs uppercase tracking-wider text-[#2E2C2A] font-semibold">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" 
                   class="mt-1 block w-full bg-transparent border-b border-[#2E2C2A]/30 text-[#2E2C2A] py-2 px-1 focus:outline-none focus:border-[#2E2C2A] text-sm font-light">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-rose-900" />
        </div>

        <!-- Confirm Password -->
        <div class="flex flex-col">
            <label for="password_confirmation" class="text-xs uppercase tracking-wider text-[#2E2C2A] font-semibold">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                   class="mt-1 block w-full bg-transparent border-b border-[#2E2C2A]/30 text-[#2E2C2A] py-2 px-1 focus:outline-none focus:border-[#2E2C2A] text-sm font-light">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-rose-900" />
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full bg-[#2E2C2A] text-white hover:bg-[#4E4B48] py-3.5 text-xs uppercase tracking-widest font-semibold transition duration-300 shadow-sm">
                Register
            </button>
        </div>
    </form>

    <!-- Links Footer -->
    <div class="mt-8 flex flex-col space-y-2 text-center text-xs text-[#7A7570] border-t border-[#EFEAE2] pt-6">
        <a class="hover:text-[#2E2C2A] transition duration-200 font-semibold" href="{{ route('login') }}">
            Already registered? Log in here
        </a>
    </div>
</x-guest-layout>
