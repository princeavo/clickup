@props(['stats'])

<section x-data="{ shown: false, counted: false }" x-intersect="shown = true; if(!counted){ counted = true; $dispatch('start-count') }"
    x-intersect:leave="shown = false" class="relative w-full py-24 overflow-hidden bg-cover bg-center"
    style="background-image: url('{{ asset('stats-bg.png') }}');">
    <!-- Overlay sombre -->
    <div class="absolute inset-0 bg-black/85"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center relative z-10">

        <!-- Titre -->
        <h2 class="text-3xl md:text-5xl font-extrabold leading-tight opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            <span class="text-[#ff8c00]">Nos résultats</span>
            <span class="text-white">parlent plus fort que nos promesses</span>
        </h2>

        <x-animated-highlight />

        <!-- Stats -->
        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($stats as $i => $stat)
                @php
                    $offsets = ['translate-y-0', '-translate-y-6', '-translate-y-12', '-translate-y-20'];
                    $offset = $offsets[$i % 4];
                @endphp

                <div class="relative bg-[#111111]/80 border border-gray-800 rounded-2xl px-6 text-center
               shadow-md min-h-[360px] md:min-h-[420px] flex items-center justify-center
               transition-all duration-700 hover:shadow-lg hover:shadow-orange-500/30 opacity-0 scale-95"
                    x-data
                    x-intersect:enter="$el.classList.add('opacity-100','scale-100'); $el.classList.remove('opacity-0','scale-95')"
                    x-intersect:leave="$el.classList.add('opacity-0','scale-95'); $el.classList.remove('opacity-100','scale-100')"
                    style="transition-delay: {{ $i * 200 }}ms">

                    <div class="transform {{ $offset }}">
                        <!-- Valeur -->
                        <h3 class="text-4xl md:text-5xl font-extrabold text-white mb-2" x-data="{ count: 0 }"
                            @start-count.window="
                                let final={{ $stat['value'] }};
                                let step = final/50;
                                let i=0;
                                let interval=setInterval(()=>{
                                    count = Math.ceil(i*step);
                                    if(i>=50){ count = final; clearInterval(interval); }
                                    i++;
                                },40)">
                            +<span x-text="count"></span>{{ $stat['suffix'] }}
                        </h3>

                        <!-- Label -->
                        <p class="text-gray-300 text-base">
                            {{ $stat['label'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Bouton -->
        <div class="mt-16 opacity-0 translate-y-6 transition-all duration-700 ease-out delay-500" x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            <a href="#success-stories"
                class="inline-block px-8 py-3 rounded-xl font-bold text-[#111111]
                      bg-gradient-to-r from-[#ffb845] to-[#ff8c00]
                      hover:scale-105 hover:shadow-lg hover:shadow-orange-500/30
                      transition-all duration-300">
                Voir nos Success Stories
            </a>
        </div>
    </div>
</section>
