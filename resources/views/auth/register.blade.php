<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Nome -->
        <div>
            <x-input-label for="name" :value="__('Nome')" class="text-gray-700 font-semibold" />
            <x-text-input id="name"
                          class="block mt-1 w-full border-gray-300 rounded-xl p-3
                                 focus:border-green-500 focus:ring-green-500"
                          type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
            <x-text-input id="email"
                          class="block mt-1 w-full border-gray-300 rounded-xl p-3
                                 focus:border-green-500 focus:ring-green-500"
                          type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Senha -->
        <div>
            <x-input-label for="password" :value="__('Senha')" class="text-gray-700 font-semibold" />
            <x-text-input id="password"
                          class="block mt-1 w-full border-gray-300 rounded-xl p-3
                                 focus:border-green-500 focus:ring-green-500"
                          type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Confirmar Senha -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" class="text-gray-700 font-semibold" />
            <x-text-input id="password_confirmation"
                          class="block mt-1 w-full border-gray-300 rounded-xl p-3
                                 focus:border-green-500 focus:ring-green-500"
                          type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <!-- Ações -->
        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-gray-600 hover:text-green-700 transition"
               href="{{ route('login') }}">
                {{ __('Já tem conta? Entrar') }}
            </a>

           <x-primary-button
    class="ms-3 px-6 py-3 rounded-xl bg-green-600 text-white font-semibold shadow
           hover:bg-green-700 focus:ring-2 focus:ring-green-400 transition"
    onclick="event.preventDefault(); this.closest('form').submit(); window.location='{{ url('/eventos') }}';">
    {{ __('Registrar-se') }}
</x-primary-button>

        </div>
    </form>
</x-guest-layout>
