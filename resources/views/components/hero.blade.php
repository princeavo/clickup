@props(['title', 'subtitle', 'cta'])

<section
    class="relative min-h-[calc(100vh-64px)] flex items-center justify-center text-center overflow-hidden bg-[#050510] pt-24 md:pt-32">

    <!-- 🌌 Image de fond animée (Ken Burns) -->
    <div class="absolute inset-0 bg-cover bg-center scale-105 animate-kenburns"
        style="background-image: url('https://i.ytimg.com/vi/BoCLe0AMb4U/maxresdefault.jpg');">
    </div>

    <!-- 🌫️ Blur subtil -->
    <div class="absolute inset-0 backdrop-blur-[15px]"></div>

    <!-- 🔲 Overlay dégradé sombre -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-black/80"></div>

    <!-- 🌌 Glows flottants -->
    <div class="absolute top-10 left-10 w-72 h-72 bg-fuchsia-500/20 blur-[120px] animate-float"></div>
    <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/20 blur-[140px] animate-float-delayed"></div>

    <!-- ✨ Contenu principal -->
    <div class="relative z-10 px-6 max-w-3xl animate-hero-intro">
        <h1 class="neon-title text-5xl md:text-6xl font-extrabold text-white mb-6 stagger-1">
            {{ $title }}
        </h1>
        <p class="text-lg md:text-2xl text-gray-300 mb-8 stagger-2">
            {{ $subtitle }}
        </p>
        <a href="#contact" class="btn-neon inline-block px-10 py-3 rounded-full font-bold stagger-3">
            {{ $cta }}
        </a>
    </div>

    <!-- ⬇️ Chevron scroll -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 animate-bounce-slow">
        <a href="#usp-dashboard" class="text-white text-4xl">↓</a>
    </div>
</section>

<!-- 🎨 Styles -->
<style>
    /* --- Ken Burns (zoom background) --- */
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

    /* --- Animations flottantes --- */
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

    /* --- Intro principale --- */
    @keyframes heroIntro {
        0% {
            opacity: 0;
            transform: scale(1.1) translateY(20px);
        }

        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .animate-hero-intro {
        animation: heroIntro 1.2s ease-out forwards;
    }

    /* Cascade apparition */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stagger-1 {
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    .stagger-2 {
        animation: fadeInUp 0.8s ease-out 0.8s both;
    }

    .stagger-3 {
        animation: fadeInUp 0.8s ease-out 1.2s both;
    }

    /* Chevron scroll */
    @keyframes bounceSlow {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(10px);
        }
    }

    .animate-bounce-slow {
        animation: bounceSlow 2s infinite;
    }

    /* --- Effet néon titre --- */
    .neon-title {
        text-shadow:
            0 0 5px #6d0c6d,
            0 0 10px #420c42,
            0 0 20px #380a38,
            0 0 40px #8b1d8b;
    }

    /* --- Bouton néon --- */
    .btn-neon {
        background: linear-gradient(90deg, #ff00cc, #3333ff);
        color: white;
        box-shadow: 0 0 20px rgba(121, 59, 121, 0.6),
            0 0 40px rgba(100, 100, 196, 0.6);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-neon:hover {
        box-shadow: 0 0 40px rgba(46, 7, 46, 0.9),
            0 0 60px rgba(87, 87, 134, 0.9);
        transform: scale(1.05);
    }

    .btn-neon::after {
        content: "";
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(120deg, rgba(255, 255, 255, 0.3) 0%, transparent 60%);
        transform: rotate(25deg);
        opacity: 0;
        transition: opacity 0.4s;
    }

    .btn-neon:hover::after {
        opacity: 1;
        animation: shine 1s forwards;
    }

    @keyframes shine {
        from {
            transform: translateX(-100%) rotate(25deg);
        }

        to {
            transform: translateX(100%) rotate(25deg);
        }
    }
</style>
