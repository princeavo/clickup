@props(['resources' => []])

<section class="relative py-20 bg-gradient-to-b from-[#04131c] to-[#0a1f2d] text-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <!-- Titre -->
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Pourquoi Facebook & TikTok sont les deux leviers de croissance les plus puissants en 2025
        </h2>
        <p class="text-gray-300 max-w-2xl mx-auto mb-10">
            Tes clients y passent des heures chaque jour. Ces plateformes connaissent leurs envies
            mieux qu’eux-mêmes. Avec la bonne stratégie, tu peux transformer ce temps d’écran en temps de caisse.
        </p>

        <!-- CTA -->
        <a href="#"
           class="inline-block px-6 py-3 mb-16 text-white font-semibold rounded-full bg-gradient-to-r from-purple-600 to-indigo-500 shadow-lg hover:scale-105 transition-transform">
            Nos ressources
        </a>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($resources as $resource)
                <div
                    class="relative group p-8 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 shadow-lg hover:shadow-2xl transition duration-300 flex flex-col items-center text-center">

                    <!-- Image -->
                    <img src="{{ Storage::disk('public')->url($resource['image']) }}" alt="{{ $resource['title'] }}"
                         class="w-20 h-20 object-contain mb-6 group-hover:scale-110 transition-transform duration-300" />

                    <!-- Title -->
                    <h3 class="text-xl font-semibold mb-3">{{ $resource['title'] }}</h3>

                    <!-- Description -->
                    <p class="text-gray-300">
                        {{ $resource['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
