@props([
  'videoUrl' => '',
  'thumbnail' => null,
  'ctaText' => 'Regarder la vidéo',
])

<section
  class="relative bg-cover bg-center py-24 overflow-hidden"
  style="background-image: url('{{ asset('images/why-work-with-us-bg.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"
>
  {{-- Halo en fond orange --}}
  <div class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute top-0 left-1/3 w-[40rem] h-[40rem] bg-orange-600/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-[30rem] h-[30rem] bg-yellow-500/20 rounded-full blur-3xl"></div>
  </div>

  <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-12 text-center">

    {{-- Titre avec animation --}}
    <h2
      x-data="{ shown: false }"
      x-intersect:enter="shown = true"
      x-intersect:leave="shown = false"
      :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
      class="text-3xl md:text-4xl font-extrabold text-white transition-all duration-700 ease-out"
    >
      Pourquoi <span class="text-orange-400">travailler avec nous</span> ?
    </h2>

    <x-animated-highlight />

    {{-- Player vidéo avec animation --}}
    <div
      x-data="{ open: false, shown: false }"
      x-intersect:enter="shown = true"
      x-intersect:leave="shown = false"
      :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
      class="mt-12 flex justify-center transition-all duration-700 ease-out"
    >
      <div class="relative group w-full max-w-4xl aspect-video overflow-hidden rounded-2xl shadow-2xl">
        @if($thumbnail)
          <img src="{{ $thumbnail }}" alt="Vidéo"
               class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
        @endif

        {{-- Overlay sombre --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/20"></div>

        {{-- Bouton play avec effet pulsation --}}
        <button @click="open = true"
                class="absolute inset-0 flex items-center justify-center cursor-pointer">
          <span class="relative flex h-20 w-20">
            <span class="absolute inline-flex h-full w-full rounded-full bg-orange-500 opacity-75 animate-ping"></span>
            <span class="relative inline-flex rounded-full h-20 w-20 bg-orange-600 hover:bg-orange-700 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-orange-400 m-auto" viewBox="0 0 24 24" fill="currentColor">
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
          <div class="relative w-full max-w-4xl aspect-video sm:aspect-video sm:h-auto h-[80vh]">
            <iframe class="w-full h-full rounded-xl shadow-lg"
                    src="{{ $videoUrl }}?autoplay=1"
                    title="Vidéo"
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
