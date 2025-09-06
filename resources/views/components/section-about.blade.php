@props([
  'title' => '',
  'intro' => '',
  'subtitle' => '',
  'team' => []
])

<section class="relative bg-white dark:bg-[#0b1520] py-24 overflow-hidden">
  <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-12">

    {{-- Titre storytelling --}}
    <h2 class="text-center text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white motion-safe:animate-fade-up">
      {{ $title }}
    </h2>

    {{-- Intro texte --}}
    <p class="mt-8 text-lg md:text-xl text-gray-600 dark:text-gray-300 leading-relaxed max-w-4xl mx-auto motion-safe:animate-fade-up">
      {!! nl2br(e($intro)) !!}
    </p>

    {{-- Sous-titre --}}
    <h3 class="mt-12 text-center text-xl font-semibold text-purple-600 dark:text-purple-400 motion-safe:animate-fade-up">
      {{ $subtitle }}
    </h3>

    {{-- Grille équipe --}}
    <div class="mt-16 grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
      @foreach($team as $member)
        <div class="group relative bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-[#101820] rounded-2xl shadow-lg overflow-hidden transition transform hover:-translate-y-2 hover:shadow-2xl motion-safe:animate-fade-up">

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
