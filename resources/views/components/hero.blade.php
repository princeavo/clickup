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
    class="relative min-h-[calc(100vh-80px)] flex items-center justify-center text-center overflow-hidden pt-28 md:pt-32">

    <!-- 📌 Contenu -->
    <div class="relative z-10 px-6 max-w-4xl animate-hero-intro">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight">
            {{ $titlePart1 }}
            <span class="text-orange-400">{{ $titlePart2 }}</span>
            <span class="text-white">{{ $titlePart3 }}</span>
            <span class="text-orange-400 text-5xl md:text-7xl">{{ $titlePart4 }}</span>
        </h1>

        <p class="text-lg md:text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            {!! $subtitle !!}
        </p>

        <!-- 📋 Points clés animés (rotation) -->
        <div id="benefits-container" class="mb-10 max-w-4xl mx-auto relative h-20 md:h-16">
            <div class="benefit-item absolute w-full opacity-0" data-index="0">
                <p class="text-orange-400 text-xl md:text-2xl font-semibold">
                    Acquisition prévisible → <span class="text-white">sais exactement combien investir pour générer X€</span>
                </p>
            </div>
            <div class="benefit-item absolute w-full opacity-0" data-index="1">
                <p class="text-orange-400 text-xl md:text-2xl font-semibold">
                    +180% de ROAS moyen → <span class="text-white">chaque euro investi en rapporte 1,80€ minimum</span>
                </p>
            </div>
            <div class="benefit-item absolute w-full opacity-0" data-index="2">
                <p class="text-orange-400 text-xl md:text-2xl font-semibold">
                    Zéro stress → <span class="text-white">on pilote tes campagnes, tu te concentres sur ton produit</span>
                </p>
            </div>
        </div>

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

    .benefit-item {
        transition: opacity 0.8s ease-in-out, transform 0.8s ease-in-out;
        transform: scale(0.95);
        will-change: opacity, transform;
    }

    .benefit-item.active {
        opacity: 1 !important;
        transform: scale(1) !important;
    }

    .benefit-item.exit {
        opacity: 0 !important;
        transform: scale(0.95) !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const benefitItems = document.querySelectorAll('.benefit-item');
        let currentIndex = 0;
        let intervalId;

        function showBenefit(index) {
            benefitItems.forEach((item, i) => {
                if (i === index) {
                    // Petit délai pour que l'ancien disparaisse d'abord
                    setTimeout(() => {
                        item.classList.remove('exit');
                        item.classList.add('active');
                    }, 200);
                } else if (item.classList.contains('active')) {
                    item.classList.remove('active');
                    item.classList.add('exit');
                    setTimeout(() => {
                        item.classList.remove('exit');
                    }, 800);
                }
            });
        }

        function startRotation() {
            // Affiche le premier élément
            setTimeout(() => {
                showBenefit(0);
            }, 1500);

            // Rotation automatique toutes les 4 secondes
            intervalId = setInterval(() => {
                currentIndex = (currentIndex + 1) % benefitItems.length;
                showBenefit(currentIndex);
            }, 4000);
        }

        // Animation au scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (!intervalId) {
                        startRotation();
                    }
                } else {
                    // Pause la rotation quand hors de vue
                    if (intervalId) {
                        clearInterval(intervalId);
                        intervalId = null;
                    }
                }
            });
        }, {
            threshold: 0.3
        });

        const container = document.getElementById('benefits-container');
        if (container) {
            observer.observe(container);
        }
    });
</script>
