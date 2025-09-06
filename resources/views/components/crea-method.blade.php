@props([
    'title' => "La méthode CREA™ : des publicités qui frappent, déclenchent l’émotion et transforment l’intérêt en résultats.",
    'cta' => "Découvrir la méthode CREA™",
    'background' => null,
    'backgroundImage' => '/images/grillage.png',
])

<section
    x-data="{ shown: false }"
    x-intersect="shown = true"
    class="relative min-h-[90vh] flex items-center px-6 md:px-16 overflow-hidden bg-black text-white"
    style="background-image: url('{{ Storage::disk('public')->url($backgroundImage) }}'); background-repeat: no-repeat; background-size: cover;">

    <!-- Dégradés animés -->
    <div class="absolute inset-0 pointer-events-none opacity-50">
        <div class="absolute w-[900px] h-[900px] bg-gradient-to-r from-purple-700/40 to-pink-600/30 rounded-full blur-3xl -top-40 -left-40 animate-float-slow"></div>
        <div class="absolute w-[700px] h-[700px] bg-gradient-to-r from-indigo-600/40 to-purple-500/30 rounded-full blur-3xl bottom-0 right-0 animate-float-slower"></div>
    </div>

    <!-- Contenu -->
    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between w-full gap-8">

        <!-- Texte -->
        <h2 class="font-extrabold uppercase leading-tight w-full md:w-2/3 text-center md:text-left transition-all duration-1000"
            style="font-size: clamp(2rem, 5vw, 4.5rem);"
            :class="shown ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-10 scale-105'">
            {!! $title !!}
        </h2>

        <!-- Bouton CTA -->
        <a href="#crea"
           class="relative inline-flex items-center justify-center px-10 py-4 text-base md:text-lg font-bold uppercase tracking-wide
                  rounded-full border-2 transition-all duration-500 ease-out
                  bg-white text-black border-black
                  hover:bg-black hover:text-white hover:border-white
                  overflow-hidden shadow-lg"
           :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
           style="transition-delay: 400ms;">

            <span class="relative z-10">{{ $cta }}</span>

            <!-- Effet shine -->
            <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-in-out"></span>
        </a>
    </div>
</section>

<!-- Animations custom -->
<style>
@keyframes floatSlow {
    0%, 100% { transform: translateY(0) translateX(0); }
    50% { transform: translateY(-20px) translateX(10px); }
}
@keyframes floatSlower {
    0%, 100% { transform: translateY(0) translateX(0); }
    50% { transform: translateY(15px) translateX(-15px); }
}
.animate-float-slow { animation: floatSlow 12s ease-in-out infinite; }
.animate-float-slower { animation: floatSlower 18s ease-in-out infinite; }
</style>
