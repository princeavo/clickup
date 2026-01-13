<section class="relative bg-neutral-800 py-24 overflow-hidden">
    <!-- Effets de fond -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#ff8c00]/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#ffb845]/10 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 md:px-10 lg:px-12">

        {{-- Titre principal --}}
        <h2 class="text-center text-3xl md:text-5xl font-extrabold text-white mb-6 opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            <span class="text-orange-400">Pourquoi</span> nous avons créé ClickUp
        </h2>

        <x-animated-highlight />

        {{-- Sous-titre --}}
        <p class="text-center text-lg md:text-xl text-gray-300 max-w-3xl mx-auto mb-16 opacity-0 translate-y-6 transition-all duration-700 ease-out delay-150"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            Le constat était brutal : trop d'agences vendent du rêve à prix d'or, mais livrent des résultats décevants.
            <span class="text-orange-400 font-semibold">ClickUp naît d'une conviction simple : apporter de la performance réelle.</span>
        </p>

        {{-- 3 Divisions horizontales --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            
            {{-- Division 1 : Le Problème --}}
            <div class="relative group opacity-0 translate-y-10 transition-all duration-700 ease-out"
                style="transition-delay: 200ms"
                x-data
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')"
                x-intersect:leave="$el.classList.add('opacity-0','translate-y-10'); $el.classList.remove('opacity-100','translate-y-0')">
                
                <div class="relative h-full bg-[#111111]/80 backdrop-blur-xl rounded-2xl p-8 border border-gray-800 
                            hover:border-[#ff8c00]/50 transition-all duration-500 hover:shadow-lg hover:shadow-[#ff8c00]/20
                            hover:-translate-y-2">
                    
                    {{-- Icône --}}
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full 
                                bg-gradient-to-br from-red-500 to-red-600 shadow-lg
                                transform transition duration-500 group-hover:scale-110 group-hover:rotate-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>

                    {{-- Numéro --}}
                    <div class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-full 
                                bg-red-500/20 text-red-400 font-bold text-lg">
                        01
                    </div>

                    {{-- Titre --}}
                    <h3 class="text-2xl font-bold text-white mb-4 text-center">
                        Le Problème
                    </h3>

                    {{-- Description --}}
                    <p class="text-gray-300 text-center leading-relaxed">
                        Des agences qui promettent la lune mais livrent des campagnes médiocres. 
                        Résultat ? Budget gaspillé, temps perdu, et zéro retour sur investissement.
                    </p>

                    {{-- Badge --}}
                    <div class="mt-6 text-center">
                        <span class="inline-block px-4 py-2 rounded-full bg-red-500/10 text-red-400 text-sm font-semibold">
                            ❌ Trop de promesses vides
                        </span>
                    </div>
                </div>
            </div>

            {{-- Division 2 : Notre Solution --}}
            <div class="relative group opacity-0 translate-y-10 transition-all duration-700 ease-out"
                style="transition-delay: 400ms"
                x-data
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')"
                x-intersect:leave="$el.classList.add('opacity-0','translate-y-10'); $el.classList.remove('opacity-100','translate-y-0')">
                
                <div class="relative h-full bg-[#111111]/80 backdrop-blur-xl rounded-2xl p-8 border border-[#ff8c00]/50 
                            hover:border-[#ffb845] transition-all duration-500 hover:shadow-lg hover:shadow-[#ff8c00]/30
                            hover:-translate-y-2 ring-2 ring-[#ff8c00]/20">
                    
                    {{-- Icône --}}
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full 
                                bg-gradient-to-br from-[#ffb845] to-[#ff8c00] shadow-lg shadow-[#ff8c00]/50
                                transform transition duration-500 group-hover:scale-110 group-hover:rotate-6">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>

                    {{-- Numéro --}}
                    <div class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-full 
                                bg-[#ff8c00]/20 text-orange-400 font-bold text-lg">
                        02
                    </div>

                    {{-- Badge "Notre approche" --}}
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                        <span class="inline-block px-4 py-1 rounded-full bg-gradient-to-r from-[#ffb845] to-[#ff8c00] 
                                     text-black text-xs font-bold shadow-lg">
                            ⭐ NOTRE APPROCHE
                        </span>
                    </div>

                    {{-- Titre --}}
                    <h3 class="text-2xl font-bold text-orange-400 mb-4 text-center">
                        Notre Solution
                    </h3>

                    {{-- Description --}}
                    <p class="text-gray-300 text-center leading-relaxed">
                        <span class="text-orange-400 font-semibold">Laser-focus sur Facebook & TikTok Ads.</span> 
                        Zéro service inutile, que des résultats qui se voient sur ton compte en banque.
                    </p>

                    {{-- Badge --}}
                    <div class="mt-6 text-center">
                        <span class="inline-block px-4 py-2 rounded-full bg-[#ff8c00]/20 text-orange-400 text-sm font-semibold">
                            ⚡ Performance réelle
                        </span>
                    </div>
                </div>
            </div>

            {{-- Division 3 : Le Résultat --}}
            <div class="relative group opacity-0 translate-y-10 transition-all duration-700 ease-out"
                style="transition-delay: 600ms"
                x-data
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')"
                x-intersect:leave="$el.classList.add('opacity-0','translate-y-10'); $el.classList.remove('opacity-100','translate-y-0')">
                
                <div class="relative h-full bg-[#111111]/80 backdrop-blur-xl rounded-2xl p-8 border border-gray-800 
                            hover:border-green-500/50 transition-all duration-500 hover:shadow-lg hover:shadow-green-500/20
                            hover:-translate-y-2">
                    
                    {{-- Icône --}}
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full 
                                bg-gradient-to-br from-green-500 to-green-600 shadow-lg
                                transform transition duration-500 group-hover:scale-110 group-hover:rotate-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>

                    {{-- Numéro --}}
                    <div class="absolute top-4 right-4 w-10 h-10 flex items-center justify-center rounded-full 
                                bg-green-500/20 text-green-400 font-bold text-lg">
                        03
                    </div>

                    {{-- Titre --}}
                    <h3 class="text-2xl font-bold text-white mb-4 text-center">
                        Le Résultat
                    </h3>

                    {{-- Description --}}
                    <p class="text-gray-300 text-center leading-relaxed">
                        Des campagnes qui convertissent vraiment. Ton budget pub devient une machine à vendre prévisible et rentable.
                    </p>

                    {{-- Badge --}}
                    <div class="mt-6 text-center">
                        <span class="inline-block px-4 py-2 rounded-full bg-green-500/10 text-green-400 text-sm font-semibold">
                            ✅ ROI garanti
                        </span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Citation finale --}}
        <div class="mt-16 text-center opacity-0 translate-y-6 transition-all duration-700 ease-out delay-700"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            <blockquote class="text-xl md:text-2xl font-semibold text-white max-w-3xl mx-auto">
                "Pas de jolies pubs, des 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00]">
                    machines à vendre
                </span> 
                qui rapportent."
            </blockquote>
            <p class="mt-4 text-gray-400">— L'équipe ClickUp</p>
        </div>

    </div>
</section>
