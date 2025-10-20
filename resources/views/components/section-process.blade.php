@props(['intro', 'steps'])

<section class="w-full py-20 px-6 md:px-12 lg:px-20 bg-orange-900 text-gray-100 relative overflow-hidden">
    <!-- Fond dégradé -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-purple-900/30 via-gray-950 to-black"></div>
    <div class="absolute top-0 right-0 w-[30rem] h-[30rem] bg-[#05210c] blur-3xl rounded-full"></div>
    <div class="absolute bottom-0 left-0 w-[20rem] h-[20rem] bg-[#05210c] blur-3xl rounded-full"></div>

    <!-- Intro -->
    <div class="text-center max-w-3xl mx-auto mb-16">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-snug drop-shadow-lg
                   opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                                      $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                               $el.classList.remove('opacity-100','translate-y-0')">
            {{ $intro['title'] }}
        </h2>
        <p class="text-lg text-gray-400 mt-6 leading-relaxed
                  opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
            x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                                      $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                               $el.classList.remove('opacity-100','translate-y-0')">
            {{ $intro['subtitle'] }}
        </p>
        <a href="#"
           class="mt-8 inline-block px-6 py-3 text-lg font-semibold rounded-full bg-gradient-to-r from-orange-500 to-yellow-500 text-white shadow-lg shadow-oange-500 hover:scale-105 transition-transform duration-300
                  opacity-0 translate-y-6 transition-all duration-700 ease-out delay-300"
           x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                                     $el.classList.add('opacity-100','translate-y-0')"
           x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                              $el.classList.remove('opacity-100','translate-y-0')">
            {{ $intro['cta'] }}
        </a>
    </div>

    <!-- Steps -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 max-w-6xl mx-auto">
        @foreach($steps as $i => $step)
            <div class="opacity-0 translate-y-10 relative bg-[#111] rounded-3xl p-8 shadow-lg border border-gray-800 backdrop-blur-lg
                        transition-all duration-700 hover:scale-105 hover:-rotate-1 hover:shadow-orange-500/40 hover:border-orange-500 group"
                 x-data
                 x-intersect:enter="$el.style.transitionDelay='{{ $i * 200 }}ms';
                                    $el.classList.remove('opacity-0','translate-y-10');
                                    $el.classList.add('opacity-100','translate-y-0')"
                 x-intersect:leave="$el.classList.add('opacity-0','translate-y-10');
                                    $el.classList.remove('opacity-100','translate-y-0')">

                <!-- Numéro -->
                <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 w-12 h-12 flex items-center justify-center rounded-full bg-gradient-to-r from-orange-500 to-yellow-500 text-white font-bold text-lg shadow-lg shadow-orange-500">
                    {{ $step['number'] }}
                </div>

                <!-- Icône -->
                <div class="flex justify-center mb-6 mt-6">
                    <img src="{{ asset($step['icon']) }}" alt="{{ $step['title'] }}"
                         class="w-16 h-16 object-contain drop-shadow-lg transition-transform duration-500 group-hover:scale-110 group-hover:rotate-3 rounded-full">
                </div>

                <!-- Titre -->
                <h3 class="text-xl font-bold text-center text-white mb-4">{{ $step['title'] }}</h3>

                <!-- Contenu -->
                <p class="text-gray-300 text-center leading-relaxed">{{ $step['content'] }}</p>
            </div>
        @endforeach
    </div>
</section>
