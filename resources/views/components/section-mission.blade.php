@props([
  'title' => '',
  'subtitle' => '',
  'values' => []
])

<section class="relative bg-gradient-to-b from-white to-gray-50 dark:from-[#0b1520] dark:to-[#101820] py-24 overflow-hidden">
  <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-12 text-center">

    {{-- Intro Mission --}}
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white
               opacity-0 translate-y-6 transition-all duration-700 ease-out"
        x-data
        x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                           $el.classList.add('opacity-100','translate-y-0')"
        x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                           $el.classList.remove('opacity-100','translate-y-0')">
      {{ $title }}
    </h2>

    <p class="mt-4 text-lg md:text-xl text-gray-600 dark:text-gray-300
              opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
       x-data
       x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                          $el.classList.add('opacity-100','translate-y-0')"
       x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                          $el.classList.remove('opacity-100','translate-y-0')">
      {{ $subtitle }}
    </p>

    {{-- Valeurs --}}
    <div class="mt-16 grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
      @foreach($values as $index => $value)
        @php
          $direction = $index % 3 === 0 ? '-translate-x-10'
                     : ($index % 3 === 1 ? 'translate-y-10'
                     : 'translate-x-10');
        @endphp

        <div class="group bg-white dark:bg-[#0f1a28] rounded-2xl p-8 shadow-lg relative overflow-hidden
                    opacity-0 scale-95 {{ $direction }}
                    transition-all duration-700 ease-out hover:-translate-y-3 hover:shadow-2xl"
             style="transition-delay: {{ $index * 200 }}ms"
             x-data
             x-intersect:enter="$el.classList.remove('opacity-0','scale-95','-translate-x-10','translate-x-10','translate-y-10');
                                $el.classList.add('opacity-100','scale-100')"
             x-intersect:leave="$el.classList.add('opacity-0','scale-95','{{ $direction }}');
                                $el.classList.remove('opacity-100')">

          {{-- Glow border animée --}}
          <div class="absolute inset-0 rounded-2xl border-2 border-transparent
                      group-hover:border-purple-500 group-hover:shadow-[0_0_20px_rgba(168,85,247,0.6)]
                      transition"></div>

          {{-- Icône --}}
          <div class="text-purple-600 dark:text-purple-400 text-4xl mb-6">
            <i class="{{ $value['icon'] }}"></i>
          </div>

          {{-- Titre --}}
          <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
            {{ $value['title'] }}
          </h3>

          {{-- Description --}}
          <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
            {{ $value['description'] }}
          </p>
        </div>
      @endforeach
    </div>
  </div>
</section>
