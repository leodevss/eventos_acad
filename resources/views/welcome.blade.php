<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gradient-to-br from-green-500 via-green-600 to-emerald-700 min-h-screen flex items-center justify-center text-white">
    <div class="text-center px-6">
        <!-- Logo -->
        <div class="mb-6">
            <x-application-logo class="w-24 h-24 mx-auto text-white" />
        </div>

        <!-- Title -->
        <h1 class="text-5xl font-extrabold tracking-wide drop-shadow-lg">
            {{ config('app.name', 'Laravel') }}
        </h1>

        <!-- Subtitle -->
        <p class="mt-4 text-lg text-green-100">
            Bem-vindo ao seu sistema acadêmico 🚀
        </p>

        <!-- Actions -->
        <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/eventos') }}"
                       class="px-6 py-3 rounded-xl bg-white text-green-700 font-semibold shadow-md hover:bg-green-50 transition">
                        Ir para Eventos
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-6 py-3 rounded-xl bg-white text-green-700 font-semibold shadow-md hover:bg-green-50 transition">
                        Entrar
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="px-6 py-3 rounded-xl bg-green-700 border border-white text-white font-semibold shadow-md hover:bg-green-800 transition">
                            Registrar
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
