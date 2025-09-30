@props(['title', 'buttonText', 'buttonLink', 'image'])

<section x-data="{ visible: false }" x-intersect:enter="visible = true" x-intersect:leave="visible = false"
    class="relative w-full min-h-screen overflow-hidden flex items-center bg-cover bg-center bg-no-repeat min-h[calc(100vh-80px)] pt-28 md:pt-32"
    style="background-image: url('{{ asset('storage/accompagnements/bg-hero.jpg') }}');">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/70 -z-10"></div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-6">
        <!-- Texte -->
        <div class="space-y-6 text-center md:text-left">
            <!-- Titre -->
            <h1 :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                class="transition-all duration-700 ease-out text-3xl md:text-5xl font-extrabold leading-tight text-white drop-shadow-lg">
                {{ $title }}
            </h1>

            <!-- Sous-titre avec CREA en couleur -->
            <p :class="visible ? 'opacity-100 translate-y-0 delay-300' : 'opacity-0 translate-y-8 delay-300'"
                class="transition-all duration-700 ease-out text-lg md:text-xl text-gray-300 leading-relaxed">
                Avec notre <span class="text-orange-400 font-semibold">méthode CREA™</span>,
                on t’aide à installer un système publicitaire rentable et prévisible sur Facebook & TikTok.
                Ton business, notre obsession.
            </p>

            <!-- Bouton -->
            <div :class="visible ? 'opacity-100 scale-100 delay-500' : 'opacity-0 scale-75 delay-500'"
                class="transition-all duration-700 ease-out">
                <a href="{{ $buttonLink }}"
                    class="btn-3d inline-block px-8 py-4 rounded-full font-semibold text-white
                          bg-gradient-to-r from-orange-400 to-orange-500 shadow-lg relative overflow-hidden group">
                    <span class="relative z-10">{{ $buttonText }}</span>
                </a>
            </div>
        </div>

        <!-- Image avec effet flottant -->
        <div :class="visible ? 'opacity-100 translate-x-0 delay-700' : 'opacity-0 translate-x-10 delay-700'"
            class="transition-all duration-700 ease-out flex justify-center md:justify-end">
            <img src="{{ $image }}" alt="Accompagnement"
                class="max-w-xs md:max-w-md rounded-2xl shadow-2xl animate-float">
        </div>
    </div>
</section>

<style>
    /* ---- Image flottante ---- */
    @keyframes floatImage {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    .animate-float {
        animation: floatImage 6s ease-in-out infinite;
    }

    /* ---- Bouton 3D + Shine ---- */
    .btn-3d {
        transition: transform 0.3s ease;
    }

    .btn-3d:hover {
        transform: perspective(600px) rotateX(5deg) rotateY(-5deg) scale(1.05);
    }

    .btn-3d::after {
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

    .btn-3d:hover::after {
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
