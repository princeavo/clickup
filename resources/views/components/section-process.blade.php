@props(['intro', 'steps'])

<section class="w-full py-24 px-6 md:px-12 lg:px-20 bg-gradient-to-b from-[#04131c] to-[#0a1f2d] text-gray-100 relative overflow-hidden">
    <!-- Effets de fond -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#ff8c00]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-[#ffb845]/10 rounded-full blur-3xl"></div>
    </div>

    <!-- Intro -->
    <div class="text-center max-w-4xl mx-auto mb-16">
        <h2 class="text-3xl md:text-5xl font-extrabold text-white leading-snug mb-6
                   opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                                      $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                               $el.classList.remove('opacity-100','translate-y-0')">
            En 2025, <span class="text-[#ffb845]">la publicité n'est plus une option</span>, c'est ta survie.
        </h2>
        
        <x-animated-highlight />
        
        <p class="text-lg md:text-xl text-gray-300 mt-8 leading-relaxed
                  opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
            x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                                      $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                               $el.classList.remove('opacity-100','translate-y-0')">
            {{ $intro['subtitle'] }}
        </p>
        
        <div class="mt-8 opacity-0 translate-y-6 transition-all duration-700 ease-out delay-300"
            x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                                     $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                              $el.classList.remove('opacity-100','translate-y-0')">
            <x-button href="#contact" variant="primary" class="text-lg">
                {{ $intro['cta'] }}
            </x-button>
        </div>
    </div>

    <!-- Steps avec icônes SVG -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
        @php
            $svgIcons = [
                '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>',
                '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>',
                '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
                '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>',
            ];
        @endphp

        @foreach($steps as $i => $step)
            <div class="opacity-0 translate-y-10 relative bg-[#111111]/80 backdrop-blur-xl rounded-2xl p-8 
                        shadow-lg border border-gray-800 
                        transition-all duration-700 hover:scale-105 hover:border-[#ff8c00]/50 
                        hover:shadow-[#ff8c00]/20 group"
                 x-data
                 x-intersect:enter="$el.style.transitionDelay='{{ $i * 200 }}ms';
                                    $el.classList.remove('opacity-0','translate-y-10');
                                    $el.classList.add('opacity-100','translate-y-0')"
                 x-intersect:leave="$el.classList.add('opacity-0','translate-y-10');
                                    $el.classList.remove('opacity-100','translate-y-0')">

                <!-- Numéro -->
                <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 w-12 h-12 
                            flex items-center justify-center rounded-full 
                            bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-black font-bold text-lg 
                            shadow-lg shadow-[#ff8c00]/50">
                    {{ $step['number'] }}
                </div>

                <!-- Icône SVG -->
                <div class="flex justify-center mb-6 mt-6">
                    <div class="w-20 h-20 flex items-center justify-center rounded-full 
                                bg-gradient-to-br from-[#ff8c00]/20 to-[#ffb845]/20 text-[#ffb845]
                                transition-transform duration-500 group-hover:scale-110 group-hover:rotate-6">
                        {!! $svgIcons[$i] !!}
                    </div>
                </div>

                <!-- Titre -->
                <h3 class="text-xl font-bold text-center text-white mb-4 group-hover:text-[#ffb845] transition">
                    {{ $step['title'] }}
                </h3>

                <!-- Contenu -->
                <p class="text-gray-300 text-center leading-relaxed">
                    {{ $step['content'] }}
                </p>

                <!-- Ligne de connexion (sauf pour le dernier) -->
                @if($i < count($steps) - 1)
                    <div class="hidden lg:block absolute top-1/2 -right-4 w-8 h-0.5 bg-gradient-to-r from-[#ff8c00] to-transparent"></div>
                @endif
            </div>
        @endforeach
    </div>
</section>
