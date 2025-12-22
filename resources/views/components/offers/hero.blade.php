@props([
    'title' => 'Nos Offres',
    'subtitle' => '',
    'cta' => 'Réserve ton audit gratuit',
    'ctaLink' => '#contact',
])

<section class="relative min-h-[calc(100vh-80px)] flex items-center justify-center text-center overflow-hidden bg-[#050510] pt-28 md:pt-32">

    <!-- 🌌 Background animé (Ken Burns) -->
    <div class="absolute inset-0 bg-cover bg-center scale-105 animate-kenburns"
        style="background-image: url({{ asset('banner-home.jpg') }});">
    </div>

    <!-- 🌫️ Blur -->
    <div class="absolute inset-0 backdrop-blur-[12px]"></div>

    <!-- Overlay sombre -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- Effets de glow orange -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-[#ff8c00]/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-[#ffb845]/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    </div>

    <!-- 📌 Contenu -->
    <div class="relative z-10 px-6 max-w-5xl mx-auto animate-hero-intro">
        <!-- Badge -->
        <div class="mb-6 opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
            <span class="inline-flex items-center gap-2 rounded-full border border-[#ffb845]/30 bg-[#ffb845]/10 px-4 py-2 text-sm font-semibold text-[#ffb845] backdrop-blur-sm">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                Solutions sur-mesure pour e-commerce
            </span>
        </div>

        <!-- Titre -->
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight
                   opacity-0 translate-y-6 transition-all duration-700 ease-out delay-100"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
            Transforme ton budget pub en
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00]">
                machine à vendre
            </span>
        </h1>

        <!-- Sous-titre -->
        <p class="text-lg md:text-xl lg:text-2xl text-gray-300 mb-10 max-w-3xl mx-auto leading-relaxed
                  opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
            {{ $subtitle }}
        </p>

        <!-- CTA -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4
                    opacity-0 translate-y-6 transition-all duration-700 ease-out delay-300"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
            <x-button :href="$ctaLink" variant="primary" class="text-lg px-10 py-4">
                {{ $cta }}
            </x-button>
            <a href="#pricing" class="inline-flex items-center gap-2 text-white hover:text-[#ffb845] font-semibold transition">
                Voir les offres
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>

        <!-- Stats rapides -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto
                    opacity-0 translate-y-6 transition-all duration-700 ease-out delay-400"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-extrabold text-[#ffb845] mb-2">100+</div>
                <div class="text-sm text-gray-400">Clients accompagnés</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-extrabold text-[#ffb845] mb-2">24M€</div>
                <div class="text-sm text-gray-400">CA généré</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-extrabold text-[#ffb845] mb-2">92%</div>
                <div class="text-sm text-gray-400">Satisfaction</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-extrabold text-[#ffb845] mb-2">300K€</div>
                <div class="text-sm text-gray-400">Budget mensuel</div>
            </div>
        </div>
    </div>

    <!-- Flèche scroll -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <a href="#pricing" class="text-white/50 hover:text-[#ffb845] transition">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </a>
    </div>
</section>

<!-- 🎨 Animations -->
<style>
    @keyframes kenburns {
        0% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1.15);
        }
    }

    .animate-kenburns {
        animation: kenburns 20s ease-in-out infinite alternate;
    }

    @keyframes heroIntro {
        0% {
            opacity: 0;
            transform: scale(1.05) translateY(20px);
        }

        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .animate-hero-intro {
        animation: heroIntro 1.2s ease-out forwards;
    }
</style>
