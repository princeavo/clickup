@props(['stories' => []])

<section class="relative py-24 bg-gradient-to-b from-[#0a1f2d] to-[#04131c] text-white overflow-hidden">
    <!-- Effets de fond -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#ff8c00]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#ffb845]/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 md:px-12">
        <!-- Titre -->
        <h2 class="text-3xl md:text-5xl font-extrabold text-center mb-6 opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            <span class="text-orange-400">Success Stories</span> de nos clients
        </h2>
        
        <x-animated-highlight class="mb-16" />

        <!-- Grille de cartes -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($stories as $index => $story)
                <div x-data="{ 
                        shown: false, 
                        showPopup: false,
                        popupTimeout: null
                    }" 
                    x-intersect="shown = true" 
                    x-intersect:leave="shown = false"
                    x-bind:class="{ 'opacity-100 translate-y-0': shown, 'opacity-0 translate-y-10': !shown }"
                    style="transition-delay: {{ $index * 150 }}ms;"
                    class="group relative bg-[#111111]/80 border border-gray-800 rounded-2xl overflow-hidden
                           backdrop-blur-lg shadow-lg hover:shadow-2xl hover:border-[#ff8c00]/50
                           transition-all duration-700 ease-out
                           transform opacity-0 translate-y-10 hover:-translate-y-2">

                    <!-- Miniature avec badge -->
                    <div class="relative w-full h-56 overflow-hidden">
                        <img src="{{ $story['thumbnail'] ?? $story['image'] }}" 
                             alt="{{ $story['brand'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        
                        <!-- Overlay gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        
                        <!-- Badge objectif -->
                        <div class="absolute top-4 left-4">
                            <span class="inline-block px-3 py-1 text-xs font-bold rounded-full
                                         bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-black shadow-lg">
                                {{ $story['goal'] }}
                            </span>
                        </div>

                        <!-- Nom de la marque en bas -->
                        <div class="absolute bottom-4 left-4 right-4">
                            <h3 class="text-xl font-bold text-white drop-shadow-lg">{{ $story['brand'] }}</h3>
                        </div>
                    </div>

                    <!-- Contenu -->
                    <div class="p-6">
                        <!-- Problème -->
                        <div class="mb-4">
                            <p class="text-sm text-gray-400 mb-1">Problème :</p>
                            <p class="text-gray-200">{{ $story['problem'] }}</p>
                        </div>

                        <!-- CTA avec popup -->
                        <div class="relative">
                            <a href="{{ $story['link'] }}"
                               @mouseenter="clearTimeout(popupTimeout); popupTimeout = setTimeout(() => showPopup = true, 300)"
                               @mouseleave="popupTimeout = setTimeout(() => showPopup = false, 200)"
                               class="inline-flex items-center gap-2 text-orange-400 hover:text-[#ff8c00] font-semibold transition group/link">
                                En savoir plus
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="w-5 h-5 group-hover/link:translate-x-1 transition-transform" 
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>

                            <!-- Popup -->
                            <div x-show="showPopup"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 @mouseenter="clearTimeout(popupTimeout); showPopup = true"
                                 @mouseleave="popupTimeout = setTimeout(() => showPopup = false, 200)"
                                 class="absolute bottom-full left-0 mb-2 w-80 max-w-[calc(100vw-3rem)] z-50
                                        bg-[#1a1a1a] border border-[#ff8c00]/50 rounded-xl shadow-2xl shadow-[#ff8c00]/20 p-6"
                                 style="display: none;">
                                
                                <!-- Flèche du popup -->
                                <div class="absolute -bottom-2 left-8 w-4 h-4 bg-[#1a1a1a] border-r border-b border-[#ff8c00]/50 transform rotate-45"></div>

                                <!-- Contenu du popup -->
                                <div class="relative z-10">
                                    <!-- Titre -->
                                    <h4 class="text-lg font-bold text-orange-400 mb-3">{{ $story['brand'] }}</h4>
                                    
                                    <!-- Solution -->
                                    <div class="mb-4">
                                        <p class="text-xs text-gray-400 mb-1 font-semibold">Solution :</p>
                                        <p class="text-sm text-gray-300">{{ $story['solution'] ?? 'Stratégie personnalisée mise en place.' }}</p>
                                    </div>

                                    <!-- Résultats -->
                                    @if(isset($story['results']) && is_array($story['results']))
                                    <div class="mb-4">
                                        <p class="text-xs text-gray-400 mb-2 font-semibold">Résultats :</p>
                                        <ul class="space-y-1">
                                            @foreach($story['results'] as $result)
                                            <li class="flex items-start gap-2 text-sm text-gray-300">
                                                <svg class="w-4 h-4 text-green-400 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                </svg>
                                                <span>{{ $result }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <!-- Témoignage -->
                                    @if(isset($story['testimonial']))
                                    <div class="pt-4 border-t border-gray-700">
                                        <p class="text-sm italic text-gray-400">"{{ $story['testimonial'] }}"</p>
                                    </div>
                                    @endif

                                    <!-- Bouton -->
                                    <div class="mt-4">
                                        <a href="{{ $story['link'] }}" 
                                           class="inline-block w-full text-center px-4 py-2 rounded-lg font-semibold
                                                  bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-black
                                                  hover:scale-105 transition-transform duration-300">
                                            Voir le cas complet
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Badge numéro -->
                    <div class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-full 
                                bg-black/50 backdrop-blur-sm border border-[#ff8c00]/30 text-orange-400 font-bold text-sm">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- CTA final -->
        <div class="mt-16 text-center opacity-0 translate-y-6 transition-all duration-700 ease-out delay-500"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            <p class="text-xl text-gray-300 mb-6">
                Prêt à devenir notre prochaine success story ?
            </p>
            <x-button href="#contact" variant="primary" class="text-lg">
                Réserve ton Audit Gratuit
            </x-button>
        </div>
    </div>
</section>
