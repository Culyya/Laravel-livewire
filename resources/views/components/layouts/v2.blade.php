<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('atas')
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    <div class="navbar bg-success px-16">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">daisyUI</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('users2') }}">Laravel FC</a></li>
                <li><a href="{{ route('vaf.users.index') }}">Laravel VAF</a></li>
                <li><a href="{{ route('vcc.users.index') }}">Laravel VCC</a></li>
            </ul>
        </div>
    </div>
    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{ $slot }}
    </main>
</div>
@stack('bawah')
</body>
</html>
