@props([
    'title' => "La méthode CREA™ : des publicités qui frappent, déclenchent l’émotion et transforment l’intérêt en résultats.",
    'cta' => "Découvrir la méthode CREA™",
    'background' => null,
    'backgroundImage' => '/images/grillage.png', {{-- Vérifie que ton fichier est bien dans /public/images --}}
])

<section
    class="relative min-h-[90vh] flex items-center px-6 md:px-16 overflow-hidden bg-black text-white"
    style="background-image: url('{{ Storage::disk('public')->url($backgroundImage) }}');background-repeat: no-repeat;background-size:cover;"

    {{-- style="background: {{ $background ?? 'linear-gradient(135deg, #0a0a0a, #1a1a1a)' }};" --}}
    >

    <!-- Image de fond type "grillage" -->
    {{-- <div class="absolute inset-0 bg-center bg-cover opacity-30 mix-blend-overlay"
         style="background-image: url('{{ Storage::disk('public')->url($backgroundImage) }}')">
    </div> --}}

    <!-- Dégradés animés -->
    <div class="absolute inset-0 pointer-events-none opacity-50">
        <div class="absolute w-[900px] h-[900px] bg-gradient-to-r from-purple-700/40 to-pink-600/30 rounded-full blur-3xl -top-40 -left-40 animate-pulse"></div>
        <div class="absolute w-[700px] h-[700px] bg-gradient-to-r from-indigo-600/40 to-purple-500/30 rounded-full blur-3xl bottom-0 right-0 animate-pulse"></div>
    </div>

    <!-- Contenu -->
    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between w-full gap-8">

        <!-- Texte responsive -->
        <h2 class="font-extrabold uppercase leading-tight w-full md:w-2/3 text-center md:text-left"
            style="font-size: clamp(2rem, 5vw, 4.5rem);">
            {!! $title !!}
        </h2>

        <!-- Bouton -->
        <a href="#crea"
           class="inline-flex items-center justify-center px-10 py-4 text-base md:text-lg font-bold uppercase tracking-wide
                  bg-white text-black rounded-full shadow-lg
                  hover:bg-black hover:text-white hover:border-white border-2 border-black
                  transition-all duration-300 ease-in-out">
            {{ $cta }}
        </a>
    </div>
</section>

