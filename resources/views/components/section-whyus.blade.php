@props(['features'])

<section x-data
    class="relative w-full py-24 px-6 md:px-12 bg-gradient-to-b from-[#0a1f2d] to-[#04131c]">
    <!-- Effets de fond -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#ff8c00]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#ffb845]/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto">
        <!-- Titre -->
        <h2 class="text-3xl md:text-5xl font-extrabold text-center mb-6
                   opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                               $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                               $el.classList.remove('opacity-100','translate-y-0')">
            Pourquoi <span class="text-orange-400">travailler avec nous ?</span>
        </h2>

        <x-animated-highlight class="mb-16" />

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($features as $index => $feature)
                @php
                    $icons = [
                        '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
                        '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                        '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
                    ];
                    $direction = match($index) {
                        0 => '-translate-x-10',
                        1 => 'translate-y-10',
                        2 => 'translate-x-10',
                        default => 'translate-y-6',
                    };
                @endphp

                <div class="group relative bg-[#111111]/80 backdrop-blur-xl rounded-2xl p-8 border border-gray-800
                            hover:border-[#ff8c00]/50 transition-all duration-700 hover:shadow-lg hover:shadow-[#ff8c00]/20
                            hover:-translate-y-2 opacity-0 {{ $direction }}"
                     style="transition-delay: {{ $index * 200 }}ms"
                     x-data
                     x-intersect:enter="$el.classList.remove('opacity-0','-translate-x-10','translate-x-10','translate-y-10');
                                        $el.classList.add('opacity-100','translate-y-0','translate-x-0')"
                     x-intersect:leave="$el.classList.add('opacity-0','{{ $direction }}');
                                        $el.classList.remove('opacity-100','translate-y-0','translate-x-0')">

                    <!-- Icône SVG -->
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full 
                                bg-gradient-to-br from-[#ffb845] to-[#ff8c00] text-white shadow-lg shadow-[#ff8c00]/50
                                transform transition duration-500 group-hover:scale-110 group-hover:rotate-6">
                        {!! $icons[$index] !!}
                    </div>

                    <!-- Titre -->
                    <h3 class="text-xl font-bold text-white mb-4 text-center group-hover:text-orange-400 transition">
                        {{ $feature['title'] }}
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-300 text-center leading-relaxed">
                        {{ $feature['description'] }}
                    </p>

                    <!-- Badge numéro -->
                    <div class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full 
                                bg-[#ff8c00]/20 text-orange-400 font-bold text-sm">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
