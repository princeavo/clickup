@props(['leadMagnets' => []])

<section class="relative py-24 bg-gradient-to-b from-[#0a1f2d] to-[#04131c] overflow-hidden">
    <!-- Effets de fond -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#ff8c00]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#ffb845]/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <!-- Titre -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6
                       opacity-0 translate-y-6 transition-all duration-700 ease-out"
                x-data
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                <span class="text-[#ffb845]">Ressources gratuites</span> pour booster tes campagnes
            </h2>
            
            <x-animated-highlight />
            
            <p class="text-lg text-gray-300 max-w-2xl mx-auto mt-8
                      opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
                x-data
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                Télécharge nos guides, templates et outils pour améliorer tes performances publicitaires
            </p>
        </div>

        <!-- Grille des lead magnets -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($leadMagnets as $index => $magnet)
                <div class="group relative bg-[#111111]/80 backdrop-blur-xl rounded-2xl overflow-hidden border border-gray-800
                            hover:border-[#ff8c00]/50 hover:shadow-lg hover:shadow-[#ff8c00]/20 
                            transition-all duration-500 hover:-translate-y-2
                            opacity-0 translate-y-10"
                     style="transition-delay: {{ $index * 150 }}ms"
                     x-data
                     x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')">
                    
                    <!-- Image -->
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $magnet['image'] }}" 
                             alt="{{ $magnet['title'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        
                        <!-- Badge type -->
                        <div class="absolute top-4 right-4">
                            <span class="inline-block px-3 py-1 rounded-full bg-[#ff8c00]/90 text-white text-xs font-bold">
                                {{ $magnet['type'] }}
                            </span>
                        </div>

                        <!-- Pages -->
                        <div class="absolute bottom-4 left-4">
                            <span class="inline-block px-3 py-1 rounded-full bg-black/50 backdrop-blur-sm text-white text-xs font-semibold">
                                {{ $magnet['pages'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Contenu -->
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-[#ffb845] transition">
                            {{ $magnet['title'] }}
                        </h3>
                        <p class="text-sm text-gray-400 mb-4 leading-relaxed">
                            {{ $magnet['description'] }}
                        </p>

                        <!-- Bouton téléchargement -->
                        <a href="{{ $magnet['downloadLink'] }}" 
                           class="inline-flex items-center gap-2 text-[#ffb845] hover:text-[#ff8c00] font-semibold text-sm transition group/link">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Télécharger gratuitement
                            <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
