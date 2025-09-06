@extends('layouts.app')

@section('title', '404 - Page non trouvée')

@section('content')
    <section x-data="{ x: 0, y: 0 }"
        @mousemove="x = $event.clientX - (window.innerWidth/2); y = $event.clientY - (window.innerHeight/2)"
        class="relative isolate w-full min-h-full flex items-center justify-center text-center overflow-hidden">
        {{-- <!-- Arrière-plan: glows pleine largeur -->
        <div class="absolute inset-0 -z-10 pointer-events-none overflow-hidden">
            <!-- Glow gauche -->
            <div class="absolute left-0 top-0 w-[200%] h-[200%] rounded-full bg-fuchsia-500/20 blur-[180px] transition-transform duration-300 will-change-transform"
                :style="`transform: translate(${x/-30}px, ${y/-30}px)`"></div>

            <!-- Glow droit -->
            <div class="absolute right-0 bottom-0 w-[200%] h-[200%] rounded-full bg-orange-500/20 blur-[180px] transition-transform duration-300 will-change-transform"
                :style="`transform: translate(${x/30}px, ${y/30}px)`"></div>
        </div> --}}


        <!-- Contenu -->
        <div class="mx-auto max-w-4xl px-6 py-16 sm:py-24 lg:py-28 relative">
            <!-- Halo pulsant derrière -->
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-fuchsia-500/20 blur-[120px] animate-pulse">
            </div>

            <!-- Texte glitch -->
            <h1
                class="relative text-7xl md:text-9xl font-black tracking-tight bg-gradient-to-r from-fuchsia-500 via-rose-500 to-orange-400 text-transparent bg-clip-text drop-shadow-lg animate-glitch">
                404
            </h1>

            <p class="mt-6 text-base md:text-xl text-gray-300">
                Oups… La page que vous recherchez n'existe pas.
            </p>

            <!-- Boutons -->
            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ url('/') }}"
                    class="btn-3d relative inline-flex items-center justify-center px-6 py-3 rounded-full text-white text-base font-medium
                       bg-gradient-to-r from-orange-400 to-fuchsia-600 shadow-lg overflow-hidden group">
                    <span class="relative z-10">Accueil</span>
                    <span
                        class="absolute inset-0 bg-gradient-to-r from-fuchsia-600 to-orange-400 opacity-0 group-hover:opacity-100 transition duration-500"></span>
                </a>

                <a href="{{ url('/contact') }}"
                    class="btn-3d relative inline-flex items-center justify-center px-6 py-3 rounded-full text-white text-base font-medium
                       bg-gradient-to-r from-violet-600 to-indigo-500 shadow-lg overflow-hidden group">
                    <span class="relative z-10">Contactez-nous</span>
                    <span
                        class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-violet-600 opacity-0 group-hover:opacity-100 transition duration-500"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- Styles custom -->
    <style>
        /* Hover tilt 3D */
        .btn-3d {
            transition: transform 0.2s ease;
        }

        .btn-3d:hover {
            transform: perspective(600px) rotateX(5deg) rotateY(-5deg) scale(1.05);
        }
    </style>
@endsection
