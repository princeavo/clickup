@props(['stories' => []])

<section class="relative py-24 bg-[#0b1520] text-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
        <!-- Titre -->
        <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-16
                   bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
            Success Stories de nos clients ✨
        </h2>

        <!-- Grille de cartes -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($stories as $index => $story)
                <div
                    x-data="{ shown: false }"
                    x-intersect="shown = true"
                    x-intersect:leave="shown = false"
                    x-bind:class="{ 'opacity-100 translate-y-0': shown, 'opacity-0 translate-y-10': !shown }"
                    style="transition-delay: {{ $index * 150 }}ms;"
                    class="group relative bg-white/5 border border-white/10 rounded-2xl p-6
                           backdrop-blur-lg shadow-lg hover:shadow-2xl hover:scale-[1.02]
                           transition-all duration-700 ease-out
                           transform opacity-0 translate-y-10">

                    <!-- Image produit -->
                    <div class="relative w-full h-48 overflow-hidden rounded-xl mb-6">
                        <img src="{{ $story['image'] }}" alt="{{ $story['brand'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>

                    <!-- Objectif atteint -->
                    <span class="inline-block px-4 py-1 mb-4 text-sm font-semibold rounded-full
                                 bg-gradient-to-r from-green-400 to-emerald-600 text-white shadow-md">
                        {{ $story['goal'] }}
                    </span>

                    <!-- Nom de la marque -->
                    <h3 class="text-xl font-bold mb-3">{{ $story['brand'] }}</h3>

                    <!-- Problème -->
                    <p class="text-gray-300 mb-6">{{ $story['problem'] }}</p>

                    <!-- CTA -->
                    <a href="{{ $story['link'] }}"
                       class="inline-flex items-center gap-2 text-purple-400 hover:text-purple-300 font-semibold transition">
                        En savoir plus
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
