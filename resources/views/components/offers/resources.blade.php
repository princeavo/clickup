@props(['resources' => []])

<section class="relative py-24 bg-gradient-to-b from-[#04131c] to-[#0a1f2d] overflow-hidden">
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
                Toutes nos <span class="text-[#ffb845]">ressources</span> à ta disposition
            </h2>
            
            <x-animated-highlight />
            
            <p class="text-lg text-gray-300 max-w-2xl mx-auto mt-8
                      opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
                x-data
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                Accède à notre bibliothèque complète de contenus, outils et formations
            </p>
        </div>

        <!-- Grille des ressources -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $icons = [
                    'book' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
                    'video' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>',
                    'microphone' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/></svg>',
                    'template' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>',
                    'users' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>',
                    'tools' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
                ];
            @endphp

            @foreach($resources as $index => $resource)
                <a href="{{ $resource['link'] }}" 
                   class="group relative bg-[#111111]/80 backdrop-blur-xl rounded-2xl p-8 border border-gray-800
                          hover:border-[#ff8c00]/50 hover:shadow-lg hover:shadow-[#ff8c00]/20 
                          transition-all duration-500 hover:-translate-y-2
                          opacity-0 translate-y-10"
                   style="transition-delay: {{ $index * 150 }}ms"
                   x-data
                   x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')">
                    
                    <!-- Icône -->
                    <div class="w-16 h-16 mb-6 flex items-center justify-center rounded-full 
                                bg-gradient-to-br from-[#ffb845] to-[#ff8c00] text-white shadow-lg shadow-[#ff8c00]/50
                                transform transition duration-500 group-hover:scale-110 group-hover:rotate-6">
                        {!! $icons[$resource['icon']] ?? $icons['book'] !!}
                    </div>

                    <!-- Titre -->
                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-[#ffb845] transition">
                        {{ $resource['title'] }}
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-300 mb-4 leading-relaxed">
                        {{ $resource['description'] }}
                    </p>

                    <!-- Count -->
                    <div class="flex items-center gap-2 text-sm text-[#ffb845] font-semibold">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ $resource['count'] }}
                    </div>

                    <!-- Flèche -->
                    <div class="absolute top-8 right-8 opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-6 h-6 text-[#ffb845]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
