<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <title>@yield('title', 'ClickUp')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen text-white bg-black max-w-[100vw] overflow-x-hidden">

    <!-- Bloc Header + Hero (background commun) -->
    <div class="fixed inset-0 z-0" style="background-image: url('{{ asset('banner-home.jpg') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>
    <div class="relative z-10">
        @include('components.header')
        @yield('hero')
    </div>

    <!-- Contenu principal -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

</body>

</html>
