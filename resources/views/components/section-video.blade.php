@props([
  'title' => '',
  'videoUrl' => '',
  'thumbnail' => null,
  'ctaText' => 'Regarder la vidéo'
])

<section class="relative bg-[#0b1520] py-24 overflow-hidden">
  {{-- Halo en fond --}}
  <div class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute top-0 left-1/3 w-[40rem] h-[40rem] bg-purple-600/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-[30rem] h-[30rem] bg-pink-500/20 rounded-full blur-3xl"></div>
  </div>

  <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-12 text-center">
    <h2 class="text-3xl md:text-4xl font-extrabold text-white motion-safe:animate-fade-up">
      {{ $title }}
    </h2>

    {{-- Player vidéo --}}
    <div x-data="{ open: false }" class="mt-12 flex justify-center">
      <div class="relative group w-full max-w-4xl aspect-video overflow-hidden rounded-2xl shadow-2xl">
        @if($thumbnail)
          <img src="{{ $thumbnail }}" alt="Vidéo {{ $title }}"
               class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
        @endif

        {{-- Overlay sombre --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/20"></div>

        {{-- Bouton play avec effet pulsation --}}
        <button @click="open = true"
                class="absolute inset-0 flex items-center justify-center cursor-pointer">
          <span class="relative flex h-20 w-20">
            <span class="absolute inline-flex h-full w-full rounded-full bg-purple-500 opacity-75 animate-ping"></span>
            <span class="relative inline-flex rounded-full h-20 w-20 bg-purple-600 hover:bg-purple-700 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white m-auto" viewBox="0 0 24 24" fill="currentColor">
                <path d="M8 5v14l11-7z" />
              </svg>
            </span>
          </span>
        </button>
      </div>

      {{-- Modal vidéo --}}
      <template x-if="open">
        <div x-transition
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4">
          {{-- <div class="relative w-full max-w-4xl aspect-video">
            <iframe class="w-full h-full rounded-xl shadow-lg"
                    src="{{ $videoUrl }}?autoplay=1"
                    title="Vidéo - {{ $title }}"
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen></iframe>

            <button @click="open = false"
                    class="absolute -top-4 -right-4 bg-white text-black rounded-full p-3 hover:bg-gray-200 transition w-10 h-10 flex items-center justify-center cursor-pointer">
              ✕
            </button>
          </div> --}}

          <div class="relative w-full max-w-4xl aspect-video sm:aspect-video sm:h-auto h-[80vh]">
  <iframe class="w-full h-full rounded-xl shadow-lg"
          src="{{ $videoUrl }}?autoplay=1"
          title="Vidéo - {{ $title }}"
          frameborder="0"
          allow="autoplay; encrypted-media"
          allowfullscreen></iframe>
           <button @click="open = false"
                    class="absolute -top-4 -right-4 bg-white text-black rounded-full p-3 hover:bg-gray-200 transition w-10 h-10 flex items-center justify-center cursor-pointer">
              ✕
            </button>
</div>

        </div>
      </template>
    </div>
  </div>
</section>
