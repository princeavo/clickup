<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ClickUp')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen text-white" style="background: #04131c;max-width: 100vw;overflow-x: hidden;">
    {{-- Header --}}
    @include('components.header')

    {{-- Main Content (prend tout l'espace restant) --}}
    {{-- class="flex-1 flex items-center justify-center" --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')
</body>

</html>
