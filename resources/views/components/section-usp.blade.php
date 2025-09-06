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
  x-data="{ shown: false, progress: 0 }"
  x-intersect="shown = true"
  x-intersect:leave="shown = false"
  x-init="
    let sec = $el;
    let img = sec.querySelector('.usp-img');
    let gloss = sec.querySelector('.usp-gloss');

    const ROT_Z = {{ $cfg['rotateZ'] ?? 8 }};
    const ROT_X = {{ $cfg['rotateX'] ?? -10 }};
    const TY    = {{ $cfg['translateY'] ?? 72 }};
    const SFROM = {{ $cfg['scaleFrom'] ?? 0.98 }};
    const STO   = {{ $cfg['scaleTo'] ?? 1.04 }};
    const START = {{ $cfg['startProgress'] ?? 0.18 }};
    const GLOSS_W = {{ $cfg['glossWidth'] ?? 140 }};

    let triggerY = 0, rangePx = 1;
    const clamp01 = v => Math.max(0, Math.min(1, v));
    const mix = (a,b,t) => a + (b-a)*t;

    const computeBounds = () => {
      const rect = sec.getBoundingClientRect();
      const absTop = window.scrollY + rect.top;
      triggerY = absTop + rect.height * START;
      rangePx  = rect.height * (1 - START) + window.innerHeight * 0.25;
      gloss?.style.setProperty('--gloss-w', GLOSS_W);
    };

    const update = () => {
      const y = window.scrollY;
      const p = clamp01((y - triggerY) / rangePx);
      progress = p;

      // Effet image
      const rz = p * ROT_Z;
      const rx = p * ROT_X;
      const ty = p * TY;
      const sc = mix(SFROM, STO, p);
      const sat = 0.95 + p * 0.25;
      const bri = 0.95 + p * 0.08;

      img.style.transform = `translateY(${ty}px) rotateX(${rx}deg) rotateZ(${rz}deg) scale(${sc})`;
      img.style.filter = `saturate(${sat}) brightness(${bri})`;

      // Effet gloss
      gloss?.style.setProperty('--p', p);
    };

    computeBounds();
    update();

    window.addEventListener('scroll', () => { if (shown) update(); }, { passive: true });
    window.addEventListener('resize', () => { computeBounds(); update(); });

    // Split mots
    sec.querySelectorAll('.reveal-words').forEach(el => {
      const text = el.textContent.trim().split(' ');
      el.textContent = '';
      text.forEach((w, i) => {
        const span = document.createElement('span');
        span.className = 'word';
        span.style.transitionDelay = `${i * 70}ms`;
        span.textContent = w + (i < text.length-1 ? ' ' : '');
        el.appendChild(span);
      });
    });
  "
  class="relative overflow-visible bg-[#04131c] py-20 sm:py-24"
>
  <div class="max-w-6xl mx-auto px-4 text-center">
    <!-- TITRE -->
    <h2 class="usp-title reveal-words font-bold leading-tight
               text-3xl sm:text-4xl md:text-5xl lg:text-6xl"
        :class="shown ? 'in' : ''">
      {{ $title }}
    </h2>

    <!-- SOUS-TITRE -->
    @if($subtitle)
      <p class="mt-5 text-base sm:text-lg text-slate-300/90 reveal-words"
         :class="shown ? 'in' : ''">
        {{ $subtitle }}
      </p>
    @endif

    <!-- IMAGE -->
    <div class="relative mt-14 sm:mt-16 flex justify-center perspective-1400">
      <div class="relative inline-block">
        <img src="{{ $imgSrc }}" alt="Illustration USP"
             class="usp-img mx-auto block will-change-transform
                    w-[92%] sm:w-[84%] md:w-[76%] lg:w-[64%] xl:w-[56%]
                    rounded-[24px] md:rounded-[28px] lg:rounded-[32px]
                    shadow-[0_25px_60px_rgba(0,0,0,0.55)]"
             style="transform-origin: center bottom;" />
        <div class="usp-gloss pointer-events-none"></div>
      </div>
    </div>
  </div>
</section>

<style>
#{{ $id }} .perspective-1400 { perspective: 1400px; transform-style: preserve-3d; }

#{{ $id }} .usp-title {
  background: linear-gradient(90deg, #c084fc, #ec4899);
  -webkit-background-clip: text;
  background-clip: text;
  color: #fff;
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
</style>
