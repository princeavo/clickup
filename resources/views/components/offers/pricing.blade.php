@props(['offers' => []])

<section id="pricing" class="relative py-24 bg-gradient-to-b from-[#04131c] to-[#0a1f2d] overflow-hidden">
    <!-- Effets de fond -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#ff8c00]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-[#ffb845]/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <!-- Titre -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6
                       opacity-0 translate-y-6 transition-all duration-700 ease-out"
                x-data
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                Choisis l'offre qui <span class="text-[#ffb845]">correspond à tes ambitions</span>
            </h2>
            
            <x-animated-highlight />
            
            <p class="text-lg text-gray-300 max-w-2xl mx-auto mt-8
                      opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
                x-data
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                Toutes nos offres incluent notre méthode CREA™ et un accompagnement personnalisé
            </p>
        </div>

        <!-- Grille des offres -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($offers as $index => $offer)
                <div class="relative group opacity-0 translate-y-10 transition-all duration-700"
                     style="transition-delay: {{ $index * 200 }}ms"
                     x-data
                     x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')">
                    
                    <!-- Badge Popular -->
                    @if($offer['popular'])
                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 z-10">
                            <span class="inline-block px-4 py-1 rounded-full bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-black text-sm font-bold shadow-lg">
                                ⭐ PLUS POPULAIRE
                            </span>
                        </div>
                    @endif

                    <!-- Carte -->
                    <div class="relative h-full bg-[#111111]/80 backdrop-blur-xl rounded-2xl p-8 border-2
                                {{ $offer['popular'] ? 'border-[#ff8c00] shadow-lg shadow-[#ff8c00]/20 scale-105' : 'border-gray-800' }}
                                hover:border-[#ff8c00]/50 hover:shadow-lg hover:shadow-[#ff8c00]/20 
                                transition-all duration-500 flex flex-col">
                        
                        <!-- Nom de l'offre -->
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $offer['name'] }}</h3>
                        <p class="text-sm text-gray-400 mb-6">{{ $offer['tagline'] }}</p>

                        <!-- Prix -->
                        <div class="mb-6">
                            <div class="flex items-baseline gap-2">
                                <span class="text-4xl font-extrabold text-[#ffb845]">{{ $offer['price'] }}€</span>
                                @if($offer['period'])
                                    <span class="text-gray-400">{{ $offer['period'] }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Description -->
                        <p class="text-gray-300 mb-6 leading-relaxed">{{ $offer['description'] }}</p>

                        <!-- Features -->
                        <ul class="space-y-3 mb-8 flex-grow">
                            @foreach($offer['features'] as $feature)
                                <li class="flex items-start gap-3 text-gray-300">
                                    <svg class="w-5 h-5 text-[#ffb845] mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <!-- CTA -->
                        <x-button :href="$offer['ctaLink']" 
                                  :variant="$offer['popular'] ? 'primary' : 'outline'" 
                                  class="w-full text-center">
                            {{ $offer['cta'] }}
                        </x-button>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Note -->
        <div class="mt-12 text-center opacity-0 translate-y-6 transition-all duration-700 ease-out delay-600"
             x-data
             x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
            <p class="text-gray-400">
                💡 Tous les prix sont HT. Engagement minimum de 3 mois pour garantir des résultats optimaux.
            </p>
        </div>
    </div>
</section>
