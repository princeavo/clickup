@props(['callToAction', 'formFields'])

<section class="relative py-20 px-6 md:px-12 lg:px-20 bg-gray-950 text-gray-100 overflow-hidden">
    <!-- Dégradés animés -->
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-purple-900/20 via-gray-950 to-black"></div>
    <div class="absolute top-0 right-0 w-[25rem] h-[25rem] bg-pink-500/20 blur-3xl rounded-full animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-[20rem] h-[20rem] bg-purple-700/20 blur-3xl rounded-full animate-pulse"></div>

    <!-- Intro -->
    <div class="text-center max-w-3xl mx-auto mb-12">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-snug drop-shadow-lg
                   opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                               $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                               $el.classList.remove('opacity-100','translate-y-0')">
            {{ $callToAction['title'] }}
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

    <!-- Formulaire rendez-vous -->
    <div class="max-w-4xl mx-auto bg-gray-900/70 backdrop-blur-xl rounded-3xl shadow-lg border border-gray-800 p-8 md:p-12
                transform hover:scale-[1.01] transition duration-500">
        <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                        {{ $field['label'] }} @if($field['required']) <span class="text-pink-500">*</span> @endif
                    </label>

                    @if($field['type'] === 'textarea')
                        <textarea id="{{ $field['name'] }}" name="{{ $field['name'] }}" rows="4"
                                  class="w-full px-4 py-3 rounded-xl bg-gray-800 text-gray-100 border border-gray-700 focus:ring-2
                                         focus:ring-pink-500 focus:border-pink-500 resize-none transition"></textarea>
                    @else
                        <input type="{{ $field['type'] }}" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                               class="w-full px-4 py-3 rounded-xl bg-gray-800 text-gray-100 border border-gray-700
                                      focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition">
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
                <button type="submit"
                        class="px-8 py-4 text-lg font-semibold rounded-full bg-gradient-to-r from-purple-600 to-pink-500
                               text-white shadow-lg shadow-pink-500/30 hover:scale-105 transition-transform duration-300">
                    {{ $callToAction['button'] }}
                </button>
            </div>
        </form>
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
