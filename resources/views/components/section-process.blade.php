@props(['intro', 'steps'])

<section class="w-full py-24 px-6 md:px-12 lg:px-20 bg-gradient-to-b from-[#0d0d0d] to-[#1a1a1a] text-gray-100 relative overflow-hidden">
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
            {!! $intro['headline'] !!}
        </h2>
        
        <x-animated-highlight />
        
        <p class="text-lg md:text-xl text-gray-300 mt-8 leading-relaxed
                  opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
            x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                                      $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                               $el.classList.remove('opacity-100','translate-y-0')">
            {{ $intro['subtext'] }}
        </p>

        @if(isset($intro['bullets']))
            <!-- Bullet points -->
            <div class="mt-10 max-w-3xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($intro['bullets'] as $i => $bullet)
                    @php
                        $bgClass = match($bullet['type']) {
                            'negative' => 'bg-red-500/10 border border-red-500/30',
                            'highlight' => 'bg-orange-400/10 border border-orange-400/30',
                            default => 'bg-green-500/10 border border-green-500/30'
                        };
                    @endphp
                    <div class="flex items-start gap-4 p-4 rounded-xl transition-all duration-500
                                {{ $bgClass }}
                                opacity-0 translate-y-6"
                         style="transition-delay: {{ ($i + 3) * 100 }}ms"
                         x-data
                         x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                                            $el.classList.add('opacity-100','translate-y-0')">
                        @if($bullet['type'] === 'negative')
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-red-500 flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <p class="text-gray-200 text-left leading-relaxed">{{ $bullet['text'] }}</p>
                        @elseif($bullet['type'] === 'highlight')
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-orange-400 flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-200 text-left leading-relaxed">{{ $bullet['text'] }}</p>
                        @else
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-500 flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-gray-200 text-left leading-relaxed">{{ $bullet['text'] }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
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

                <!-- Icône SVG -->
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 flex items-center justify-center rounded-full 
                                bg-gradient-to-br from-[#ff8c00]/20 to-[#ffb845]/20 text-orange-400
                                transition-transform duration-500 group-hover:scale-110 group-hover:rotate-6">
                        {!! $svgIcons[$i] !!}
                    </div>
                </div>

                <!-- Titre -->
                <h3 class="text-xl font-bold text-center text-white mb-4 group-hover:text-orange-400 transition">
                    {{ $step['title'] }}
                </h3>

                <!-- Contenu -->
                <p class="text-gray-300 text-center leading-relaxed">
                    {{ $step['description'] ?? $step['content'] ?? '' }}
                </p>

                <!-- Ligne de connexion (sauf pour le dernier) -->
                @if($i < count($steps) - 1)
                    <div class="hidden lg:block absolute top-1/2 -right-4 w-8 h-0.5 bg-gradient-to-r from-[#ff8c00] to-transparent"></div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- CTA en bas -->
    <div class="text-center mt-12 opacity-0 translate-y-6 transition-all duration-700 ease-out"
        x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                                 $el.classList.add('opacity-100','translate-y-0')">
        <x-button href="{{ $intro['cta']['link'] }}" variant="primary" class="text-lg px-10 py-4">
            {{ $intro['cta']['text'] }}
        </x-button>
        @if(isset($intro['cta']['subtext']))
            <p class="text-sm text-gray-400 mt-3">{{ $intro['cta']['subtext'] }}</p>
        @endif
    </div>
</section>
