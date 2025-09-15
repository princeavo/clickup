@props([
    'title_colored' => 'nos clients',
    'title_white' => 'qui en parlent le mieux',
    'subtitle' => null,
    'testimonials' => [],
    'cta' => ['text' => 'Découvrir leurs transformations', 'href' => '#'],
])

<section x-data="testimonialCarousel({{ count($testimonials) }})" x-init="init()" @keydown.right.prevent="next()" @keydown.left.prevent="prev()"
    role="region" aria-label="Témoignages de clients" tabindex="0"
    class="relative w-full py-20 text-white overflow-hidden bg-cover bg-center"
    style="background-image: url('{{ asset('testimonials-bg.png') }}');">
    <!-- Overlay sombre -->
    <div class="absolute inset-0 bg-black/80"></div>

    <!-- Décors lumineux -->
    <div class="pointer-events-none absolute -top-40 -left-40 w-96 h-96 rounded-full bg-orange-500/20 blur-3xl"></div>
    <div
        class="pointer-events-none absolute bottom-0 right-0 w-[550px] h-[550px] rounded-full bg-orange-600/20 blur-3xl">
    </div>


    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-12">

        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
            <div class="text-center lg:text-left max-w-3xl mx-auto lg:mx-0">
                <h2 class="text-3xl md:text-5xl font-extrabold leading-tight opacity-0 translate-y-10 transition-all duration-700 ease-out"
                    x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')"
                    x-intersect:leave="$el.classList.remove('opacity-100','translate-y-0'); $el.classList.add('opacity-0','-translate-y-10')">
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00] font-extrabold">
                        Ce sont {{ $title_colored }}
                    </span>
                    <span class="block md:inline text-white"> {{ $title_white }} </span>
                </h2>


                <div class="w-20 h-1 bg-gradient-to-r from-[#ffb845] to-[#ff8c00] mr-auto mt-4 opacity-0 scale-x-50 transition-all duration-700 ease-out origin-left"
                    x-intersect:enter="$el.classList.replace('opacity-0','opacity-100'); $el.classList.replace('scale-x-50','scale-x-100')">
                </div>

                @if ($subtitle)
                    <p class="mt-4 text-gray-400 text-lg opacity-0 translate-y-10 transition-all duration-700 ease-out delay-200"
                        x-intersect:enter="$el.classList.replace('opacity-0','opacity-100'); $el.classList.replace('translate-y-10','translate-y-0')">
                        {{ $subtitle }}
                    </p>
                @endif
            </div>

            <!-- CTA -->
            <div class="text-center lg:text-right opacity-0 translate-y-10 transition-all duration-700 ease-out delay-300"
                x-intersect:enter="$el.classList.replace('opacity-0','opacity-100'); $el.classList.replace('translate-y-10','translate-y-0')">
                <x-button :href="$cta['href'] ?? '#'" variant="outline" class="px-5 py-2.5">
                    {{ $cta['text'] ?? 'Voir plus' }}
                    <svg class="w-4 h-4 inline-block ml-2" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </x-button>
            </div>
        </div>

        <!-- Carousel -->
        <div class="relative mt-12">
            <!-- Scroller -->
            <div x-ref="scroller"
                class="flex gap-6 py-12 overflow-x-auto scroll-smooth snap-x snap-mandatory no-scrollbar"
                style="-webkit-overflow-scrolling:touch; overflow-y:hidden;">
                @foreach ($testimonials as $i => $t)
                    <article data-slide="{{ $i }}"
                        class="relative snap-start shrink-0
           w-[88%] sm:w-[70%] md:w-[48%] lg:w-[32%]
           bg-white/5 border border-white/10 backdrop-blur-md
           rounded-3xl p-7 md:p-8 text-left text-white
           shadow-[0_20px_80px_-30px_rgba(255,140,0,0.18)]
           transition-all duration-500 group hover:-translate-y-1 hover:shadow-orange-500/40 hover:scale-[1.02]
           flex flex-col min-h-[360px]
           opacity-0 translate-y-10"
                        x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')"
                        x-intersect:leave="$el.classList.remove('opacity-100','translate-y-0'); $el.classList.add('opacity-0','-translate-y-10')">


                        <!-- Quote -->
                        <p class="text-base md:text-lg leading-relaxed text-gray-100/95">
                            {{ $t['quote'] }}
                        </p>

                        <!-- Footer aligné en bas -->
                        <div class="mt-auto pt-6 flex items-center justify-between flex-wrap gap-4">
                            <div class="flex items-center gap-3 min-w-0">
                                @php
                                    $initials = collect(explode(' ', $t['name'] ?? ''))
                                        ->map(fn($p) => mb_substr($p, 0, 1))
                                        ->take(2)
                                        ->implode('');
                                @endphp

                                @if (!empty($t['avatar']))
                                    <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}"
                                        class="w-10 h-10 rounded-full object-cover ring-2 ring-orange-500/30 flex-shrink-0">
                                @else
                                    <div
                                        class="w-10 h-10 rounded-full grid place-items-center bg-gradient-to-br from-[#ffb845] to-[#ff8c00] text-white font-bold flex-shrink-0">
                                        {{ $initials }}
                                    </div>
                                @endif

                                <div class="min-w-0">
                                    <div class="font-semibold truncate">{{ $t['name'] }}</div>
                                    <div class="text-sm text-gray-400 truncate">{{ $t['role'] ?? '' }}</div>
                                </div>
                            </div>

                            <div class="flex items-center gap-0.5 text-orange-400 drop-shadow">
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
                <button @click="prev()" aria-label="Précédent"
                    class="w-10 h-10 rounded-full grid place-items-center bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-white shadow-lg hover:scale-110 transition">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                        <path d="M15 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>

                <button @click="next()" aria-label="Suivant"
                    class="w-10 h-10 rounded-full grid place-items-center bg-gradient-to-r from-[#ffb845] to-[#ff8c00] text-white shadow-lg hover:scale-110 transition">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                        <path d="M9 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <!-- Dots -->
            <div class="mt-6 flex justify-center gap-2">
                <template x-for="i in total" :key="i">
                    <button @click="goTo(i-1)" class="w-3 h-3 rounded-full transition"
                        :class="activeIndex === (i - 1) ? 'bg-gradient-to-r from-[#ffb845] to-[#ff8c00] scale-110' :
                            'bg-white/20 hover:bg-white/40'">
                    </button>
                </template>
            </div>
        </div>
    </div>

    <script>
        function testimonialCarousel() {
            return {
                activeIndex: 0,
                total: 0,
                scroller: null,

                init() {
                    this.scroller = this.$refs.scroller;
                    this.total = this.scroller.children.length;
                },

                goTo(index) {
                    this.activeIndex = (index + this.total) % this.total;
                    const card = this.scroller.children[this.activeIndex];
                    card.scrollIntoView({
                        inline: "center",
                        behavior: "smooth",
                        block: "nearest"
                    });
                },

                next() {
                    this.goTo(this.activeIndex + 1);
                },

                prev() {
                    this.goTo(this.activeIndex - 1);
                },
            };
        }
    </script>
</section>
