<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
        @csrf

        <!-- Token do Reset -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
            <x-text-input id="email"
                          class="block mt-1 w-full border-gray-300 rounded-xl p-3
                                 focus:border-green-500 focus:ring-green-500"
                          type="email" name="email"
                          :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Nova Senha -->
        <div>
            <x-input-label for="password" :value="__('Nova Senha')" class="text-gray-700 font-semibold" />
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

        <!-- Botões -->
        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('login') }}"
               class="text-sm text-gray-600 hover:text-green-700 transition">
                {{ __('Voltar ao Login') }}
            </a>

            <x-primary-button
                class="ms-3 px-6 py-3 rounded-xl bg-green-600 text-white font-semibold shadow
                       hover:bg-green-700 focus:ring-2 focus:ring-green-400 transition">
                {{ __('Redefinir Senha') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
