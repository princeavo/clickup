@props([
    'title' =>
        "Arrête de perdre de l’argent <span class='text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00]'>avec des pubs qui ne vendent pas</span>",
    'subtitle' =>
        "Chez <span class='text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00] font-semibold'>ClicUp</span> : pas de jolies pubs, des machines à vendre Facebook & TikTok qui rapportent",
    'points' => ['Tu te concentres sur ton business', 'Chaque € investi rapporte', 'On gère, tu encaisses'],
    'cta' => ['text' => 'Notre Accompagnement', 'href' => '#'],
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
    class="relative py-16 md:py-20 bg-gradient-to-b from-[#0b0f17] via-[#0a0f16] to-black text-white overflow-hidden">
    <!-- Fond halo -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute -top-32 -left-32 w-[520px] h-[520px] rounded-full bg-[#ff8c00]/15 blur-3xl"></div>
        <div class="absolute -bottom-40 right-[-10%] w-[520px] h-[520px] rounded-full bg-orange-500/10 blur-3xl"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 lg:px-10">
        <!-- Haut -->
        <div class="grid md:grid-cols-2 gap-10 lg:gap-14 items-start">
            <!-- Col gauche -->
            <div :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                class="transition-all duration-700 ease-out">
                <h2 class="text-3xl md:text-5xl font-extrabold leading-tight tracking-tight">
                    {!! $title !!}
                </h2>
                <div class="w-20 h-[3px] mt-5 rounded-full bg-gradient-to-r from-[#ffb845] to-[#ff8c00]"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-2'"
                    class="transition-all duration-700 ease-out delay-200"></div>
                <p class="mt-6 text-gray-300 text-base md:text-lg leading-relaxed transition-all duration-700 delay-300"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-3'">
                    {!! $subtitle !!}
                </p>
            </div>

            <!-- Col droite : Points -->
            <ul class="space-y-4 md:space-y-5">
                @foreach ($points as $i => $p)
                    <li class="relative group transition-all duration-700 ease-out"
                        style="transition-delay: {{ $i * 150 }}ms"
                        :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-10'">
                        <div
                            class="rounded-2xl bg-black/40 backdrop-blur-sm border border-white/10 px-4 py-3 flex items-center gap-3 hover:border-[#ff8c00]/40 transition">
                            <span
                                class="grid place-items-center w-6 h-6 rounded-xl
                                         bg-gradient-to-br from-[#ffb845] to-[#ff8c00] text-black font-bold">✓</span>
                            <span class="text-gray-200">{{ $p }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- CTA -->
        <div class="mt-10 text-center transition-all duration-700 delay-400"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            <a href="{{ $cta['href'] ?? '#' }}"
                class="inline-flex items-center justify-center gap-2 px-7 py-3 rounded-full font-semibold
                      bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-black shadow-lg shadow-orange-500/25
                      hover:shadow-orange-500/50 hover:scale-105 active:scale-100 transition-transform">
                {{ $cta['text'] ?? 'Découvrir' }}
            </a>
        </div>

        <!-- Cartes -->
        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($items as $i => $item)
                <article
                    class="relative group rounded-3xl p-[1px] bg-gradient-to-br from-white/10 to-white/5 transition-all duration-700 ease-out"
                    style="transition-delay: {{ $i * 150 }}ms"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-30'">
                    <div
                        class="rounded-3xl h-full bg-[#0e1219]/80 border border-white/10 px-6 py-7 flex flex-col group-hover:border-[#ff8c00]/40 transition">
                        <!-- Icone + Titre -->
                        <div class="flex items-center gap-3">
                            <!-- Icone -->
                            <div
                                class="relative w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full
            bg-gradient-to-r from-orange-400 to-pink-500 shadow-lg
            transform transition duration-500 group-hover:scale-125 group-hover:rotate-6 group-hover:-translate-y-1">
                                {!! safe_svg($item['icon'] ?? 'help-circle', 'w-8 h-8') !!}
                            </div>


                            <h3
                                class="text-lg font-semibold text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00]">
                                {{ $item['title'] }}
                            </h3>
                        </div>
                        <p class="mt-4 text-gray-300 text-sm leading-relaxed">{{ $item['description'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- CTA bas -->
        <div class="mt-10 text-center">
            <a href="{{ $cta['href'] ?? '#' }}"
                class="inline-flex items-center justify-center gap-2 px-7 py-3 rounded-full font-semibold
                      bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-black shadow-lg shadow-orange-500/25
                      hover:shadow-orange-500/50 hover:scale-105 active:scale-100 transition-transform">
                {{ $cta['text'] ?? 'Notre Accompagnement' }}
            </a>
        </div>
    </div>
</section>
