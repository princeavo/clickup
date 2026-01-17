@props(['callToAction', 'formFields'])

<section class="relative py-20 px-6 md:px-12 lg:px-20 bg-stone-900 text-gray-100 overflow-hidden">
    <!-- Dégradés animés orange -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-[#ff8c00]/10 via-[#0a1f2d] to-black"></div>
    <div class="absolute top-0 right-0 w-[25rem] h-[25rem] bg-[#ff8c00]/15 blur-3xl rounded-full animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-[20rem] h-[20rem] bg-[#ffb845]/10 blur-3xl rounded-full animate-pulse"></div>

    <!-- Intro -->
    <div class="text-center max-w-3xl mx-auto mb-12">
        <h2 class="text-3xl md:text-4xl font-extrabold leading-snug drop-shadow-lg
                   opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                               $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                               $el.classList.remove('opacity-100','translate-y-0')">
            Prêt à <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00]">scaler</span> <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00]">sans</span> <span class="text-orange-400">stress</span> ?
        </h2>
        <p class="text-lg text-gray-400 mt-6 leading-relaxed
                  opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
           x-data
           x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                              $el.classList.add('opacity-100','translate-y-0')"
           x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                              $el.classList.remove('opacity-100','translate-y-0')">
            {{ $callToAction['subtitle'] }}
        </p>
    </div>

    <!-- Bullet points - Ce qui se passe pendant l'appel -->
    <div class="max-w-3xl mx-auto mb-10 px-4" x-data="{ currentSlide: 0, slides: [
        [
            { icon: 'check', text: 'Audit gratuit de ton compte actuel' },
            { icon: 'check', text: 'Identification de tes 3 plus grosses opportunités' }
        ],
        [
            { icon: 'check', text: 'Roadmap personnalisée (offerte, même sans engagement)' },
            { icon: 'check', text: 'Découverte de la méthode CREA™ appliquée à TON business' }
        ]
    ] }">
        <!-- Cards Container -->
        <div class="relative overflow-hidden">
            <div class="flex transition-transform duration-500 ease-out" :style="`transform: translateX(-${currentSlide * 100}%)`">
                <!-- Slide 1 -->
                <div class="w-full flex-shrink-0 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="group flex items-start gap-4 p-4 rounded-2xl bg-gradient-to-br from-[#ff8c00]/10 to-transparent border border-[#ff8c00]/20 
                                opacity-0 translate-y-8 transition-all duration-700 ease-out hover:scale-105 hover:border-[#ff8c00]/40"
                         x-data
                         x-intersect:enter="$el.classList.remove('opacity-0','translate-y-8');
                                            $el.classList.add('opacity-100','translate-y-0')"
                         style="transition-delay: 100ms">
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-[#ff8c00] to-[#ffb845] flex items-center justify-center 
                                    shadow-lg shadow-[#ff8c00]/30 group-hover:shadow-[#ff8c00]/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-gray-200 font-medium leading-relaxed">Audit gratuit de ton compte actuel</p>
                    </div>

                    <div class="group flex items-start gap-4 p-4 rounded-2xl bg-gradient-to-br from-[#ff8c00]/10 to-transparent border border-[#ff8c00]/20 
                                opacity-0 translate-y-8 transition-all duration-700 ease-out hover:scale-105 hover:border-[#ff8c00]/40"
                         x-data
                         x-intersect:enter="$el.classList.remove('opacity-0','translate-y-8');
                                            $el.classList.add('opacity-100','translate-y-0')"
                         style="transition-delay: 200ms">
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-[#ff8c00] to-[#ffb845] flex items-center justify-center 
                                    shadow-lg shadow-[#ff8c00]/30 group-hover:shadow-[#ff8c00]/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-gray-200 font-medium leading-relaxed">Identification de tes 3 plus grosses opportunités</p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="w-full flex-shrink-0 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="group flex items-start gap-4 p-4 rounded-2xl bg-gradient-to-br from-[#ff8c00]/10 to-transparent border border-[#ff8c00]/20 
                                transition-all duration-300 hover:scale-105 hover:border-[#ff8c00]/40">
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-[#ff8c00] to-[#ffb845] flex items-center justify-center 
                                    shadow-lg shadow-[#ff8c00]/30 group-hover:shadow-[#ff8c00]/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-gray-200 font-medium leading-relaxed">Roadmap personnalisée (offerte, même sans engagement)</p>
                    </div>

                    <div class="group flex items-start gap-4 p-4 rounded-2xl bg-gradient-to-br from-[#ff8c00]/10 to-transparent border border-[#ff8c00]/20 
                                transition-all duration-300 hover:scale-105 hover:border-[#ff8c00]/40">
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-br from-[#ff8c00] to-[#ffb845] flex items-center justify-center 
                                    shadow-lg shadow-[#ff8c00]/30 group-hover:shadow-[#ff8c00]/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <p class="text-gray-200 font-medium leading-relaxed">Découverte de la méthode CREA™ appliquée à TON business</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Dots -->
        <div class="flex justify-center gap-2 mt-6">
            <button @click="currentSlide = 0" 
                    class="w-2 h-2 rounded-full transition-all duration-300"
                    :class="currentSlide === 0 ? 'bg-[#ff8c00] w-8' : 'bg-gray-600 hover:bg-gray-500'">
            </button>
            <button @click="currentSlide = 1" 
                    class="w-2 h-2 rounded-full transition-all duration-300"
                    :class="currentSlide === 1 ? 'bg-[#ff8c00] w-8' : 'bg-gray-600 hover:bg-gray-500'">
            </button>
        </div>
    </div>

    <!-- Formulaire rendez-vous -->
    <div class="max-w-4xl mx-auto bg-[#111111]/80 backdrop-blur-xl rounded-3xl shadow-lg border border-gray-800 p-8 md:p-12
                transform hover:scale-[1.01] transition duration-500">
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-500/20 border border-green-500/50 text-green-300">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-500/20 border border-red-500/50 text-red-300">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            @foreach($formFields as $index => $field)
                @php
                    $direction = $index % 3 === 0 ? '-translate-x-10'
                               : ($index % 3 === 1 ? 'translate-y-10'
                               : 'translate-x-10');
                @endphp

                <div class="col-span-1 {{ $field['type'] === 'textarea' ? 'md:col-span-2' : '' }}
                            opacity-0 scale-95 {{ $direction }}
                            transition-all duration-700 ease-out"
                     style="transition-delay: {{ $index * 150 }}ms"
                     x-data
                     x-intersect:enter="$el.classList.remove('opacity-0','scale-95','-translate-x-10','translate-x-10','translate-y-10');
                                        $el.classList.add('opacity-100','scale-100')"
                     x-intersect:leave="$el.classList.add('opacity-0','scale-95','{{ $direction }}');
                                        $el.classList.remove('opacity-100','scale-100')">

                    <label for="{{ $field['name'] }}" class="block mb-2 text-sm font-medium text-gray-300">
                        {{ $field['label'] }} @if($field['required']) <span class="text-orange-400">*</span> @endif
                    </label>

                    @if($field['type'] === 'textarea')
                        <textarea id="{{ $field['name'] }}" name="{{ $field['name'] }}" rows="4"
                                  @if($field['required']) required @endif
                                  class="w-full px-4 py-3 rounded-xl bg-black/40 text-gray-100 border border-gray-700 focus:outline-none focus:ring-2
                                         focus:ring-[#ff8c00] focus:border-[#ff8c00] resize-none transition">{{ old($field['name']) }}</textarea>
                    @else
                        <input type="{{ $field['type'] }}" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                               @if($field['required']) required @endif
                               value="{{ old($field['name']) }}"
                               class="w-full px-4 py-3 rounded-xl bg-black/40 text-gray-100 border border-gray-700
                                      focus:outline-none focus:ring-2 focus:ring-[#ff8c00] focus:border-[#ff8c00] transition">
                    @endif
                </div>
            @endforeach

            <!-- Bouton -->
            <div class="col-span-1 md:col-span-2 flex justify-center
                        opacity-0 scale-90 transition-all duration-700 ease-out delay-500"
                 x-data="{visible:false}"
                 x-intersect:enter="visible=true;
                                    $el.classList.remove('opacity-0','scale-90');
                                    $el.classList.add('opacity-100','scale-100','animate-shake')"
                 x-intersect:leave="visible=false;
                                    $el.classList.add('opacity-0','scale-90');
                                    $el.classList.remove('opacity-100','scale-100','animate-shake')">
                <x-button type="submit" variant="primary" class="text-lg">
                    {{ $callToAction['button'] }}
                </x-button>
            </div>
        </form>

        <!-- Sous-texte rassurant -->
        <div class="mt-6 text-center opacity-0 translate-y-4 transition-all duration-700 ease-out"
             x-data
             x-intersect:enter="$el.classList.remove('opacity-0','translate-y-4');
                                $el.classList.add('opacity-100','translate-y-0')"
             style="transition-delay: 700ms">
            <p class="text-sm text-gray-400 flex flex-wrap items-center justify-center gap-x-4 gap-y-2">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Aucune CB requise
                </span>
                <span class="hidden sm:inline text-gray-600">•</span>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Aucune obligation
                </span>
                <span class="hidden sm:inline text-gray-600">•</span>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Juste 30 minutes pour voir si on peut t'aider
                </span>
            </p>
        </div>
    </div>
</section>

<!-- Animation Shake -->
<style>
@keyframes shake {
  0%, 100% { transform: translateX(0); }
  20% { transform: translateX(-4px); }
  40% { transform: translateX(4px); }
  60% { transform: translateX(-3px); }
  80% { transform: translateX(3px); }
}
.animate-shake {
  animation: shake 0.6s ease-in-out;
}
</style>
