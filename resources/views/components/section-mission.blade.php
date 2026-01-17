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
                "L'intelligence artificielle et l'automatisation sont au cœur de notre ADN. L'objectif : créer des campagnes rentables qui font croître votre business.",
        ],
    ];

    $values = count($values) ? $values : $defaults;
@endphp

<section class="relative bg-black py-24 overflow-hidden">
    {{-- Effets de fond --}}
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#ff8c00]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#ffb845]/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 md:px-10 lg:px-12 text-center relative z-10">

        {{-- Titre principal --}}
        <h2 x-data="{ show: false }" x-intersect:enter="show=true" x-intersect:leave="show=false"
            :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-6'"
            class="text-3xl md:text-5xl font-extrabold text-white leading-tight transition-all duration-700">
            Notre mission : Rendre l'acquisition <span class="text-orange-400">prévisible pour chaque e-commerce</span>
        </h2>

        {{-- Barre de surlignage animée sous le titre --}}
        <x-animated-highlight />

        {{-- Sous-titre animé --}}
        <p x-data="{ show: false }" x-intersect:enter="show=true" x-intersect:leave="show=false"
            :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
            class="mt-6 text-lg md:text-xl text-gray-300 max-w-3xl mx-auto transition-all duration-700">
            Nous croyons qu'un bon produit + une stratégie pub solide = succès garanti. Notre mission ? Installer cette machine à ventes chez nos clients — d'abord en Afrique et en Europe, puis partout ailleurs.
        </p>

        {{-- Grille des valeurs --}}
        <div class="mt-16 grid gap-8 grid-cols-1 md:grid-cols-3">
            @foreach ($values as $index => $v)
                <div x-data="{ show: false }" x-intersect:enter="show=true" x-intersect:leave="show=false"
                    :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    style="transition-delay: {{ $index * 150 }}ms"
                    class="transition-all duration-700 ease-out group">
                    
                    <div class="relative h-full bg-[#111111]/80 backdrop-blur-xl rounded-2xl p-8 border border-gray-800 
                                hover:border-orange-400/50 transition-all duration-500 hover:shadow-lg hover:shadow-orange-500/20
                                hover:-translate-y-2 min-h-[320px] flex flex-col">
                        
                        {{-- Titre avec badge --}}
                        <div class="mb-6">
                            <h3 class="text-xl md:text-2xl font-bold text-orange-400 mb-2">
                                {{ $v['title'] }}
                            </h3>
                            <div class="w-16 h-1 bg-gradient-to-r from-orange-400 to-transparent"></div>
                        </div>

                        {{-- Description --}}
                        <p class="text-gray-300 text-base leading-relaxed flex-grow">
                            {{ $v['description'] }}
                        </p>

                        {{-- Icône décorative en bas --}}
                        <div class="mt-6 flex justify-end opacity-20 group-hover:opacity-40 transition-opacity duration-500">
                            <svg class="w-12 h-12 text-orange-400" fill="currentColor" viewBox="0 0 24 24">
                                @if($index === 0)
                                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                                @elseif($index === 1)
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                @else
                                    <path d="M20 2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM8 20H4v-4h4v4zm0-6H4v-4h4v4zm0-6H4V4h4v4zm6 12h-4v-4h4v4zm0-6h-4v-4h4v4zm0-6h-4V4h4v4zm6 12h-4v-4h4v4zm0-6h-4v-4h4v4zm0-6h-4V4h4v4z"/>
                                @endif
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- CTA Button --}}
        <div class="mt-16" x-data="{ show: false }" x-intersect:enter="show=true" x-intersect:leave="show=false"
            :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
            class="transition-all duration-700 ease-out delay-500">
            <x-button variant="primary" href="#contact">
                Découvrir comment on peut t'aider
            </x-button>
        </div>
    </div>
</section>
