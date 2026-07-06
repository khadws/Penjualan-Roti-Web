<x-guest-layout>

    <h4 class="text-register"> Register Login Page </h4>
    
    <form method="POST" action="{{ route('admin.register') }}" class="flex flex-col gap-[30px]">
        @csrf

        <!-- Name -->
        <div class="input-box">
            <label for="name" :value="__('Nama')" class = 'block font-semibold text-sm text-white text-left'>Nama
            </label>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="input-box">
            <label for="email" :value="__('Email')" class = 'block font-semibold text-sm text-white text-left'>Email
            </label>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-box">
            <label for="password" :value="__('Password')" class = 'block font-semibold text-sm text-white text-left'>Password
            </label>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="input-box">
            <label for="confirm_password" :value="__('Confirm Password')" class = 'block font-semibold text-sm text-white text-left'>Confirm Password
            </label>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="container-register">
            
            <button type="subumit" class="btn-login">
                {{ __('Daftar') }}
            </button>

            <a class="link-alredy" href="{{ route('admin.login') }}">
                {{ __('Sudah punya akun') }}
            </a>
            
        </div>
    </form>
</x-guest-layout>
