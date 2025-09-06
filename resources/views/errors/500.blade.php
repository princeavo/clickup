@extends('layouts.app')

@section('title', '500 - Erreur interne du serveur')

@section('content')
<section
    x-data="{x:0, y:0}"
    @mousemove="x = $event.clientX - (window.innerWidth/2); y = $event.clientY - (window.innerHeight/2)"
    class="relative isolate w-full text-center overflow-hidden"
>
    {{-- <!-- Glow -->
    <div class="absolute inset-0 -z-10 pointer-events-none">
        <div class="absolute -left-[25vw] top-1/2 -translate-y-1/2 w-[75vw] h-[75vw] rounded-full bg-purple-600/20 blur-[140px]"
             :style="`transform: translate(${x/-20}px, ${y/-20}px)`"></div>
        <div class="absolute -right-[25vw] top-1/2 -translate-y-1/2 w-[75vw] h-[75vw] rounded-full bg-pink-600/20 blur-[140px]"
             :style="`transform: translate(${x/20}px, ${y/20}px)`"></div>
    </div> --}}

    <div class="mx-auto max-w-4xl px-6 py-20 sm:py-28 relative">
        <h1 class="relative text-7xl md:text-9xl font-black tracking-tight bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-transparent bg-clip-text drop-shadow-lg">
            500
        </h1>
        <p class="mt-6 text-base md:text-xl text-gray-300">Oups… Une erreur interne est survenue. Nos équipes ont été notifiées.</p>

        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ url('/') }}" class="btn-3d bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-full font-medium">Retour à l’accueil</a>
            <a href="{{ url('/contact') }}" class="btn-3d bg-gradient-to-r from-red-500 to-orange-500 text-white px-6 py-3 rounded-full font-medium">Contacter le support</a>
        </div>
    </div>
</section>
@endsection
