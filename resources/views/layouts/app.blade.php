<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Daphne') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
    @powerGridStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="bg-gray-100 container mx-auto p-4 max-w-fit">
    <div class="flex flex-row divide-y my-4 divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:p-6">
            <a href="/">
                <p>RWA® Mystery/Suspense Chapter presents:</p>
                <p>The Daphne du Maurier Award for Excellence in
                    Mystery/Suspense</p>
            </a>
        </div>
        <div class="px-4 py-5 sm:p-6">
            {{ $header }}
        </div>
        <div class="px-4 py-5 sm:p-6">
            @if(Auth::check())
                <a href="/logout" class="mybutton  float-right">Log Out</a>
            @endif
        </div>
    </div>

    <div class="container">
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</div>
@livewireScripts
@powerGridScripts

</body>
</html>
