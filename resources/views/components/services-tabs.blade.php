@props(['services'])

<section class="relative w-full py-20 bg-gradient-to-b from-gray-900 via-gray-950 to-black overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center relative z-10">

        <!-- Titre -->
        <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight text-white leading-tight"
            x-data="{ visible: false }"
            x-intersect="visible = true"
            :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            class="transition-all duration-700 ease-out">
            Nos services activent
            <span class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
                le pilote automatique
            </span>
            de tes ventes 🚀
        </h2>

        <!-- Onglets -->
        <div x-data="{ tab: 0 }" class="mt-12">
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($services as $index => $service)
                    <button
                        @click="tab = {{ $index }}"
                        class="px-6 py-3 rounded-full text-base font-medium transition-all shadow-lg border border-gray-700
                               backdrop-blur-md relative overflow-hidden
                               hover:scale-105 hover:shadow-indigo-500/30 duration-300"
                        :class="tab === {{ $index }}
                            ? 'bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white'
                            : 'bg-gray-800 text-gray-300 hover:bg-gray-700'"
                    >
                        {{ $service['name'] }}
                    </button>
                @endforeach
            </div>

            <!-- Contenu -->
            <div class="mt-16 relative min-h-[250px]">
                @foreach ($services as $index => $service)
                    <div
                        x-show="tab === {{ $index }}"
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-500 absolute"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8"
                    >
                        @foreach ($service['content'] as $i => $item)
                            <div class="service-card bg-gray-900/70 border border-gray-700 rounded-2xl p-8 text-left
                                        shadow-lg hover:shadow-2xl hover:shadow-purple-500/20
                                        transition-all duration-500 group opacity-0 transform translate-y-6"
                                 x-data="{ shown: false }"
                                 x-intersect="shown = true"
                                 x-intersect:leave="shown = false"
                                 :class="shown ? 'fade-in-card' : 'opacity-0 translate-y-6 scale-95'"
                                 style="animation-delay: {{ $i * 0.15 }}s;">
                                <div class="flex items-center justify-center w-14 h-14 rounded-xl
                                            bg-gradient-to-tr from-indigo-500 to-purple-500
                                            shadow-md group-hover:scale-110 transform transition">
                                    <img src="{{ $item['icon'] }}"
                                         alt="{{ $item['title'] }}"
                                         class="h-8 w-8 object-contain">
                                </div>
                                <h3 class="mt-6 font-semibold text-xl text-white group-hover:text-indigo-300 transition">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="mt-3 text-gray-400 leading-relaxed">
                                    {{ $item['description'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Arrière-plan décoratif -->
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-purple-600/30 rounded-full blur-3xl"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-indigo-600/20 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-pink-600/10 rounded-full blur-3xl"></div>
    </div>
</section>

<!-- 🎨 Effets -->
<style>
@keyframes fadeInCard {
  0% { opacity: 0; transform: translateY(20px) scale(0.95); }
  100% { opacity: 1; transform: translateY(0) scale(1); }
}
.fade-in-card {
  opacity: 1 !important;
  transform: translateY(0) scale(1) !important;
  animation: fadeInCard 0.6s ease-out forwards;
}
</style>
