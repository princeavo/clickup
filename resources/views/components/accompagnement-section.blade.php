@props([
    'title' =>
        "Arrête de perdre de l’argent <span class='text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00]'>avec des pubs qui ne vendent pas</span>",
    'subtitle' =>
        "Chez <span class='text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00] font-semibold'>ClicUp</span> : pas de jolies pubs, des machines à vendre Facebook & TikTok qui rapportent",
    'points' => ['Tu te concentres sur ton business', 'Chaque € investi rapporte', 'On gère, tu encaisses'],
    'cta' => ['text' => 'Notre Accompagnement', 'href' => '/offers'],
    'items' => [
        [
            'title' => 'Rentabilité',
            'description' => 'Chaque € investi doit rapporter. Sinon, ce n’est pas de la pub, c’est une perte.',
            'icon' => 'dollar-sign',
        ],
        [
            'title' => 'Expertise',
            'description' => '350+ campagnes lancées, des millions générés, un savoir-faire éprouvé.',
            'icon' => 'award',
        ],
        [
            'title' => 'Suivi dédié',
            'description' => 'Un account manager qui connaît ton business (pas un stagiaire multi-tâches).',
            'icon' => 'user-check',
        ],
        [
            'title' => 'Tranquillité',
            'description' => 'On gère, tu dors. Tes pubs tournent et tes ventes tombent.',
            'icon' => 'moon',
        ],
    ],
])

<section x-data="{ shown: false }" x-intersect="shown = true" x-intersect:leave="shown = false"
    class="relative py-16 md:py-20 bg-black text-white overflow-hidden bg-cover bg-center bg-no-repeat"
    style="
    background-image: url('{{ asset('images/ebooks-bg.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #0b1520;">
    <!-- Fond halo -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute -top-32 -left-32 w-[520px] h-[520px] rounded-full bg-[#ff8c00]/15 blur-3xl"></div>
        <div class="absolute -bottom-40 right-[-10%] w-[520px] h-[520px] rounded-full bg-orange-500/10 blur-3xl"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 lg:px-10">
        <!-- Haut -->
        <div class="text-center">
            <!-- Titre et sous-titre -->
            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                class="transition-all duration-700 ease-out">
                <h2 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
                    {!! $title !!}
                </h2>
                <div class="w-20 h-[3px] mt-5 mx-auto rounded-full bg-orange-400"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-2'"
                    class="transition-all duration-700 ease-out delay-200"></div>
                <p class="mt-6 text-gray-300 text-base md:text-lg leading-relaxed max-w-3xl mx-auto transition-all duration-700 delay-300"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-3'">
                    {!! $subtitle !!}
                </p>
            </div>

            <!-- Points -->
            <ul class="mt-10 flex flex-wrap justify-center gap-4 md:gap-6">
                @foreach ($points as $i => $p)
                    <li class="relative group transition-all duration-700 ease-out"
                        style="transition-delay: {{ ($i + 2) * 150 }}ms"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                        <div
                            class="rounded-2xl bg-black/40 backdrop-blur-sm border border-white/10 px-4 py-3 flex items-center gap-3 hover:border-orange-400/60 hover:scale-105 hover:shadow-lg hover:shadow-orange-400/20 transition-all duration-300">
                            <span
                                class="grid place-items-center w-6 h-6 rounded-xl
                                         bg-orange-400 text-white font-bold group-hover:rotate-12 transition-transform duration-300">✓</span>
                            <span class="text-gray-200 group-hover:text-white transition-colors">{{ $p }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Cartes Carrousel -->
        <div class="mt-12 relative" x-data="{ currentSlide: 0, totalSlides: {{ count($items) - 2 }} }">
            <!-- Conteneur des cartes -->
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-500 ease-out"
                    :style="`transform: translateX(-${currentSlide * (100 / 3)}%)`">
                    @foreach ($items as $i => $item)
                        <article
                            class="flex-shrink-0 w-full md:w-1/3 px-3 transition-all duration-700 ease-out"
                            style="transition-delay: {{ $i * 150 }}ms"
                            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-30'">
                            <div
                                class="relative group rounded-3xl p-[1px] bg-gradient-to-br from-white/10 to-white/5 h-full">
                                <div
                                    class="rounded-3xl h-full bg-[#0e1219]/80 border border-white/10 px-6 py-7 flex flex-col group-hover:border-orange-400/40 transition">
                                    <!-- Icone -->
                                    <div
                                        class="w-20 h-20 mx-auto mb-6 flex items-center justify-center rounded-full 
                                bg-orange-400 text-white shadow-lg shadow-orange-400/50
                                transform transition duration-500 group-hover:scale-110 group-hover:rotate-6">
                                        {!! safe_svg($item['icon'] ?? 'help-circle', 'w-8 h-8') !!}
                                    </div>

                                    <!-- Titre -->
                                    <h3 class="text-xl font-bold text-orange-400 text-center mb-4 group-hover:text-orange-400 transition">
                                        {{ $item['title'] }}
                                    </h3>

                                    <!-- Description -->
                                    <p class="text-gray-300 text-center leading-relaxed font-normal">
                                        {{ $item['description'] }}</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <!-- Navigation -->
            <div class="flex justify-center items-center gap-4 mt-8">
                <!-- Bouton Précédent -->
                <button @click="currentSlide = Math.max(0, currentSlide - 1)"
                    :disabled="currentSlide === 0"
                    :class="currentSlide === 0 ? 'opacity-30 cursor-not-allowed' : 'hover:scale-110'"
                    class="w-10 h-10 rounded-full bg-orange-400/20 border border-orange-400/40 flex items-center justify-center transition-all duration-300">
                    <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Indicateurs -->
                <div class="flex gap-2">
                    <template x-for="i in (totalSlides + 1)" :key="i">
                        <button @click="currentSlide = i - 1"
                            :class="currentSlide === (i - 1) ? 'bg-orange-400 w-8' : 'bg-orange-400/30 w-2'"
                            class="h-2 rounded-full transition-all duration-300"></button>
                    </template>
                </div>

                <!-- Bouton Suivant -->
                <button @click="currentSlide = Math.min(totalSlides, currentSlide + 1)"
                    :disabled="currentSlide === totalSlides"
                    :class="currentSlide === totalSlides ? 'opacity-30 cursor-not-allowed' : 'hover:scale-110'"
                    class="w-10 h-10 rounded-full bg-orange-400/20 border border-orange-400/40 flex items-center justify-center transition-all duration-300">
                    <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- CTA bas -->
        <div class="mt-10 text-center">
            <x-button :href="$cta['href'] ?? '#'" variant="primary">
                Je veux cette tranquillité
            </x-button>
        </div>
    </div>
</section>
