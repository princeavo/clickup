@props(['offers' => [], 'creativeOffers' => []])

<section id="pricing" class="relative py-24 bg-black overflow-hidden" x-data="{ activeTab: 'pub' }">
    <!-- Effets de fond -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-orange-600/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <!-- Titre et sous-titre -->
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6
                       opacity-0 translate-y-6 transition-all duration-700 ease-out"
                x-data
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                Choisis l'offre qui <span class="text-orange-500">correspond à tes ambitions</span>
            </h2>
            
            <x-animated-highlight />
            
            <p class="text-lg text-gray-300 max-w-3xl mx-auto mt-6
                      opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
                x-data
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                Toutes nos offres incluent notre méthode CREA™ et un accompagnement personnalisé pour scaler tes ventes
            </p>
        </div>

        <!-- Onglets -->
        <div class="flex justify-center mb-12
                    opacity-0 translate-y-6 transition-all duration-700 ease-out delay-300"
             x-data
             x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
            <div class="inline-flex bg-[#111111]/80 backdrop-blur-xl rounded-xl p-2 border border-gray-800">
                <button @click="activeTab = 'pub'" 
                        class="px-8 py-3 rounded-lg font-medium transition-all duration-300"
                        :class="activeTab === 'pub' 
                                ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/30' 
                                : 'text-gray-400 hover:text-white'">
                    Offres Pub
                </button>
                <button @click="activeTab = 'creative'" 
                        class="px-8 py-3 rounded-lg font-medium transition-all duration-300"
                        :class="activeTab === 'creative' 
                                ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/30' 
                                : 'text-gray-400 hover:text-white'">
                    Offres Créatives
                </button>
            </div>
        </div>

        <!-- Grille des offres Pub - 3 colonnes -->
        <div x-show="activeTab === 'pub'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($offers as $index => $offer)
                <div class="relative group opacity-0 translate-y-10 transition-all duration-700"
                     style="transition-delay: {{ $index * 100 }}ms"
                     x-data
                     x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')">
                    
                    <!-- Carte -->
                    <div class="relative h-full bg-[#111111]/80 backdrop-blur-xl rounded-xl p-8 border-2
                                {{ isset($offer['popular']) && $offer['popular'] ? 'border-orange-500 shadow-2xl shadow-orange-500/40 scale-105' : 'border-gray-800' }}
                                hover:shadow-xl hover:border-orange-500
                                transition-all duration-300 flex flex-col">
                        
                        <!-- Badge Popular -->
                        @if(isset($offer['popular']) && $offer['popular'])
                            <div class="absolute -top-3 left-6">
                                <span class="inline-block px-3 py-1 rounded-full bg-gradient-to-r from-orange-500 to-orange-600 text-white text-xs font-bold shadow-lg">
                                    ⭐ PLUS POPULAIRE
                                </span>
                            </div>
                        @endif

                        <!-- Nom de l'offre -->
                        <h3 class="text-2xl font-bold text-white mb-2 mt-2">{{ $offer['name'] }}</h3>
                        <p class="text-sm text-gray-400 mb-6">{{ $offer['tagline'] }}</p>

                        <!-- Description -->
                        @if(isset($offer['description']))
                            <p class="text-gray-300 text-sm mb-6 leading-relaxed">{{ $offer['description'] }}</p>
                        @endif

                        <!-- Prix -->
                        <div class="mb-6">
                            @if(isset($offer['priceNote']))
                                <p class="text-sm font-bold text-orange-400 mb-2 animate-pulse">
                                    {{ $offer['priceNote'] }}
                                </p>
                            @endif
                            <div class="flex items-baseline gap-2">
                                @if(isset($offer['oldPrice']))
                                    <span class="text-xl font-bold text-gray-500 line-through">{{ $offer['oldPrice'] }}€</span>
                                @endif
                                <span class="text-5xl font-bold text-orange-500">{{ $offer['price'] }}</span>
                                @if(isset($offer['period']))
                                    <span class="text-gray-400 text-base">{{ $offer['period'] }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <button class="w-full py-3 px-4 rounded-lg font-medium text-center mb-6
                                       bg-orange-400 text-white hover:bg-orange-500
                                       transition-all duration-200">
                            {{ $offer['cta'] ?? 'Select ' . $offer['name'] }}
                        </button>

                        <!-- Features -->
                        <ul class="space-y-3 flex-grow text-sm">
                            @foreach($offer['features'] as $feature)
                                <li class="flex items-start gap-2 text-gray-300">
                                    <svg class="w-4 h-4 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Features supplémentaires (avec +) -->
                        @if(isset($offer['extraFeatures']))
                            <ul class="space-y-3 mt-4 text-sm border-t border-gray-800 pt-4">
                                @foreach($offer['extraFeatures'] as $extra)
                                    <li class="flex items-start gap-2 text-orange-400">
                                        <span class="text-orange-500 font-bold flex-shrink-0">+</span>
                                        <span>{{ $extra }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Grille des offres Créatives - 3 colonnes -->
        <div x-show="activeTab === 'creative'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach($creativeOffers as $index => $offer)
                <div class="relative group opacity-0 translate-y-10 transition-all duration-700"
                     style="transition-delay: {{ $index * 100 }}ms"
                     x-data
                     x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')">
                    
                    <!-- Carte -->
                    <div class="relative h-full bg-[#111111]/80 backdrop-blur-xl rounded-xl p-8 border-2
                                {{ isset($offer['popular']) && $offer['popular'] ? 'border-orange-500 shadow-2xl shadow-orange-500/40 scale-105' : 'border-gray-800' }}
                                hover:shadow-xl hover:border-orange-500
                                transition-all duration-300 flex flex-col">
                        
                        <!-- Badge Popular -->
                        @if(isset($offer['popular']) && $offer['popular'])
                            <div class="absolute -top-3 left-6">
                                <span class="inline-block px-3 py-1 rounded-full bg-gradient-to-r from-orange-500 to-orange-600 text-white text-xs font-bold shadow-lg">
                                    ⭐ BEST-SELLER
                                </span>
                            </div>
                        @endif

                        <!-- Nom de l'offre -->
                        <h3 class="text-2xl font-bold text-white mb-2 mt-2">{{ $offer['name'] }}</h3>
                        <p class="text-sm text-gray-400 mb-6">{{ $offer['tagline'] }}</p>

                        <!-- Description -->
                        @if(isset($offer['description']))
                            <p class="text-gray-300 text-sm mb-6 leading-relaxed">{{ $offer['description'] }}</p>
                        @endif

                        <!-- Prix -->
                        <div class="mb-6">
                            <div class="flex items-baseline gap-2">
                                @if(isset($offer['oldPrice']))
                                    <span class="text-xl font-bold text-gray-500 line-through">{{ $offer['oldPrice'] }}€</span>
                                @endif
                                <span class="text-5xl font-bold text-orange-500">{{ $offer['price'] }}</span>
                                @if(isset($offer['period']))
                                    <span class="text-gray-400 text-base">{{ $offer['period'] }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <button class="w-full py-3 px-4 rounded-lg font-medium text-center mb-6
                                       bg-orange-400 text-white hover:bg-orange-500
                                       transition-all duration-200">
                            {{ $offer['cta'] ?? 'Commander ' . $offer['name'] }}
                        </button>

                        <!-- Features -->
                        <ul class="space-y-3 flex-grow text-sm">
                            @foreach($offer['features'] as $feature)
                                <li class="flex items-start gap-2 text-gray-300">
                                    <svg class="w-4 h-4 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Features supplémentaires (avec +) -->
                        @if(isset($offer['extraFeatures']))
                            <ul class="space-y-3 mt-4 text-sm border-t border-gray-800 pt-4">
                                @foreach($offer['extraFeatures'] as $extra)
                                    <li class="flex items-start gap-2 text-orange-400">
                                        <span class="text-orange-500 font-bold flex-shrink-0">+</span>
                                        <span>{{ $extra }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- CTA Final -->
        <div class="text-center mt-16
                    opacity-0 translate-y-6 transition-all duration-700 ease-out delay-500"
             x-data
             x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
            <p class="text-gray-300 mb-6 text-lg">
                Pas sûr de quelle offre choisir ? Parlons-en ensemble.
            </p>
            <x-button href="#contact" variant="primary" class="text-lg">
                <span x-show="activeTab === 'pub'">Réserver mon audit gratuit</span>
                <span x-show="activeTab === 'creative'">Commencer avec CREA STARTER™</span>
            </x-button>
        </div>
    </div>
</section>
