@props(['title', 'subtitle', 'cta', 'background'])

<section class="relative bg-cover bg-center text-center text-white min-h-screen flex items-center"
         style="background-image: linear-gradient(180deg,#fff0,#04131c)">
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/60"></div>

  <div class="relative z-10 max-w-3xl mx-auto px-4">
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-snug mb-6">
      {{ $title }}
    </h1>
    <p class="text-base sm:text-lg lg:text-xl mb-8">
      {{ $subtitle }}
    </p>
    <a href="#contact"
       class="bg-gradient-to-r from-purple-600 to-pink-500 px-6 py-3 rounded-full font-semibold shadow-lg hover:opacity-90 transition inline-block">
       {{ $cta }}
    </a>
  </div>
</section>
