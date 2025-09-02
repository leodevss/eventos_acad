<x-guest-layout>
    <!-- Status de sessão -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
            <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-xl p-3
                            focus:border-green-500 focus:ring-green-500"
                          type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Senha -->
        <div>
            <x-input-label for="password" :value="__('Senha')" class="text-gray-700 font-semibold" />
            <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-xl p-3
                            focus:border-green-500 focus:ring-green-500"
                          type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Lembrar -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox"
                   class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                   name="remember">
            <label for="remember_me" class="ms-2 text-sm text-gray-600">
                {{ __('Lembrar de mim') }}
            </label>
        </div>

        <!-- Ações -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-green-700 transition"
                   href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif

            <x-primary-button
                class="ms-3 px-6 py-3 rounded-xl bg-green-600 text-white font-semibold shadow
                       hover:bg-green-700 focus:ring-2 focus:ring-green-400 transition">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Link de registro -->
    <div class="mt-6 text-center">
        @if (Route::has('register'))
            <p class="text-sm text-gray-600">
                {{ __('Ainda não tem conta?') }}
                <a href="{{ route('register') }}"
                   class="font-semibold text-green-600 hover:text-green-700 transition">
                    {{ __('Registrar-se') }}
                </a>
            </p>
        @endif
    </div>
</x-guest-layout>
