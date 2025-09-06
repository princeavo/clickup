@props([
  'title' => 'Nos success Stories',
  'subtitle' => 'On installe la machine à vente chez nos clients…',
  'ctaText' => 'Appel de découverte',
  'ctaLink' => '#contact'
])

<section class="relative min-h-[70vh] flex flex-col items-center justify-center text-center
               bg-gradient-to-b from-[#04131c] to-[#0a1f2d] text-white px-6 overflow-hidden">

    <!-- Arrière-plan avec halo -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute -top-40 left-1/4 w-[500px] h-[500px] bg-purple-600/30 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-[400px] h-[400px] bg-pink-500/20 rounded-full blur-3xl animate-float"></div>
    </div>

    <!-- Contenu -->
    <div class="max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-6
                   bg-gradient-to-r from-purple-400 via-pink-400 to-indigo-400 bg-clip-text text-transparent
                   animate-fade-up">
            {{ $title }}
        </h1>

        <p class="text-lg md:text-2xl text-gray-300 mb-10 animate-fade-up delay-200">
            {{ $subtitle }}
        </p>

        <a href="{{ $ctaLink }}"
           class="inline-block px-8 py-3 rounded-full font-semibold border border-purple-400
                  text-white hover:bg-purple-600 hover:border-purple-600
                  shadow-lg hover:shadow-purple-500/30 transition-all duration-500
                  animate-fade-up delay-100">
            {{ $ctaText }}
        </a>
    </div>
</section>

<!-- Styles / animations -->
<style>
@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(20px) scale(0.95); }
    100% { opacity: 1; transform: translateY(0) scale(1); }
}
.animate-fade-up {
    animation: fadeUp 1s ease-out forwards;
}
.animate-fade-up.delay-200 { animation-delay: .2s; }
.animate-fade-up.delay-500 { animation-delay: .5s; }

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}
.animate-float {
    animation: float 8s ease-in-out infinite;
}
</style>
