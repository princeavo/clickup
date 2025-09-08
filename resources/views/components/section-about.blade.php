@props([
  'title' => '',
  'intro' => '',
  'subtitle' => '',
  'team' => []
])

<section class="relative bg-white dark:bg-[#0b1520] py-24 overflow-hidden">
  <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-12">

    {{-- Titre storytelling --}}
    <h2 class="text-center text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white
               opacity-0 translate-y-6 transition-all duration-700 ease-out"
        x-data
        x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                           $el.classList.add('opacity-100','translate-y-0')"
        x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                           $el.classList.remove('opacity-100','translate-y-0')">
      {{ $title }}
    </h2>

    {{-- Intro texte --}}
    <p class="mt-8 text-lg md:text-xl text-gray-600 dark:text-gray-300 leading-relaxed max-w-4xl mx-auto
              opacity-0 translate-y-6 transition-all duration-700 ease-out delay-150"
       x-data
       x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                          $el.classList.add('opacity-100','translate-y-0')"
       x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                          $el.classList.remove('opacity-100','translate-y-0')">
      {!! nl2br(e($intro)) !!}
    </p>

    {{-- Sous-titre --}}
    <h3 class="mt-12 text-center text-xl font-semibold text-purple-600 dark:text-purple-400
               opacity-0 translate-y-6 transition-all duration-700 ease-out delay-300"
        x-data
        x-intersect:enter="$el.classList.remove('opacity-0','translate-y-15');
                           $el.classList.add('opacity-100','translate-y-0')"
        x-intersect:leave="$el.classList.add('opacity-0','translate-y-15');
                           $el.classList.remove('opacity-100','translate-y-0')">
      {{ $subtitle }}
    </h3>

    {{-- Grille équipe --}}
    <div class="mt-16 grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
      @foreach($team as $i => $member)
        <div class="group relative bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-[#101820] rounded-2xl shadow-lg overflow-hidden
                    opacity-0 translate-y-10 transition-all duration-700 ease-out
                    hover:-translate-y-2 hover:shadow-2xl"
             style="transition-delay: {{ $i * 150 }}ms"
             x-data
             x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10');
                                $el.classList.add('opacity-100','translate-y-0')"
             x-intersect:leave="$el.classList.add('opacity-0','translate-y-10');
                                $el.classList.remove('opacity-100','translate-y-0')">

          {{-- Photo --}}
          <div class="aspect-square overflow-hidden">
            <img src="{{ $member['photo'] }}" alt="{{ $member['name'] }}"
                 class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
          </div>

          {{-- Overlay gradient subtil --}}
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition"></div>

          {{-- Infos membre --}}
          <div class="p-6 text-center relative z-10">
            <h4 class="text-lg font-bold text-gray-900 dark:text-white">{{ $member['name'] }}</h4>
            <p class="text-purple-600 dark:text-purple-400 font-medium mt-1">{{ $member['role'] }}</p>
            <p class="text-gray-500 dark:text-gray-300 text-sm">{{ $member['position'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
