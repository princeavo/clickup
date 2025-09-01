@props([
  'id' => 'scroll-hero',
  'title' => "Ton prospect scrolle ? Nous faisons en sorte qu’il s’arrête… clique… et achète.",
  // image: chemin absolu ou Storage::url(...)
  'image' => null,
  // lien WhatsApp
  'whatsapp' => 'https://wa.me/33600000000',
  // configuration de l'effet
  'maxRotate' => 6,      // inclinaison max en degrés (vers la droite)
  'maxTranslate' => 64,  // translation max en px (parallax douce)
  'startProgress' => 0.20 // à partir de 20% de la section visible, l'effet démarre
])

<section
  id="{{ $id }}"
  class="relative py-20 bg-[#04131c] overflow-visible"
  data-rotate-to="{{ $maxRotate }}"
  data-translate-to="{{ $maxTranslate }}"
  data-start-progress="{{ $startProgress }}"
>
  {{-- Slogan / USP --}}
  <div class="text-center max-w-5xl mx-auto px-4">
    <h2 class="text-white font-bold leading-tight text-2xl sm:text-3xl lg:text-5xl">
      {{ $title }}
    </h2>
  </div>

  {{-- Wrapper avec perspective pour un rendu premium --}}
  <div class="relative mt-12 flex justify-center perspective-1200">
    <img
      src="{{ $image ? (Str::startsWith($image, ['http://', 'https://', '/']) ? $image : Storage::url($image)) : asset('images/placeholder.png') }}"
      alt="Illustration section"
      class="tilt-follow will-change-transform transition-transform duration-200
             w-[92%] sm:w-[84%] md:w-[76%] lg:w-[66%]
             drop-shadow-[0_15px_35px_rgba(0,0,0,0.45)]"
      style="transform-origin: center bottom;"
    />
  </div>

  {{-- Bouton WhatsApp flottant --}}
  <a href="{{ $whatsapp }}" target="_blank" aria-label="Contact WhatsApp"
     class="fixed bottom-6 right-6 z-50 rounded-full p-4 bg-green-500 text-white shadow-lg
            hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 transition">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="currentColor" aria-hidden="true">
      <path d="M20.52 3.48A11.94 11.94 0 0 0 12.02 0C5.42 0 .09 5.33.09 11.92c0 2.1.56 4.12 1.62 5.93L0 24l6.32-1.66a11.9 11.9 0 0 0 5.7 1.45h.01c6.6 0 11.93-5.33 11.93-11.92a11.86 11.86 0 0 0-3.44-8.37ZM12.02 22.1a9.9 9.9 0 0 1-5.05-1.39l-.36-.21-3.75.98 1-3.65-.24-.38a9.91 9.91 0 0 1-1.57-5.53c0-5.46 4.45-9.9 9.97-9.9 2.66 0 5.16 1.04 7.04 2.92a9.86 9.86 0 0 1 2.93 7.01c0 5.46-4.45 9.9-9.97 9.9Zm5.33-7.44c-.29.81-1.67 1.54-2.34 1.61-.6.06-1.39.09-3.98-.84-3.36-1.25-5.53-4.33-5.69-4.54-.16-.21-1.36-1.81-1.36-3.46 0-1.65.85-2.46 1.16-2.79.31-.33.67-.41.9-.41h.65c.2 0 .47.04.72.55.27.6.92 2.09 1 2.24.08.15.12.33.02.53-.1.21-.15.33-.3.51-.15.18-.32.4-.46.54-.15.14-.3.3-.13.62.17.33.76 1.25 1.64 2.02 1.13 1 2.07 1.3 2.4 1.46.34.16.55.14.75-.09.2-.21.86-1 1.09-1.34.23-.33.46-.28.76-.19.3.09 2 .94 2.34 1.11.34.17.56.26.64.41.08.15.05.9-.23 1.71Z"/>
    </svg>
  </a>
</section>

{{-- Styles utilitaires (scopés au composant) --}}
<style>
  .perspective-1200 { perspective: 1200px; transform-style: preserve-3d; }
  @media (prefers-reduced-motion: reduce) {
    #{{ $id }} .tilt-follow { transition: none !important; transform: rotateZ(2deg); }
  }
</style>

{{-- Effet "je deviens visible puis je m'incline quand on scrolle un peu plus" --}}
<script>
(() => {
  const section = document.getElementById(@json($id));
  if (!section) return;
  const img = section.querySelector('.tilt-follow');
  if (!img) return;

  const MAX_ROT   = parseFloat(section.dataset.rotateTo || 6);    // degrés
  const MAX_TRANS = parseFloat(section.dataset.translateTo || 64);// px
  const START_P   = Math.min(0.9, Math.max(0, parseFloat(section.dataset.startProgress || 0.2)));

  // throttle avec rAF
  let ticking = false;
  let active = false;
  let triggerY = 0; // position absolue (px) où l'effet démarre
  let rangePx = 1;  // étendue de scroll qui mappe 0 -> 1

  const computeBounds = () => {
    const rect = section.getBoundingClientRect();
    const absTop = window.scrollY + rect.top;
    // Démarre l'effet quand on a commencé à scroller à l'intérieur de la section
    triggerY = absTop + rect.height * START_P;
    // Étendue: du start jusqu'à la fin de la section (avec un petit +viewport pour douceur)
    rangePx = rect.height * (1 - START_P) + window.innerHeight * 0.25;
  };

  const clamp01 = (v) => Math.max(0, Math.min(1, v));

  const update = () => {
    if (!active) return;
    const y = window.scrollY;
    // progress = 0 tant qu'on n'a pas "un peu" scrollé après que la section soit visible
    const progress = clamp01((y - triggerY) / rangePx);
    const rot = progress * MAX_ROT;         // 0 -> MAX_ROT (vers la droite)
    const ty  = progress * MAX_TRANS;       // légère descente
    img.style.transform = `rotateZ(${rot}deg) translateY(${ty}px)`;
    ticking = false;
  };

  const onScroll = () => {
    if (ticking || !active) return;
    ticking = true;
    requestAnimationFrame(update);
  };

  // Active l’effet uniquement quand la section est dans le viewport
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
      if (e.isIntersecting) {
        active = true;
        computeBounds();
        update(); // état initial (rotation 0)
      } else {
        active = false;
      }
    });
  }, { threshold: [0, 0.25, 0.5, 0.75, 1] });

  // Respect "prefers-reduced-motion"
  if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    img.style.transform = 'rotateZ(2deg)'; // statique, léger
    return;
  }

  io.observe(section);
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', () => { computeBounds(); onScroll(); });
  // Pré-calcul au chargement
  computeBounds(); update();
})();
</script>
