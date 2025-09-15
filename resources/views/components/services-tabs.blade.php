@props(['services'])

<section class="relative w-full py-20 bg-gradient-to-b from-gray-900 via-gray-950 to-black overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center relative z-10">

        <!-- Titre -->
        <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight text-white leading-tight" x-data="{ visible: false }"
            x-intersect="visible = true" :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            class="transition-all duration-700 ease-out">
            Nos services activent
            <span class="bg-gradient-to-r from-[#ffb845] to-[#ff8c00] bg-clip-text text-transparent">
                le pilote automatique
            </span>
            de tes ventes 🚀
        </h2>

        <!-- Ligne de séparation -->
        <div class="w-20 h-1 bg-gradient-to-r from-[#ffb845] to-[#ff8c00] mx-auto mt-6 mb-10 opacity-0 translate-y-6 transition-all duration-700 ease-out delay-150"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
        </div>

        <!-- Onglets -->
        <div x-data="{ tab: 0 }" class="mt-12">
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($services as $index => $service)
                    <button @click="tab = {{ $index }}"
                        class="px-6 py-3 rounded-full text-base font-medium transition-all shadow-lg border border-gray-700
                               backdrop-blur-md relative overflow-hidden
                               hover:scale-105 hover:shadow-[#ff8c00]/30 duration-300"
                        :class="tab === {{ $index }} ?
                            'bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-white' :
                            'bg-gray-800 text-gray-300 hover:bg-gray-700'">
                        {{ $service['name'] }}
                    </button>
                @endforeach
            </div>

            <!-- Contenu -->
            <div class="mt-16 relative min-h-[250px]">
                <template x-for="(service, index) in {{ json_encode($services) }}" :key="index">
                    <template x-if="tab === index">
                        <div x-transition:enter="transition ease-out duration-700"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-500 absolute"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            <template x-for="(item, i) in service.content" :key="i">
                                <div class="service-card bg-[#111111]/80 border border-gray-800 rounded-2xl p-8 text-left
                                shadow-lg hover:shadow-2xl hover:shadow-[#ff8c00]/20
                                transition-all duration-500 group opacity-0 transform translate-y-6"
                                    x-data="{ shown: false }" x-intersect="shown = true" x-intersect:leave="shown = false"
                                    :class="shown ? 'fade-in-card' : 'opacity-0 translate-y-6 scale-95'"
                                    :style="`animation-delay: ${i * 0.15}s;`">
                                    <div
                                        class="flex items-center justify-center w-14 h-14 rounded-xl
                                    bg-gradient-to-tr from-[#ffb845] to-[#ff8c00]
                                    shadow-md group-hover:scale-110 transform transition">
                                        <img :src="item.icon" :alt="item.title"
                                            class="h-8 w-8 object-contain">
                                    </div>
                                    <h3 class="mt-6 font-semibold text-xl text-white group-hover:text-[#ffb845] transition"
                                        x-text="item.title"></h3>
                                    <p class="mt-3 text-gray-400 leading-relaxed" x-text="item.description"></p>
                                </div>
                            </template>
                        </div>
                    </template>
                </template>
            </div>

        </div>
    </div>

    <!-- Arrière-plan décoratif -->
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-[#ff8c00]/20 rounded-full blur-3xl"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-[#ffb845]/20 rounded-full blur-2xl"></div>
        <div
            class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-[#ff8c00]/10 rounded-full blur-3xl">
        </div>
    </div>
</section>

<!-- 🎨 Effets -->
<style>
    @keyframes fadeInCard {
        0% {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }

        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .fade-in-card {
        opacity: 1 !important;
        transform: translateY(0) scale(1) !important;
        animation: fadeInCard 0.6s ease-out forwards;
    }
</style>
