@props(['title', 'subtitle', 'buttonText', 'buttonLink', 'image'])

<section class="relative w-full min-h-screen overflow-hidden pt-24 md:pt-32 flex items-center">
    <!-- Glow background animé -->
    <div class="absolute inset-0 h-full -z-10">
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-fuchsia-500/20 blur-[120px] glow-animate"></div>
        <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-orange-500/20 blur-[120px] glow-animate"></div>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-6">
        <!-- Texte avec animation en cascade -->
        <div class="space-y-6 text-center md:text-left">
            <h1 class="stagger-1 text-3xl md:text-5xl font-extrabold leading-tight text-white drop-shadow-lg">
                {{ $title }}
            </h1>
            <p class="stagger-2 text-lg text-gray-300 leading-relaxed">
                {{ $subtitle }}
            </p>
            <a href="{{ $buttonLink }}"
               class="stagger-3 btn-3d inline-block px-6 py-3 rounded-full font-semibold text-white
                      bg-gradient-to-r from-orange-400 to-fuchsia-600 shadow-lg relative overflow-hidden group">
                <span class="relative z-10">{{ $buttonText }}</span>
            </a>
        </div>

        <!-- Image avec animation de flottement -->
        <div class="flex justify-center md:justify-end">
            <img src="{{ $image }}" alt="Accompagnement"
                 class="max-w-xs md:max-w-md rounded-2xl shadow-2xl animate-fadeInUp animate-float">
        </div>
    </div>
</section>

<!-- Styles custom -->
<style>
    /* ---- Texte cascade ---- */
    @keyframes fadeInDown {
        0% { opacity: 0; transform: translateY(-30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .stagger-1 { animation: fadeInDown 0.8s ease-out 0.2s both; }
    .stagger-2 { animation: fadeInDown 0.8s ease-out 0.4s both; }
    .stagger-3 { animation: fadeInDown 0.8s ease-out 0.6s both; }

    /* ---- Glow animé ---- */
    @keyframes floatGlow {
        0%, 100% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-20px) scale(1.05); }
    }
    .glow-animate {
        animation: floatGlow 6s ease-in-out infinite;
    }

    /* ---- Image flottante ---- */
    @keyframes floatImage {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    .animate-float {
        animation: floatImage 5s ease-in-out infinite;
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out both;
    }

    /* ---- Bouton 3D + Shine ---- */
    .btn-3d {
        transition: transform 0.2s ease;
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
        background: linear-gradient(120deg, rgba(255,255,255,0.25) 0%, transparent 60%);
        transform: rotate(25deg);
        opacity: 0;
        transition: opacity 0.4s;
    }
    .btn-3d:hover::after {
        opacity: 1;
        animation: shine 1s forwards;
    }
    @keyframes shine {
        from { transform: translateX(-100%) rotate(25deg); }
        to   { transform: translateX(100%) rotate(25deg); }
    }
</style>
