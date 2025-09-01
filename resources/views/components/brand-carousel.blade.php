{{-- resources/views/components/brand-carousel.blade.php --}}
@props([
  'brands' => [],
  // vitesse en pixels/seconde
  'speed' => 60,
  // fondu aux bords
  'fade' => true,
  // pause au survol
  'pauseOnHover' => false,
  // classes de gap tailwind entre logos (réutilisable)
  'gapClass' => 'gap-12 sm:gap-16',
])

<section class="py-8 overflow-hidden {{ $pauseOnHover ? 'group/marquee' : '' }}" data-marquee data-speed="{{ $speed }}">
  <div class="relative">
    <!-- Piste -->
    <div class="flex items-center select-none will-change-transform" data-track>
      <!-- Groupe A -->
      <div class="flex items-center {{ $gapClass }} shrink-0 min-w-max" data-group>
        @foreach ($brands as $brand)
          <img
            src="{{ Storage::url($brand['logo']) }}"
            alt="{{ $brand['name'] }}"
            class="h-10 sm:h-12 w-auto flex-none object-contain grayscale hover:grayscale-0 transition"
            loading="lazy"
          />
        @endforeach
      </div>
      <!-- Groupe B (clone) -->
      <div class="flex items-center {{ $gapClass }} shrink-0 min-w-max" aria-hidden="true">
        @foreach ($brands as $brand)
          <img
            src="{{ Storage::url($brand['logo']) }}"
            alt=""
            class="h-10 sm:h-12 w-auto flex-none object-contain grayscale hover:grayscale-0 transition"
            loading="lazy"
          />
        @endforeach
      </div>
    </div>

    @if ($fade)
      <!-- Masque de fondu (peut rester quel que soit le fond) -->
      <div class="pointer-events-none absolute inset-y-0 left-0 w-16 sm:w-24 bg-gradient-to-r from-white to-transparent"></div>
      <div class="pointer-events-none absolute inset-y-0 right-0 w-16 sm:w-24 bg-gradient-to-l from-white to-transparent"></div>
    @endif
  </div>

  <script>
    (() => {
      const root  = document.currentScript.closest('[data-marquee]');
      if (!root) return;
      const track = root.querySelector('[data-track]');
      const group = root.querySelector('[data-group]');
      let speed   = parseFloat(root.dataset.speed) || 60; // px/s

      let pos = 0;          // position actuelle (px)
      let w   = 0;          // largeur du groupe A
      let raf = null;
      let last = performance.now();

      function measure() {
        w = Math.ceil(group.getBoundingClientRect().width);
      }

      function step(now) {
        const dt = (now - last) / 1000;
        last = now;
        // avance fluide
        pos -= speed * dt;
        // repositionnement sans reset (continu)
        if (w && pos <= -w) pos += w;
        track.style.transform = `translate3d(${pos}px,0,0)`;
        raf = requestAnimationFrame(step);
      }

      function start() {
        cancelAnimationFrame(raf);
        measure();
        pos = 0;
        last = performance.now();
        raf = requestAnimationFrame(step);
      }

      // attendre images pour mesurer correctement
      const imgs = root.querySelectorAll('img');
      let pending = 0;
      imgs.forEach(img => {
        if (!img.complete) {
          pending++;
          const done = () => { if (--pending === 0) start(); };
          img.addEventListener('load', done, { once: true });
          img.addEventListener('error', done, { once: true });
        }
      });
      if (pending === 0) start();

      // recalcul au resize
      let rId;
      window.addEventListener('resize', () => {
        cancelAnimationFrame(raf);
        clearTimeout(rId);
        rId = setTimeout(() => { start(); }, 120);
      });

      // pause au survol (optionnel)
      if (root.classList.contains('group/marquee')) {
        root.addEventListener('mouseenter', () => cancelAnimationFrame(raf));
        root.addEventListener('mouseleave', () => { last = performance.now(); raf = requestAnimationFrame(step); });
      }

      // accessibilité
      if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        cancelAnimationFrame(raf);
        track.style.transform = 'none';
      }
    })();
  </script>
</section>
