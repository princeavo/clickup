@extends('layouts.app')

@section('title', '419 - Session expirée')

@section('content')
<section
    x-data="{x:0, y:0}"
    @mousemove="x = $event.clientX - (window.innerWidth/2); y = $event.clientY - (window.innerHeight/2)"
    class="relative isolate w-full text-center overflow-hidden"
>
    {{-- <!-- Glow -->
    <div class="absolute inset-0 -z-10 pointer-events-none">
        <div class="absolute -left-[25vw] top-1/2 -translate-y-1/2 w-[70vw] h-[70vw] rounded-full bg-yellow-400/20 blur-[140px]"
             :style="`transform: translate(${x/-25}px, ${y/-25}px)`"></div>
        <div class="absolute -right-[25vw] top-1/2 -translate-y-1/2 w-[70vw] h-[70vw] rounded-full bg-orange-500/20 blur-[140px]"
             :style="`transform: translate(${x/25}px, ${y/25}px)`"></div>
    </div> --}}

    <div class="mx-auto max-w-4xl px-6 py-20 sm:py-28 relative">
        <h1 class="relative text-7xl md:text-9xl font-black tracking-tight bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 text-transparent bg-clip-text drop-shadow-lg">
            419
        </h1>
        <p class="mt-6 text-base md:text-xl text-gray-300">Votre session a expiré. Veuillez actualiser la page ou vous reconnecter.</p>

        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ url('/') }}" class="btn-3d bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-6 py-3 rounded-full font-medium">Retour à l’accueil</a>
            <a href="{{ url('/login') }}" class="btn-3d bg-gradient-to-r from-orange-500 to-red-500 text-white px-6 py-3 rounded-full font-medium">Se reconnecter</a>
        </div>
    </div>
</section>
@endsection
