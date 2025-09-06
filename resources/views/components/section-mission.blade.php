@props([
  'title' => '',
  'subtitle' => '',
  'values' => []
])

<section class="relative bg-gradient-to-b from-white to-gray-50 dark:from-[#0b1520] dark:to-[#101820] py-24 overflow-hidden">
  <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-12 text-center">

    {{-- Intro Mission --}}
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white motion-safe:animate-fade-up">
      {{ $title }}
    </h2>
    <p class="mt-4 text-lg md:text-xl text-gray-600 dark:text-gray-300 motion-safe:animate-fade-up">
      {{ $subtitle }}
    </p>

    {{-- Valeurs --}}
    <div class="mt-16 grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
      @foreach($values as $index => $value)
        <div class="group bg-white dark:bg-[#0f1a28] rounded-2xl p-8 shadow-lg transition transform hover:-translate-y-3 hover:shadow-2xl relative overflow-hidden motion-safe:animate-fade-up"
             style="animation-delay: {{ $index * 200 }}ms">

          {{-- Glow border animée --}}
          <div class="absolute inset-0 rounded-2xl border-2 border-transparent group-hover:border-purple-500 group-hover:shadow-[0_0_20px_rgba(168,85,247,0.6)] transition"></div>

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
