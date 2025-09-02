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
    <body class="font-sans antialiased bg-gradient-to-br from-green-50 via-white to-green-100 min-h-screen text-gray-800">
        <div class="min-h-screen flex flex-col">

            <!-- Navbar -->
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white/80 backdrop-blur-lg shadow-md border-b border-green-200">
                    <div class="max-w-7xl mx-auto py-6 px-6 lg:px-8 flex justify-center">
                        <h1 class="text-3xl font-extrabold text-gray-800 tracking-wide text-center">
                            {{ $header }}
                        </h1>
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                <div class="max-w-7xl mx-auto py-8 px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white/80 backdrop-blur-lg border-t border-green-200 shadow-inner">
                <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col sm:flex-row items-center justify-between text-sm text-gray-600">
                    <span>&copy; {{ date('Y') }} <span class="font-semibold text-green-600">{{ config('app.name') }}</span>. Todos os direitos reservados.</span>
                    <span class="mt-2 sm:mt-0 text-gray-500">ANÁLISE E DESENVOLVIMENTO DE SISTEMAS-6 FASE</span>
                </div>
            </footer>
        </div>
    </body>
</html>
