@props(['title', 'subtitle', 'steps'])

<section class="w-full py-24 px-6 md:px-12 lg:px-20 bg-gradient-to-b from-[#0a1f2d] to-[#04131c] text-gray-100 relative overflow-hidden"
    x-data="{
        activeTab: 0,
        steps: @js($steps),
        transitionType: 'fade',
    }">

    <!-- Effets de fond améliorés -->
    <div class="absolute inset-0 -z-10">
        <!-- Grille subtile -->
        <div class="absolute inset-0 opacity-[0.03]"
            style="background-image: radial-gradient(circle at 1px 1px, #ffffff 1px, transparent 0);
                   background-size: 40px 40px;">
        </div>
        
        <!-- Glows orange -->
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-[#ff8c00]/15 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-[#ffb845]/15 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#ff8c00]/10 rounded-full blur-3xl"></div>
    </div>

    <!-- Titre -->
    <div class="text-center mb-16 relative z-10">
        <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6
                   opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                               $el.classList.add('opacity-100','translate-y-0')">
            {{ $title }}
        </h2>
        
        <x-animated-highlight />
        
        <p class="text-lg md:text-xl text-gray-300 mt-8 max-w-3xl mx-auto
                  opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                               $el.classList.add('opacity-100','translate-y-0')">
            {{ $subtitle }}
        </p>
    </div>

    <!-- Onglets -->
    <div class="flex flex-wrap justify-center gap-4 mb-12 relative z-20">
        <template x-for="(step, index) in steps" :key="index">
            <button @click="activeTab = index"
                class="flex items-center gap-3 px-6 py-3 rounded-xl border-2 transition-all duration-500 focus:outline-none
                       opacity-0 translate-y-6"
                x-intersect:enter="$el.style.transitionDelay = (index * 100) + 'ms';
                                   $el.classList.remove('opacity-0','translate-y-6');
                                   $el.classList.add('opacity-100','translate-y-0')"
                :class="activeTab === index ?
                    'bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-black border-[#ff8c00] shadow-lg shadow-[#ff8c00]/40 scale-105' :
                    'bg-[#111111]/80 text-gray-300 border-gray-700 hover:bg-[#1a1a1a] hover:border-[#ff8c00]/50 hover:text-white'">
                <span
                    class="w-8 h-8 flex items-center justify-center rounded-full text-sm font-bold transition-all duration-500"
                    :class="activeTab === index ? 'bg-black/20 text-black' : 'bg-[#ff8c00]/20 text-orange-400'">
                    <span x-text="step.number"></span>
                </span>
                <span x-text="step.title" class="text-sm md:text-base font-semibold"></span>
            </button>
        </template>
    </div>

    <!-- Contenu -->
    <div class="relative w-full max-w-6xl mx-auto overflow-hidden
                opacity-0 translate-y-6 transition-all duration-700 ease-out"
        x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                           $el.classList.add('opacity-100','translate-y-0')">

        <template x-for="(step, index) in steps" :key="index">
            <template x-if="activeTab === index">
                <div x-transition:enter="transition duration-700 ease-out transform"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition duration-300 ease-in transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="relative flex flex-col md:flex-row items-center gap-8
                           bg-[#111111]/80 backdrop-blur-xl rounded-2xl p-6 md:p-10 
                           shadow-2xl border border-gray-800">
                    
                    <!-- Image -->
                    <div class="w-full md:w-1/2 max-w-md flex-shrink-0 overflow-hidden rounded-xl">
                        <img :src="step.image" :alt="step.title"
                            class="w-full h-64 md:h-80 object-cover transition-transform duration-500 hover:scale-105">
                    </div>

                    <!-- Texte -->
                    <div class="w-full md:w-1/2">
                        <!-- Badge numéro + semaine -->
                        <div class="flex items-center gap-3 mb-4">
                            <span class="w-10 h-10 flex items-center justify-center rounded-full 
                                         bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-black font-bold text-lg 
                                         shadow-lg shadow-[#ff8c00]/50"
                                x-text="step.number"></span>
                            <span class="text-sm font-semibold text-orange-400 uppercase tracking-wide" 
                                  x-text="step.week"></span>
                        </div>

                        <!-- Titre -->
                        <h3 class="text-2xl md:text-3xl font-bold mb-4 text-white" 
                            x-text="step.title"></h3>

                        <!-- Description -->
                        <p class="text-gray-300 leading-relaxed mb-6 text-base md:text-lg" 
                           x-text="step.content"></p>

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2">
                            <template x-for="tag in step.tags" :key="tag">
                                <span class="px-4 py-2 rounded-full border-2 border-[#ff8c00]/50 
                                             text-orange-400 text-sm font-semibold
                                             bg-[#ff8c00]/10 hover:bg-[#ff8c00]/20 
                                             hover:border-[#ff8c00] transition-all duration-300">
                                    <span x-text="tag"></span>
                                </span>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
        </template>
    </div>

    <!-- Indicateurs de progression -->
    <div class="flex justify-center gap-2 mt-8">
        <template x-for="(step, index) in steps" :key="index">
            <button @click="activeTab = index"
                class="w-3 h-3 rounded-full transition-all duration-300"
                :class="activeTab === index ? 
                    'bg-gradient-to-r from-[#ffb845] to-[#ff8c00] w-8' : 
                    'bg-gray-600 hover:bg-gray-500'">
            </button>
        </template>
    </div>
</section>
