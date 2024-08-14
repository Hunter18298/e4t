<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EFOURTY')</title>
    <meta name="description" content="@yield('description', 'EFourty Home Page')">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" sizes="any">
    @vite('resources/css/app.css') <!-- Include Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    @livewireStyles
    @stack('styles')
</head>

<body>
    @yield('content')
    @livewireScripts
    @vite('resources/js/app.js') <!-- Include your JS file -->
    @stack('scripts')
</body>

</html>
