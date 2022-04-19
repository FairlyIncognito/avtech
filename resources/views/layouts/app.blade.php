<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Smart:Hire') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans text-sm text-gray-900 bg-gray-background">

        <header class="flex flex-col items-center justify-between px-8 py-4 md:flex-row">
            <a href="/">
                <img src="{{ asset('img/logo.png') }}" alt="smarthire logo in blue">
            </a>
            
            <x-nav-links /> <!-- Navigation links -->
            
        </header>

        <main class="container flex flex-col justify-center mx-auto max-w-custom md:flex-row">
            <div class="w-full px-2 md:w-175 md:px-0">
                <div>
                    {{ $slot }}
                </div>
            </div>
        </main>
        
        @livewireScripts
    </body>
</html>