@props(['stats'])

<section
    x-data="{ shown: false, counted: false }"
    x-intersect="shown = true; if(!counted){ counted = true; $dispatch('start-count') }"
    x-intersect:leave="shown = false"
    class="relative w-full py-24 bg-gradient-to-b from-gray-900 via-gray-950 to-black overflow-hidden"
>
    <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center relative z-10">

        <!-- Titre -->
        <h2 class="text-3xl md:text-5xl font-extrabold text-white leading-tight
                   transition-all duration-700 transform"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'">
            Nos résultats parlent
            <span class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
                plus fort
            </span>
            que nos promesses
        </h2>

        <!-- Sous-titre -->
        <p class="mt-4 text-lg text-gray-400 max-w-2xl mx-auto transition-all duration-700 delay-200 transform"
           :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
            La plupart de nos clients nous ont rejoints après avoir testé d’autres agences ou logiciels.
            Nos chiffres sont la meilleure preuve de notre efficacité.
        </p>

        <!-- Bouton -->
        <div class="mt-10 transition-all duration-700 delay-400 transform"
             :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'">
            <a href="#success-stories"
               class="inline-block px-6 py-3 rounded-full font-semibold text-white
                      bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600
                      hover:scale-105 hover:shadow-lg hover:shadow-purple-500/30
                      transition-all duration-300">
                Voir nos Success Stories
            </a>
        </div>

        <!-- Stats -->
        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($stats as $i => $stat)
                <div class="relative bg-gray-900/60 border border-gray-700 backdrop-blur-md
                            rounded-2xl p-8 text-center shadow-md transition-all duration-700 transform
                            hover:shadow-lg hover:shadow-indigo-500/20 hover:-translate-y-1 group"
                     :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                     style="transition-delay: {{ $i * 150 }}ms">

                    <!-- Valeur -->
                    <h3 class="text-3xl md:text-4xl font-extrabold mb-3">
                        <span class="bg-gradient-to-r from-orange-400 via-pink-400 to-purple-500
                                     bg-clip-text text-transparent group-hover:scale-110 inline-block
                                     transition-transform duration-500"
                              x-data="{ count: 0 }"
                              @start-count.window="
                                  let final={{ $stat['value'] }};
                                  let step = final/50;
                                  let i=0;
                                  let interval=setInterval(()=>{
                                      count = Math.ceil(i*step);
                                      if(i>=50){ count = final; clearInterval(interval); }
                                      i++;
                                  },40)"
                        >
                            <span x-text="count"></span>{{ $stat['suffix'] }}
                        </span>
                    </h3>

                    <!-- Label -->
                    <p class="text-gray-300 text-base leading-relaxed">
                        {{ $stat['label'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Glow background -->
    <div class="absolute inset-0 z-0">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-600/20 rounded-full blur-3xl"></div>
    </div>
</section>
