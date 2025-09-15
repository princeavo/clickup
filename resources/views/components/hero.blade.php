@props([
    // Titres
    'titlePart1' => '',
    'titlePart2' => '',
    'titlePart3' => '',
    'titlePart4' => '',

    // Texte secondaire
    'subtitle' => '',

    // Bouton CTA
    'cta' => 'Réserve ton Audit Gratuit',
    'ctaLink' => '#contact',

    // Image de fond
    'background' => 'banner-home.jpg',
])
<section
    class="relative min-h-[calc(100vh-80px)] flex items-center justify-center text-center overflow-hidden bg-[#050510] pt-28 md:pt-32">

    <!-- 🌌 Background animé (Ken Burns) -->
    <div class="absolute inset-0 bg-cover bg-center scale-105 animate-kenburns"
        style="background-image: url({{ asset($background) }});">
    </div>

    <!-- 🌫️ Blur -->
    <div class="absolute inset-0 backdrop-blur-[12px]"></div>

    <!-- 📌 Contenu -->
    <div class="relative z-10 px-6 max-w-4xl animate-hero-intro">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
            {{ $titlePart1 }}
            <span class="text-orange-400">{{ $titlePart2 }}</span>
            <span class="text-white">{{ $titlePart3 }}</span>
            <span class="italic text-orange-400">{{ $titlePart4 }}</span>
        </h1>

        <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            {!! $subtitle !!}
        </p>

        <x-button :href="$ctaLink" variant="neon">
            {{ $cta }}
        </x-button>
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

    @keyframes float {

        0%,
        100% {
            transform: translateY(0) scale(1);
        }

        50% {
            transform: translateY(-20px) scale(1.05);
        }
    }

    .animate-float {
        animation: float 8s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float 10s ease-in-out infinite 2s;
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

    .btn-neon {
        background: linear-gradient(90deg, #ff9900, #ff6600);
        color: white;
        box-shadow: 0 0 20px rgba(255, 153, 0, 0.2), 0 0 40px rgba(255, 102, 0, 0.6);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-neon:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(255, 153, 0, 0.1), 0 0 20px rgba(255, 102, 0, 0.9);
    }
</style>
