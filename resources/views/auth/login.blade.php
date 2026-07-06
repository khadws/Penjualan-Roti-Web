<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h4 class="text-login">Login</h4>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class=" flex flex-col gap-[30px]">
            <div class="input-box">
                <label for="email" :value="__('Email')" class = 'block font-semibold text-sm text-white text-left'>Email
                </label>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <i class='bx bxs-user'></i>
            </div>

            <!-- Password -->
            <div class="input-box">
                <label for="password" :value="__('Password')" class = 'block font-semibold text-sm text-white text-left'>Password
                </label>

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        

        <!-- Remember Me -->
            <div class="container-remember">
                <label for="remember_me" class="remember">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="text">{{ __('Remember me') }}</span>  
                    <a href="{{ route('password.request') }}">
                        {{ __('Forget password?') }}
                    </a>  
                </label>
            </div>
        </div>

        <div class="container-login">
            @if (Route::has('password.request'))               
            @endif

            <button class="btn-login">
                {{ __('Log in') }}
            </button>

            <a class="link-alredy" href="{{ route('register') }}">
                {{ __('Belum punya akun?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
