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
    <div class="relative w-full bg-[#050510] overflow-hidden">
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
