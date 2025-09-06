@props([
  'badge' => null,
  'title' => '',
  'subtitle' => '',
  'buttonText' => 'Obtenir ton rdv (GRATUIT)',
  'buttonLink' => '#rendezvous',
  'image' => null,
  'imageAlt' => 'Illustration'
])

<section class="relative overflow-hidden bg-[#0b1520]">
  {{-- Glow & grille discrets en fond --}}
  <div class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-purple-600/25 blur-3xl"></div>
    <div class="absolute -bottom-24 -right-10 h-[28rem] w-[28rem] rounded-full bg-fuchsia-600/20 blur-3xl"></div>
    <div class="absolute inset-0 opacity-[0.08]"
         style="background-image: radial-gradient(circle at 1px 1px, #ffffff 1px, transparent 0);
                background-size: 20px 20px;"></div>
  </div>

  <div
    class="max-w-7xl mx-auto px-6 md:px-10 lg:px-12 py-24 md:py-28 flex flex-col-reverse lg:flex-row items-center gap-12"
    x-data="{mx:0,my:0}"
  >
    {{-- Colonne texte --}}
    <div class="flex-1 w-full motion-safe:animate-hero-reveal-left">
      @if($badge)
        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-medium text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
          {{ $badge }}
        </span>
      @endif

      <h1 class="mt-4 text-3xl md:text-5xl font-extrabold tracking-tight text-white leading-tight">
        {!! $title !!}
      </h1>

      <p class="mt-5 text-lg md:text-xl text-gray-300/90 max-w-2xl">
        {!! $subtitle !!}
      </p>

      {{-- CTA : bordure dégradée animée + micro-hover --}}
      <a href="{{ $buttonLink }}"
         class="group relative mt-8 inline-flex select-none rounded-xl p-[2px] focus:outline-none focus-visible:ring-2 focus-visible:ring-purple-400/60">
        <span class="absolute inset-0 rounded-xl bg-gradient-to-r from-purple-500 via-fuchsia-500 to-pink-500 opacity-80 transition-opacity duration-300 group-hover:opacity-100"></span>
        <span class="relative rounded-[10px] bg-[#0f1c2a] px-7 py-4 text-base md:text-lg font-semibold text-white shadow-[0_8px_24px_rgba(139,92,246,0.25)]
                     transition-transform duration-300 group-hover:translate-y-[-1px] group-active:translate-y-[0px]">
          {{ $buttonText }}
        </span>
      </a>
    </div>

    {{-- Colonne image (micro-parallax au mouvement de la souris) --}}
    <div class="flex-1 w-full relative motion-safe:animate-hero-reveal-right"
         @mousemove="mx = $event.offsetX; my = $event.offsetY"
    >
      <div class="absolute -inset-4 rounded-3xl bg-gradient-to-tr from-purple-600/20 to-pink-500/20 blur-2xl"></div>
      <div class="relative aspect-[4/5] w-full max-w-md mx-auto overflow-hidden rounded-3xl border border-white/10 bg-white/5">
        <img
          src="{{ $image ?? asset('images/hero-agence.png') }}"
          alt="{{ $imageAlt }}"
          loading="lazy"
          class="h-full w-full object-cover will-change-transform transition-transform duration-500 ease-out"
          :style="'transform: perspective(1000px) translate3d(' + ((mx-150)/30) + 'px,' + ((my-150)/30) + 'px,0) rotateX(' + ((my-150)/80) + 'deg) rotateY(' + ((mx-150)/-80) + 'deg) scale(1.02);'"
        />
      </div>
    </div>
  </div>
</section>
