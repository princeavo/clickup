<section
    x-data="{ shown: false }"
    x-intersect="shown = true"
    x-intersect:leave="shown = false"
    class="relative py-20 bg-gradient-to-b from-[#04131c] to-[#0a1f2d] text-white overflow-hidden">

    <div class="max-w-6xl mx-auto px-6 text-center">

        <!-- Titre -->
        <h2
            class="text-3xl md:text-4xl font-bold mb-6 transition-all duration-700"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            Pourquoi Facebook & TikTok sont les deux leviers de croissance les plus puissants en 2025
        </h2>

        <!-- Texte -->
        <p
            class="text-gray-300 max-w-2xl mx-auto mb-10 transition-all duration-700 delay-200"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            Tes clients y passent des heures chaque jour. Ces plateformes connaissent leurs envies
            mieux qu’eux-mêmes...
        </p>

        <!-- CTA -->
        <a href="#"
           class="inline-block px-6 py-3 mb-16 text-white font-semibold rounded-full
                  bg-gradient-to-r from-purple-600 to-indigo-500 shadow-lg
                  hover:scale-110 hover:shadow-[0_0_25px_rgba(139,92,246,0.6)]
                  transition-all duration-700 delay-400"
           :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            Nos ressources
        </a>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($resources as $index => $resource)
                <div
                    class="relative group p-8 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 shadow-lg
                           hover:shadow-[0_0_30px_rgba(255,255,255,0.2)] flex flex-col items-center text-center
                           transform transition-all duration-700"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    style="transition-delay: {{ $index * 200 }}ms">

                    <div class="relative w-24 h-24 mb-6 overflow-hidden rounded-xl shadow-lg group-hover:scale-110 group-hover:rotate-3 transition-transform duration-500">
                        <img src="{{ $resource['image'] }}" alt="{{ $resource['title'] }}"
                             class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-500" />
                    </div>

                    <h3 class="text-xl font-semibold mb-3">{{ $resource['title'] }}</h3>
                    <p class="text-gray-300">{{ $resource['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
