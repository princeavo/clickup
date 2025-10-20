@props(['title', 'subtitle', 'steps'])
<section class="w-full py-20 px-6 md:px-12 lg:px-20 bg-orange-900 text-gray-100 relative overflow-hidden"
    x-data="{
        activeTab: 0,
        steps: @js($steps),
        transitionType: 'fade', // slide-left | slide-right | zoom | fade
    }">

    <!-- Fond animé -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-br from-orange-500 via-yellow-900 to-black"></div>
    <div
        class="absolute top-0 left-1/2 w-[40rem] h-[40rem] bg-orange-600 blur-3xl rounded-full -translate-x-1/2 -translate-y-1/2">
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
                    'bg-orange-500 text-white border-orange-500 shadow-lg shadow-orange-500/40 scale-110' :
                    'bg-orange800 text-gray-300 border-gray-700 hover:bg-gray-700 hover:text-white'">
                <span
                    class="w-7 h-7 flex items-center justify-center rounded-full text-xs font-bold transition-all duration-500"
                    :class="activeTab === index ? 'bg-white text-orange' : 'bg-orange-500 text-white-400'">
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
                           bg-[#1c1c1c] rounded-2xl p-4 md:p-8 lg:p-10 shadow-2xl backdrop-blur-lg">
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
                                class="w-8 h-8 md:w-9 md:h-9 flex items-center justify-center rounded-full bg-gradient-to-r from-orange-500 to-yellow-500 text-white font-bold text-xs md:text-sm shadow-md shadow-orange-500"
                                x-text="step.number"></span>
                            <span class="text-xs md:text-sm font-medium text-white" x-text="step.week"></span>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold mb-4 text-white drop-shadow"
                            x-text="step.title"></h3>
                        <p class="text-gray-300 leading-relaxed mb-6 text-sm sm:text-base md:text-lg"
                            x-text="step.content"></p>

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2 md:gap-3">
                            <template x-for="tag in step.tags" :key="tag">
                                <span
                                    class="px-3 py-1 md:px-4 md:py-1.5 rounded-full border border-orange-500 text-white text-xs md:text-sm bg-orange-500 hover:bg-orange-600 hover:text-white transition">
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
