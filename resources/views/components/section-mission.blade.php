@props([
    'values' => [],
])

@php
    $defaults = [
        [
            'title' => 'Performance & stratégie',
            'description' =>
                'Spécialistes pub qui maximisent ta visibilité, ton ROI et tes conversions. Une seule obsession : tes résultats.',
        ],
        [
            'title' => 'Satisfaction Client',
            'description' => 'Tes besoins au centre, tes attentes dépassées. On livre plus que prévu.',
        ],
        [
            'title' => 'Innovation & IA',
            'description' =>
                "L’intelligence artificielle et l’automatisation sont au cœur de notre ADN. L'objectif : créer des campagnes rentables qui font croître votre business.",
        ],
    ];

    $values = count($values) ? $values : $defaults;
@endphp

<section class="relative bg-cover bg-center bg-no-repeat py-24 overflow-hidden"
    style="
    background-image: url('{{ asset('images/mission-bg.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #0b1520;">
    {{-- Overlay pour améliorer le contraste --}}
    <div class="absolute inset-0 bg-black/10"></div>

    <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-12 text-center relative z-10">

        {{-- Titre principal --}}
        <h2 x-data="{ show: false }" x-intersect:enter="show=true" x-intersect:leave="show=false"
            :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-6'"
            class="text-3xl md:text-4xl font-extrabold text-white leading-tight transition-all duration-700">
            Chaque marque mérite <span class="text-orange-400"> d’avoir une vraie d'avoir une vraie machine à vendre
            </span> derrière son produit
        </h2>

        {{-- Barre de surlignage animée sous le titre --}}
        <x-animated-highlight />

        {{-- Sous-titre animé --}}
        <p x-data="{ show: false }" x-intersect:enter="show=true" x-intersect:leave="show=false"
            :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
            class="mt-6 text-lg md:text-xl text-gray-200 max-w-3xl mx-auto transition-all duration-700">
            Notre mission est de rendre cela possible, d'abord pour nos clients en Afrique et en Europe, puis dans le
            monde entier.
        </p>

        {{-- Grille des valeurs --}}
        <div class="mt-16 grid gap-10 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($values as $index => $v)
                @php
                    $dir = $index % 3 === 0 ? '-translate-x-6' : ($index % 3 === 1 ? 'translate-y-6' : 'translate-x-6');
                @endphp

                <div x-data="{ show: false }" x-intersect:enter="show=true" x-intersect:leave="show=false"
                    :class="show ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 scale-95 {{ $dir }}'"
                    class="transition-all duration-700 ease-out flex flex-col items-center">
                    {{-- Pill titre --}}
                    <div class="mb-6 inline-flex items-center justify-center px-6 py-3 rounded-full border  border-orange bg-black/50 cursor-pointer   backdrop-blur-sm text-orange-400 font-semibold text-lg transition-transform duration-500"
                        :class="show ? 'translate-y-0 opacity-100' : 'translate-y-3 opacity-70'">
                        {{ $v['title'] }}
                    </div>

                    {{-- Bloc descriptif centré verticalement --}}
                    <div
                        class="rounded-2xl border border-gray-700 p-8 min-h-[220px] w-full bg-black/30 backdrop-blur-sm flex flex-col justify-center text-center">
                        <p class="text-gray-200 text-base leading-relaxed">
                            {{ $v['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
