@props([
    'brands' => [],
    'speed' => 60,
    'fade' => true,
    'pauseOnHover' => false,
    'gapClass' => 'gap-12 sm:gap-16',
    'title' => 'Plus de <span class="text-orange-400 font-bold">50 marques accompagnées</span>',
    'threshold' => 10,
])

<section
    class="py-16 bg-black text-white overflow-hidden {{ $pauseOnHover ? 'group/marquee' : '' }}"
    @if(count($brands) > $threshold)
        data-marquee
        data-speed="{{ $speed }}"
    @endif
    x-data="{ shown: false }"
    x-intersect="shown = true"
    x-intersect:leave="shown = false">

    <div class="mx-auto text-center">
        <!-- Titre -->
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 transition-all duration-700"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            {!! $title !!}
        </h2>

        <!-- Ligne décorative -->
        <div class="w-20 h-[2px] mx-auto bg-orange-500 mb-12 transition-all duration-700"
            :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-50'"></div>

        @if (count($brands) > $threshold)
            <!-- Carrousel -->
            <div class="relative">
                <div class="flex items-center select-none will-change-transform" data-track>

                    <!-- Groupe A -->
                    <div class="flex items-center {{ $gapClass }} shrink-0 min-w-max" data-group>
                        @foreach ($brands as $brand)
                            <img src="{{ Storage::url($brand['logo']) }}"
                                 alt="{{ $brand['name'] }}"
                                 class="h-12 sm:h-32 w-auto flex-none object-contain grayscale hover:grayscale-0 transition duration-500"
                                 loading="lazy" />
                        @endforeach
                    </div>

                    <!-- Groupe B (clone) -->
                    <div class="flex items-center {{ $gapClass }} shrink-0 min-w-max" aria-hidden="true">
                        @foreach ($brands as $brand)
                            <img src="{{ Storage::url($brand['logo']) }}"
                                 alt=""
                                 class="h-12 sm:h-32 w-auto flex-none object-contain grayscale hover:grayscale-0 transition duration-500"
                                 loading="lazy" />
                        @endforeach
                    </div>
                </div>

                @if ($fade)
                    <!-- Masque dégradé -->
                    <div class="pointer-events-none absolute inset-y-0 left-0 w-16 sm:w-24 bg-gradient-to-r from-black to-transparent"></div>
                    <div class="pointer-events-none absolute inset-y-0 right-0 w-16 sm:w-24 bg-gradient-to-l from-black to-transparent"></div>
                @endif
            </div>
        @else
            <!-- Liste simple -->
            <div class="flex justify-center flex-wrap {{ $gapClass }}">
                @foreach ($brands as $brand)
                    <img src="{{ Storage::url($brand['logo']) }}"
                         alt="{{ $brand['name'] }}"
                         class="h-12 sm:h-32 w-auto object-contain grayscale hover:grayscale-0 transition duration-500"
                         loading="lazy" />
                @endforeach
            </div>
        @endif
    </div>

    @if (count($brands) > $threshold)
        <!-- Script d’animation -->
        <script>
            (() => {
                const root = document.currentScript.closest('[data-marquee]');
                if (!root) return;
                const track = root.querySelector('[data-track]');
                const group = root.querySelector('[data-group]');
                let speed = parseFloat(root.dataset.speed) || 60;

                let pos = 0, w = 0, raf = null, last = performance.now();

                function measure() { w = Math.ceil(group.getBoundingClientRect().width); }

                function step(now) {
                    const dt = (now - last) / 1000;
                    last = now;
                    pos -= speed * dt;
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

                let rId;
                window.addEventListener('resize', () => {
                    cancelAnimationFrame(raf);
                    clearTimeout(rId);
                    rId = setTimeout(() => start(), 120);
                });

                if (root.classList.contains('group/marquee')) {
                    root.addEventListener('mouseenter', () => cancelAnimationFrame(raf));
                    root.addEventListener('mouseleave', () => {
                        last = performance.now();
                        raf = requestAnimationFrame(step);
                    });
                }

                if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                    cancelAnimationFrame(raf);
                    track.style.transform = 'none';
                }
            })();
        </script>
    @endif
</section>
