@props(['services'])

<section class="relative w-full py-20 bg-gradient-to-b from-gray-900 via-gray-950 to-black overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 text-center relative z-10">

        <!-- Titre -->
        <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight text-white leading-tight" x-data="{ visible: false }"
            x-intersect="visible = true" :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            class="transition-all duration-700 ease-out">
            Nos 3 services : 
            <span class="text-orange-400">
                du conseil à la gestion complète
            </span>
        </h2>

        <!-- Ligne de séparation -->
        <div class="w-20 h-1 bg-orange-400 mx-auto mt-6 mb-6 opacity-0 translate-y-6 transition-all duration-700 ease-out delay-150"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
        </div>

        <!-- Sous-titre -->
        <p class="text-gray-300 text-base md:text-lg leading-relaxed max-w-3xl mx-auto mb-10" x-data="{ visible: false }"
            x-intersect="visible = true" :class="visible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
            class="transition-all duration-700 ease-out delay-200">
            Que tu veuilles un coup de pouce stratégique ou une prise en charge totale, on s'adapte à ton besoin.
        </p>

        <!-- Onglets -->
        <div x-data="{ tab: 0 }" class="mt-12">
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($services as $index => $service)
                    <button @click="tab = {{ $index }}"
                        class="px-6 py-3 rounded-full text-base font-medium transition-all shadow-lg border border-gray-700
                               backdrop-blur-md relative overflow-hidden
                               hover:scale-105 hover:shadow-orange-400/30 duration-300"
                        :class="tab === {{ $index }} ?
                            'bg-orange-400 text-white' :
                            'bg-gray-800 text-gray-300 hover:bg-gray-700'">
                        {{ $service['name'] }}
                    </button>
                @endforeach
            </div>

            <!-- Contenu -->
            <div class="mt-16 relative min-h-[250px]">
                <template x-for="(service, index) in {{ json_encode($services) }}" :key="index">
                    <template x-if="tab === index">
                        <div>
                            <!-- Prix -->
                            <div class="text-center mb-8" x-show="service.price">
                                <p class="text-2xl font-bold text-orange-400" x-text="service.price"></p>
                            </div>
                            
                            <!-- Cartes -->
                            <div x-transition:enter="transition ease-out duration-700"
                                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-500 absolute"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            <template x-for="(item, i) in service.content" :key="i">
                                <div class="service-card bg-[#111111]/80 border border-gray-800 rounded-2xl p-8 text-left
                                shadow-lg hover:shadow-2xl hover:shadow-orange-400/20
                                transition-all duration-500 group opacity-0 transform translate-y-6"
                                    x-data="{ shown: false }" x-intersect="shown = true" x-intersect:leave="shown = false"
                                    :class="shown ? 'fade-in-card' : 'opacity-0 translate-y-6 scale-95'"
                                    :style="`animation-delay: ${i * 0.15}s;`">
                                    <div
                                        class="flex items-center justify-center w-14 h-14 rounded-xl
                                    bg-orange-400 text-white
                                    shadow-md group-hover:scale-110 transform transition">
                                        <!-- Icônes SVG inline -->
                                        <template x-if="item.icon === 'settings'">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        </template>
                                        <template x-if="item.icon === 'image'">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </template>
                                        <template x-if="item.icon === 'trending-up'">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                        </template>
                                        <template x-if="item.icon === 'eye'">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </template>
                                        <template x-if="item.icon === 'folder'">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                                        </template>
                                        <template x-if="item.icon === 'file-text'">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        </template>
                                        <template x-if="item.icon === 'search'">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                        </template>
                                        <template x-if="item.icon === 'map'">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                        </template>
                                        <template x-if="item.icon === 'phone'">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                        </template>
                                    </div>
                                    <h3 class="mt-6 font-semibold text-xl text-white group-hover:text-orange-400 transition"
                                        x-text="item.title"></h3>
                                    <p class="mt-3 text-gray-400 leading-relaxed" x-text="item.description"></p>
                                </div>
                            </template>
                            </div>
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
