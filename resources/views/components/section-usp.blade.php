@props([
  'id' => 'section-usp',
  'title' => "Ton prospect scrolle ? Nous faisons en sorte qu’il s’arrête… clique… et achète.",
  'subtitle' => null,
  'image' => null,
  'whatsapp' => 'https://wa.me/33612345678',
  'cfg' => [
    'rotateZ' => 8,
    'rotateX' => -10,
    'translateY' => 72,
    'scaleFrom' => 0.98,
    'scaleTo' => 1.04,
    'startProgress' => 0.18,
    'glossWidth' => 140,
    'stagger' => 55,
  ]
])

@php
  $imgSrc = $image
    ? (Str::startsWith($image, ['http://','https://','/']) ? $image : Storage::url($image))
    : asset('images/placeholder.png');
@endphp

<section
  id="{{ $id }}"
  class="relative overflow-visible bg-[#04131c] py-20 sm:py-24"
  style="--usp-stagger: {{ (int)($cfg['stagger'] ?? 55) }}ms;"
  data-rotate-z="{{ $cfg['rotateZ'] ?? 8 }}"
  data-rotate-x="{{ $cfg['rotateX'] ?? -10 }}"
  data-translate-y="{{ $cfg['translateY'] ?? 72 }}"
  data-scale-from="{{ $cfg['scaleFrom'] ?? 0.98 }}"
  data-scale-to="{{ $cfg['scaleTo'] ?? 1.04 }}"
  data-start-p="{{ $cfg['startProgress'] ?? 0.18 }}"
  data-gloss-w="{{ $cfg['glossWidth'] ?? 140 }}"
>
  <div class="max-w-6xl mx-auto px-4">
    {{-- TITRE + SOUS-TITRE --}}
    <div class="text-center">
      <h2 class="usp-title reveal-words font-bold leading-tight
                 text-3xl sm:text-4xl md:text-5xl lg:text-6xl">
        {{ $title }}
      </h2>
      @if($subtitle)
        <p class="mt-5 text-base sm:text-lg text-slate-300/90 reveal-words">
          {{ $subtitle }}
        </p>
      @endif
    </div>

    {{-- IMAGE CENTRÉE --}}
    <div class="relative mt-14 sm:mt-16 flex justify-center perspective-1400">
      <div class="relative inline-block">
        <img
          src="{{ $imgSrc }}"
          alt="Illustration USP"
          class="usp-img mx-auto block will-change-transform transition-transform duration-150
                 w-[92%] sm:w-[84%] md:w-[76%] lg:w-[64%] xl:w-[56%]
                 rounded-[24px] md:rounded-[28px] lg:rounded-[32px]
                 shadow-[0_25px_60px_rgba(0,0,0,0.55)]"
          style="transform-origin: center bottom;"
        />
        <div class="usp-gloss pointer-events-none"></div>
      </div>
    </div>
  </div>

  {{-- Bouton WhatsApp flottant --}}
  <a href="{{ $whatsapp }}" target="_blank" aria-label="Contact WhatsApp"
     class="fixed bottom-6 right-6 z-[60] rounded-full p-4 bg-green-500 text-white shadow-xl
            hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 transition">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
         class="w-6 h-6" fill="currentColor" aria-hidden="true">
      <path d="M20.52 3.48A11.94 11.94 0 0 0 12.02 0C5.42 0 .09 5.33.09 11.92c0 2.1.56 4.12 1.62 5.93L0 24l6.32-1.66a11.9 11.9 0 0 0 5.7 1.45h.01c6.6 0 11.93-5.33 11.93-11.92a11.86 11.86 0 0 0-3.44-8.37ZM12.02 22.1a9.9 9.9 0 0 1-5.05-1.39l-.36-.21-3.75.98 1-3.65-.24-.38a9.91 9.91 0 0 1-1.57-5.53c0-5.46 4.45-9.9 9.97-9.9 2.66 0 5.16 1.04 7.04 2.92a9.86 9.86 0 0 1 2.93 7.01c0 5.46-4.45 9.9-9.97 9.9Zm5.33-7.44c-.29.81-1.67 1.54-2.34 1.61-.6.06-1.39.09-3.98-.84-3.36-1.25-5.53-4.33-5.69-4.54-.16-.21-1.36-1.81-1.36-3.46 0-1.65.85-2.46 1.16-2.79.31-.33.67-.41.9-.41h.65c.2 0 .47.04.72.55.27.6.92 2.09 1 2.24.08.15.12.33.02.53-.1.21-.15.33-.3.51-.15.18-.32.4-.46.54-.15.14-.3.3-.13.62.17.33.76 1.25 1.64 2.02 1.13 1 2.07 1.3 2.4 1.46.34.16.55.14.75-.09.2-.21.86-1 1.09-1.34.23-.33.46-.28.76-.19.3.09 2 .94 2.34 1.11.34.17.56.26.64.41.08.15.05.9-.23 1.71Z"/>
    </svg>
  </a>
</section>

<style>
  #{{ $id }} .perspective-1400 { perspective: 1400px; transform-style: preserve-3d; }

  #{{ $id }} .usp-title {
    --grad: linear-gradient(90deg, #c084fc, #ec4899);
    background: var(--grad);
    -webkit-background-clip: text;
    background-clip: text;
    /* color: transparent; */
    color: #fff;
    text-shadow: 0 0 0 rgba(255,255,255,0.05);
    letter-spacing: 0.015em;
    transition: letter-spacing 700ms cubic-bezier(.22,.65,.3,1);
  }

  #{{ $id }} .reveal-words .word {
    display: inline-block;
    white-space: pre;
    transform: translateY(26px) rotateZ(1deg);
    opacity: 0;
    filter: blur(2px);
    transition: transform 600ms cubic-bezier(.22,.65,.3,1),
                opacity 600ms ease,
                filter 600ms ease;
  }
  #{{ $id }} .reveal-words.in .word {
    transform: translateY(0) rotateZ(0);
    opacity: 1;
    filter: blur(0);
  }
  #{{ $id }} .reveal-words.in.usp-title { letter-spacing: 0.003em; }

  #{{ $id }} .usp-gloss {
    position: absolute;
    inset: 0;
    border-radius: inherit;
    overflow: hidden;
    pointer-events: none;
  }
  #{{ $id }} .usp-gloss::before {
    content: "";
    position: absolute;
    top: -20%;
    height: 140%;
    width: calc(var(--gloss-w, 140) * 1%);
    transform: translateX(calc((-120% + (220% * var(--p, 0)))));
    background: linear-gradient(105deg,
      rgba(255,255,255,0) 0%,
      rgba(255,255,255,.08) 45%,
      rgba(255,255,255,.28) 50%,
      rgba(255,255,255,.08) 55%,
      rgba(255,255,255,0) 100%);
    filter: blur(8px);
    border-radius: 32px;
  }

  @media (prefers-reduced-motion: reduce) {
    #{{ $id }} .reveal-words .word { transition: none; transform: none !important; opacity: 1 !important; filter: none !important; }
    #{{ $id }} .usp-title { transition: none; }
    #{{ $id }} .usp-img { transition: none; transform: none !important; }
    #{{ $id }} .usp-gloss::before { display: none; }
  }
</style>

<script>
(() => {
  const root = document.getElementById(@json($id));
  if (!root) return;

  const img = root.querySelector('.usp-img');
  const gloss = root.querySelector('.usp-gloss');

  const ROT_Z = parseFloat(root.dataset.rotateZ || 8);
  const ROT_X = parseFloat(root.dataset.rotateX || -10);
  const TY    = parseFloat(root.dataset.translateY || 72);
  const SFROM = parseFloat(root.dataset.scaleFrom || 0.98);
  const STO   = parseFloat(root.dataset.scaleTo || 1.04);
  const START = Math.min(0.95, Math.max(0, parseFloat(root.dataset.startP || 0.18)));
  const GLOSS_W = parseFloat(root.dataset.glossW || 140);

  const split = (el) => {
    const text = el.textContent.trim().replace(/\s+/g,' ').split(' ');
    el.textContent = '';
    text.forEach((w, i) => {
      const span = document.createElement('span');
      span.className = 'word';
      span.style.whiteSpace = 'pre';
      span.style.transitionDelay = `${i * parseInt(getComputedStyle(root).getPropertyValue('--usp-stagger'))}ms`;
      span.textContent = w + (i < text.length-1 ? ' ' : '');
      el.appendChild(span);
    });
  };
  root.querySelectorAll('.reveal-words').forEach(split);

  const wordObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) e.target.classList.add('in');
    });
  }, { threshold: 0.25 });
  root.querySelectorAll('.reveal-words').forEach(el => wordObserver.observe(el));

  let ticking = false, active = false, triggerY = 0, rangePx = 1;

  const clamp01 = v => Math.max(0, Math.min(1, v));
  const mix = (a,b,t) => a + (b-a)*t;

  const computeBounds = () => {
    const rect = root.getBoundingClientRect();
    const absTop = window.scrollY + rect.top;
    triggerY = absTop + rect.height * START;
    rangePx  = rect.height * (1 - START) + window.innerHeight * 0.25;
    gloss?.style.setProperty('--gloss-w', GLOSS_W);
  };

  const update = () => {
    if (!active) return;
    const y = window.scrollY;
    const p = clamp01((y - triggerY) / rangePx);
    const rz = p * ROT_Z;
    const rx = p * ROT_X;
    const ty = p * TY;
    const sc = mix(SFROM, STO, p);
    const sat = 0.95 + p * 0.25;
    const bri = 0.95 + p * 0.08;

    img.style.transform = `translateY(${ty}px) rotateX(${rx}deg) rotateZ(${rz}deg) scale(${sc})`;
    img.style.filter = `saturate(${sat}) brightness(${bri})`;
    gloss?.style.setProperty('--p', p);

    ticking = false;
  };

  const onScroll = () => {
    if (!active || ticking) return;
    ticking = true;
    requestAnimationFrame(update);
  };

  const secObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        active = true;
        computeBounds();
        update();
      } else {
        active = false;
      }
    });
  }, { threshold: [0, .25, .5, .75, 1] });

  if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    return;
  }

  secObserver.observe(root);
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', () => { computeBounds(); onScroll(); });
  computeBounds(); update();
})();
</script>
