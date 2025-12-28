@props([
    'title' => 'Pourquoi Facebook & TikTok sont deux leviers de croissance puissants en 2025',
    'subtitle' =>
        'Tes clients y passent des heures chaque jour. Ces plateformes connaissent leurs envies mieux qu\'eux-mêmes. Avec la bonne stratégie, tu peux transformer ce temps d\'écran en temps de caisse.',
    'cta' => 'Nos ressources',
    'ctaUrl' => '#',
    'resources' => [],
])

<section x-data="{ shown: false }" x-intersect="shown = true" x-intersect:leave="shown = false"
    class="relative py-24 bg-black text-white overflow-hidden">

    <!-- Effets de fond -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#ff8c00]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#ffb845]/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 text-center">

        <!-- Titre -->
        <h2 class="text-4xl md:text-6xl font-bold mb-6 transition-all duration-700"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            Pourquoi <span class="text-[#ffb845]">Facebook & TikTok</span> sont deux leviers de croissance puissants en 2025
        </h2>

        <x-animated-highlight />

        <!-- Sous-titre -->
        <p class="text-gray-300 max-w-3xl mx-auto mb-10 mt-8 text-lg md:text-xl transition-all duration-700 delay-200 leading-relaxed"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            {!! $subtitle !!}
        </p>

        <!-- CTA -->
        <div class="mb-16 transition-all duration-700 delay-400"
            x-bind:class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            <x-button :href="$ctaUrl" variant="primary">
                {{ $cta }}
            </x-button>
        </div>

        <!-- Cards avec icônes SVG -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            @php
                $svgIcons = [
                    // Facebook - Icône de réseau social
                    '<svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
                    // TikTok - Icône de vidéo/musique
                    '<svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/></svg>',
                    // Stats - Icône de graphique
                    '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>',
                ];
            @endphp

            @foreach ($resources as $index => $resource)
                <div class="relative group p-8 rounded-2xl bg-[#111111]/80 backdrop-blur-xl border border-gray-800
                           hover:border-[#ff8c00]/50 hover:shadow-lg hover:shadow-[#ff8c00]/20 
                           flex flex-col text-left transition-all duration-700 transform hover:-translate-y-2"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    style="transition-delay: {{ $index * 200 }}ms">

                    <!-- Icône SVG -->
                    <div class="w-20 h-20 mx-auto mb-6 flex items-center justify-center rounded-full 
                                bg-gradient-to-br from-[#ffb845] to-[#ff8c00] text-white shadow-lg shadow-[#ff8c00]/50
                                transform transition duration-500 group-hover:scale-110 group-hover:rotate-6">
                        {!! $svgIcons[$index] !!}
                    </div>

                    <!-- Titre -->
                    <h3 class="text-xl font-bold text-[#ffb845] mb-4 text-center group-hover:text-[#ff8c00] transition">
                        {{ $resource['title'] }}
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-300 text-center leading-relaxed">
                        {!! $resource['description'] !!}
                    </p>

                    <!-- Badge numéro -->
                    <div class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full 
                                bg-[#ff8c00]/20 text-[#ffb845] font-bold text-sm">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
