<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css') <!-- Include Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>{{ $title ?? 'Page Title' }}</title>
</head>

<body class="flex">
    <x-sidebar isOpen="$isOpen" />

    <div class="flex flex-col flex-1">
        <!-- Header Component -->
        <x-header />

        <!-- Main Section -->
        <main class="p-4 flex-1">
            {{ $slot }}
        </main>
    </div>

</body>

</html>
