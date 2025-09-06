@props(['title', 'subtitle', 'steps'])
<section class="w-full py-20 px-6 md:px-12 lg:px-20 bg-gray-900 text-gray-100 relative overflow-hidden"
    x-data="{
        activeTab: 0,
        steps: @js($steps),
        transitionType: 'fade', // slide-left | slide-right | zoom | fade
    }">

    <!-- Fond animé -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-purple-900/40 via-gray-900 to-black"></div>
    <div
        class="absolute top-0 left-1/2 w-[40rem] h-[40rem] bg-purple-600/20 blur-3xl rounded-full -translate-x-1/2 -translate-y-1/2">
    </div>

    <!-- Titre -->
    <div class="text-center mb-16">
        <h2 class="text-3xl md:text-5xl font-extrabold text-white drop-shadow-lg
                   opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                               $el.classList.add('opacity-100','translate-y-0')">
            {{ $title }}
        </h2>
        <p class="text-lg text-gray-400 mt-4
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
                class="flex items-center gap-2 px-6 py-2.5 rounded-full border transition-all duration-500 focus:outline-none
                       opacity-0 translate-y-6 transition-all duration-700 ease-out"
                x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                                   $el.classList.add('opacity-100','translate-y-0')"
                :class="activeTab === index ?
                    'bg-purple-600/90 text-white border-purple-500 shadow-lg shadow-purple-500/40 scale-110' :
                    'bg-gray-800 text-gray-300 border-gray-700 hover:bg-gray-700 hover:text-white'">
                <span
                    class="w-7 h-7 flex items-center justify-center rounded-full text-xs font-bold transition-all duration-500"
                    :class="activeTab === index ? 'bg-white text-purple-600' : 'bg-purple-900 text-purple-400'">
                    <span x-text="step.number"></span>
                </span>
                <span x-text="step.title" class="text-sm font-semibold"></span>
            </button>
        </template>
    </div>

    <!-- Contenu -->
    <div class="relative w-full max-w-full md:max-w-5xl mx-auto overflow-hidden
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
                    class="relative flex flex-col md:flex-row items-center gap-6
                           bg-gray-800/60 rounded-2xl p-4 md:p-8 lg:p-10 shadow-2xl backdrop-blur-lg">
                    <!-- Image -->
                    <div
                        class="w-full md:w-1/2 max-w-md h-40 sm:h-48 md:h-64 lg:h-72 flex-shrink-0 overflow-hidden rounded-2xl">
                        <img :src="step.image" :alt="step.title"
                            class="w-full h-full object-cover object-center transition-transform duration-500 hover:scale-105 hover:rotate-2">
                    </div>

                    <!-- Texte -->
                    <div class="w-full md:w-1/2 max-w-lg mt-4 md:mt-0">
                        <div class="flex items-center gap-3 mb-3">
                            <span
                                class="w-8 h-8 md:w-9 md:h-9 flex items-center justify-center rounded-full bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold text-xs md:text-sm shadow-md shadow-purple-600/40"
                                x-text="step.number"></span>
                            <span class="text-xs md:text-sm font-medium text-purple-400" x-text="step.week"></span>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold mb-4 text-white drop-shadow"
                            x-text="step.title"></h3>
                        <p class="text-gray-300 leading-relaxed mb-6 text-sm sm:text-base md:text-lg"
                            x-text="step.content"></p>

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2 md:gap-3">
                            <template x-for="tag in step.tags" :key="tag">
                                <span
                                    class="px-3 py-1 md:px-4 md:py-1.5 rounded-full border border-purple-500 text-purple-300 text-xs md:text-sm bg-purple-900/40 hover:bg-purple-700/40 hover:text-white transition">
                                    <span x-text="tag"></span>
                                </span>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
        </template>
    </div>
</section>
