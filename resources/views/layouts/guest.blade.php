<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-green-500 via-green-600 to-emerald-700 min-h-screen flex items-center justify-center">
        <div class="flex flex-col items-center">
            <!-- Logo -->
            <div class="mb-6 transform hover:scale-105 transition duration-300">
                <a href="/">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-20 h-20">
                </a>
            </div>

            <!-- Card -->
            <div class="w-full sm:max-w-md bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl p-8">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
 