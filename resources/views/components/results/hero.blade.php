@props([
    'subtitle' => 'On installe la machine à vente chez nos clients…',
    'ctaText' => 'Appel de découverte',
    'ctaLink' => '#contact',
])
<section
    x-data="{ visible: false, scrollPosition: 0 }"
    x-intersect:enter="visible = true"
    x-intersect:leave="visible = false"
    @scroll.window="scrollPosition = window.scrollY"
    class="relative min-h-[calc(100vh-80px)] flex flex-col items-center justify-center text-center px-6 overflow-hidden transition-all duration-500 ease-out"
    style="background-image: url({{ asset('images/results-hero-bg.png') }}); background-size: cover; background-position: center;"
>
    <!-- Overlay sombre -->
    <div class="absolute inset-0 bg-black/60 -z-10"></div>

    <!-- Halo lumineux avec effet de défilement parallax -->
    <div
        :style="`top: ${scrollPosition * 0.2}px`"
        class="absolute -top-32 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-orange-500/20 rounded-full blur-3xl animate-pulse -z-10">
    </div>

    <!-- Ronds lumineux avec animation d'apparition et de translation -->
    <div
        :class="visible
            ? 'opacity-100 scale-100 translate-y-0'
            : 'opacity-0 scale-50 translate-y-6'"
        class="flex space-x-4 mb-6 transition-all duration-700 ease-out transform"
    >
        @for ($i = 0; $i < 5; $i++)
            <div class="w-4 h-4 rounded-full bg-orange-400 shadow-[0_0_15px_rgba(255,165,0,0.7)]"></div>
        @endfor
    </div>

    <div class="max-w-3xl mx-auto">
        <!-- Titre / sous-titre avec animation au scroll -->
        <div
            :class="visible
                ? 'opacity-100 translate-y-0 delay-300'
                : 'opacity-0 translate-y-6 delay-300'"
            class="transition-all duration-700 ease-out"
        >
            <h2 class="text-4xl md:text-6xl font-extrabold tracking-tight text-white mb-3">
                Nos <span class="text-orange-400">success stories</span>
            </h2>

            <div class="w-24 h-1 bg-orange-400 mx-auto mb-6"></div>

            <p class="text-lg md:text-xl text-gray-200 mb-10">
                {{ $subtitle }}
            </p>
        </div>

        <!-- Bouton CTA avec animation de fondu et scale au scroll -->
        <div
            :class="visible
                ? 'opacity-100 scale-100 delay-700'
                : 'opacity-0 scale-75 delay-700'"
            class="transition-all duration-700 ease-out"
        >
            <a href="{{ $ctaLink }}"
                class="inline-block px-8 py-3 rounded-md font-semibold text-black bg-gradient-to-b from-orange-300 to-orange-500
                       hover:scale-110 transform transition-all duration-300 shadow-lg shadow-orange-500/20"
            >
                {{ $ctaText }}
            </a>
        </div>
    </div>
</section>
