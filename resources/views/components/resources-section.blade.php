@props([
    'title' => 'Pourquoi Facebook & TikTok sont deux leviers de croissance puissants en 2025',
    'subtitle' =>
        'Tes clients y passent des heures chaque jour. Ces plateformes connaissent leurs envies mieux qu’eux-mêmes. Avec la bonne stratégie, tu peux transformer ce temps d’écran en temps de caisse.',
    'cta' => 'Nos ressources',
    'ctaUrl' => '#',
    'resources' => [],
])

<section x-data="{ shown: false }" x-intersect="shown = true" x-intersect:leave="shown = false"
    class="relative py-20 bg-gradient-to-b from-[#04131c] to-[#0a1f2d] text-white overflow-hidden">

    <div class="max-w-6xl mx-auto px-6 text-center">

        <!-- Titre -->
        <h2 class="text-3xl md:text-4xl font-bold mb-4 transition-all duration-700"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            {!! $title !!}
        </h2>

        <!-- Ligne décorative -->
        <div class="w-20 h-1 mx-auto bg-orange-500 rounded-full mb-6 transition-all duration-700"
            :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-50'"></div>

        <!-- Sous-titre -->
        <p class="text-gray-300 max-w-2xl mx-auto mb-10 transition-all duration-700 delay-200 leading-relaxed"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            {!! $subtitle !!}
        </p>

        <!-- CTA -->
        <x-button :href="$ctaUrl" variant="primary" class="mb-16 transition-all duration-700 delay-400"
            x-bind:class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            {{ $cta }}
        </x-button>


        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            @foreach ($resources as $index => $resource)
                <div class="relative group p-8 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 shadow-lg
                           hover:shadow-[0_0_30px_rgba(255,255,255,0.2)] flex flex-col text-left
                           transition-all duration-700 transform"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    style="transition-delay: {{ $index * 200 }}ms">

                    <!-- Image + Titre -->
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-12 h-12 flex items-center justify-center rounded-xl overflow-hidden
                                   bg-gradient-to-br from-[#ffb845] to-[#ff8c00] shadow-md
                                   group-hover:scale-110 group-hover:rotate-6 transition duration-500">
                            <img src="{{ $resource['image'] }}" alt="{{ $resource['title'] }}"
                                class="w-8 h-8 object-contain" />
                        </div>

                        <h3 class="text-lg font-semibold text-[#ffb845] group-hover:text-[#ff8c00] transition">
                            {{ $resource['title'] }}
                        </h3>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-300 text-sm leading-relaxed">
                        {!! $resource['description'] !!}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
