@props([
    'title' => 'Témoignages',
    'subtitle' => null,
    'testimonials' => [],
    'cta' => ['text' => 'Voir plus', 'href' => '#'],
])

<section x-data="testimonialCarousel({ autoplay: true, interval: 6000 })" x-init="init()" @keydown.right.prevent="next()" @keydown.left.prevent="prev()"
    role="region" aria-label="Témoignages de clients" tabindex="0"
    class="relative w-full py-20 text-white overflow-hidden bg-gradient-to-b from-[#0a0f1c] via-[#0b0f1a] to-[#120a1a]">
    <!-- Décor lumineux -->
    <div class="pointer-events-none absolute -top-40 -left-40 w-96 h-96 rounded-full bg-purple-700/25 blur-3xl"></div>
    <div
        class="pointer-events-none absolute bottom-0 right-0 w-[550px] h-[550px] rounded-full bg-indigo-600/20 blur-3xl">
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-12">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
            <div class="text-center lg:text-left max-w-3xl mx-auto lg:mx-0">
                <h2 class="text-3xl md:text-5xl font-extrabold leading-tight opacity-0 translate-y-6 transition-all duration-700 ease-out"
                    x-intersect.once="$el.classList.remove('opacity-0','translate-y-6')">
                    {{ $title }}
                </h2>
                @if ($subtitle)
                    <p class="mt-4 text-gray-400 text-lg opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
                        x-intersect.once="$el.classList.remove('opacity-0','translate-y-6')">
                        {{ $subtitle }}
                    </p>
                @endif
            </div>

            <div class="text-center lg:text-right">
                <a href="{{ $cta['href'] ?? '#' }}"
                    class="inline-flex items-center gap-2 rounded-full px-5 py-2.5 font-semibold
                          bg-white/10 border border-white/15 backdrop-blur-md
                          hover:bg-white/15 hover:shadow-lg hover:shadow-purple-500/20
                          transition-all duration-300"
                    aria-label="{{ $cta['text'] ?? 'Voir plus' }}">
                    {{ $cta['text'] ?? 'Voir plus' }}
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Carousel -->
        <div class="relative mt-12">
            <!-- Track -->
            <div x-ref="scroller"
                class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory p-2
                       [-ms-overflow-style:none] [scrollbar-width:none]"
                style="-webkit-overflow-scrolling:touch;overflow-y: hidden;" @mouseenter="pause()" @mouseleave="play()">
                @foreach ($testimonials as $i => $t)
                    <article x-data="{ glowX: 50, glowY: 50, showGlow: false }"
                        @mousemove="glowX = $event.offsetX; glowY = $event.offsetY; showGlow = true"
                        @mouseleave="showGlow = false" data-slide="{{ $i }}"
                        class="relative snap-start md:snap-center shrink-0
                               basis-[85%] sm:basis-[70%] md:basis-[48%] lg:basis-[32%]
                               bg-white/8 border border-white/10 backdrop-blur-md
                               rounded-3xl p-7 md:p-8 text-left text-white
                               shadow-[0_20px_80px_-30px_rgba(124,58,237,0.25)]
                               transition-all duration-500 group
                               hover:-translate-y-1 hover:shadow-purple-500/30
                               opacity-0 translate-y-6 flex flex-col justify-between
                               overflow-hidden"
                        x-intersect.once="$el.classList.remove('opacity-0','translate-y-6')" role="group"
                        aria-roledescription="slide"
                        aria-label="Témoignage {{ $i + 1 }} sur {{ count($testimonials) }}">
                        <!-- Glow dynamique -->
                        <div class="absolute inset-0 pointer-events-none transition-opacity duration-300"
                            :style="showGlow
                                ?
                                `background: radial-gradient(circle at ${glowX}px ${glowY}px,
                                                                                                  rgba(139,92,246,0.25), transparent 60%); opacity:1;` :
                                'opacity:0;'">
                        </div>

                        <!-- Icône -->
                        <svg class="w-8 h-8 text-white/30 mb-4 relative z-10" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M7.17 6A5.17 5.17 0 0 0 2 11.17V22h8v-9H6.83A2.83 2.83 0 0 1 4 10.17 3.17 3.17 0 0 1 7.17 7h.66V6h-0.66Zm9 0A5.17 5.17 0 0 0 11 11.17V22h8v-9h-3.17A2.83 2.83 0 0 1 13 10.17 3.17 3.17 0 0 1 16.17 7h.66V6h-0.66Z" />
                        </svg>

                        <!-- Citation -->
                        <p class="text-base md:text-lg leading-relaxed text-gray-100/95 flex-1 relative z-10">
                            {{ $t['quote'] }}
                        </p>

                        <!-- Footer -->
                        <div class="mt-8 flex items-center justify-between relative z-10 flex-wrap">
                            <div class="flex items-center gap-3">
                                @php
                                    $initials = collect(explode(' ', $t['name'] ?? ''))
                                        ->map(fn($p) => mb_substr($p, 0, 1))
                                        ->take(2)
                                        ->implode('');
                                @endphp

                                @if (!empty($t['avatar']))
                                    <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}"
                                        class="w-10 h-10 rounded-full object-cover ring-2 ring-white/10">
                                @else
                                    <div
                                        class="w-10 h-10 rounded-full grid place-items-center bg-gradient-to-br from-indigo-500 to-purple-600 text-white/90 font-bold">
                                        {{ $initials }}
                                    </div>
                                @endif

                                <div>
                                    <div class="font-semibold">{{ $t['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $t['role'] }}</div>
                                </div>
                            </div>

                            <div class="flex items-center gap-0.5 text-amber-400 drop-shadow">
                                @for ($j = 1; $j <= 5; $j++)
                                    <svg class="w-5 h-5 {{ $j <= ($t['rating'] ?? 5) ? 'opacity-100' : 'opacity-30' }}"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.802 2.036a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.802-2.036a1 1 0 00-1.175 0L6.61 16.283c-.784.57-1.838-.197-1.54-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.975 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.074-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Controls -->
            <div class="mt-6 flex items-center justify-center gap-3">
                <button @click="prev()"
                    class="w-10 h-10 rounded-full grid place-items-center
                                   bg-white/10 border border-white/15 backdrop-blur-md
                                   hover:bg-white/20 transition"
                    aria-label="Précédent">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                        <path d="M15 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
                <button @click="next()"
                    class="w-10 h-10 rounded-full grid place-items-center
                                   bg-white/10 border border-white/15 backdrop-blur-md
                                   hover:bg-white/20 transition"
                    aria-label="Suivant">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                        <path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <!-- Dots -->
            <div class="mt-6 flex justify-center gap-2">
                <template x-for="(t, i) in {{ count($testimonials) }}" :key="i">
                    <button @click="goTo(i)" class="w-3 h-3 rounded-full transition"
                        :class="activeIndex === i ? 'bg-purple-500 scale-110' : 'bg-white/20 hover:bg-white/40'">
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Alpine logic -->
    <script>
        function testimonialCarousel({
            autoplay = true,
            interval = 1000
        } = {}) {
            return {
                timer: null,
                activeIndex: 0,
                init() {
                    if (autoplay) this.play();
                },
                next() {
                    this.activeIndex = (this.activeIndex + 1) % {{ count($testimonials) }};
                    this.scrollToActive();
                },
                prev() {
                    this.activeIndex = (this.activeIndex - 1 + {{ count($testimonials) }}) % {{ count($testimonials) }};
                    this.scrollToActive();
                },
                goTo(i) {
                    this.activeIndex = i;
                    this.scrollToActive();
                },
                scrollToActive() {
                    const s = this.$refs.scroller;
                    const el = s.querySelector(`[data-slide='${this.activeIndex}']`);
                    if (el) {
                        const left = el.offsetLeft - (s.clientWidth - el.clientWidth) / 2;
                        s.scrollTo({
                            left,
                            behavior: 'smooth'
                        });
                    }
                },
                play() {
                    this.pause();
                    this.timer = setInterval(() => this.next(), interval);
                },
                pause() {
                    if (this.timer) clearInterval(this.timer);
                }
            }
        }
    </script>
</section>
