@props([
    'ebooks' => [],
])
<section x-data="ebookCarousel({{ count($ebooks) }})" x-init="init()"
    class="relative bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 py-16 px-6 lg:px-20 overflow-hidden">
    <!-- Header -->
    <div class="text-center max-w-2xl mx-auto mb-12" data-reveal>
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Nos ebooks gratuits
        </h2>
        <p class="text-gray-300 text-lg">
            Découvre nos meilleures stratégies Facebook & TikTok Ads.
            Télécharge-les gratuitement et booste ton business.
        </p>
    </div>

    <!-- Carousel -->
    <div class="relative max-w-6xl mx-auto overflow-hidden p-3">
        <div x-ref="track" class="flex transition-transform duration-700 ease-in-out"
            :style="`transform: translateX(-${offset}px)`">
            @foreach ($ebooks as $ebook)
                <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-4" data-reveal>
                    <div class="relative bg-gray-800 rounded-3xl shadow-2xl p-6
                               transform transition-all duration-700 hover:rotate-1 hover:scale-105
                               flex flex-col items-center"
                        :class="{ 'ring-2 ring-indigo-500/50 shadow-indigo-500/30': active === {{ $loop->index }} }">
                        <!-- Glow -->
                        <div class="absolute inset-0 rounded-3xl
                                    bg-gradient-to-tr from-indigo-400/40 via-purple-400/30 to-pink-400/30
                                    opacity-0 blur-3xl scale-95
                                    transition-all duration-700 ease-in-out"
                            :class="{ 'opacity-100 scale-100': active === {{ $loop->index }} }"></div>

                        <!-- Title -->
                        <h3 class="relative z-10 text-xl font-semibold text-white mb-4 text-center">
                            {{ $ebook['title'] }}
                        </h3>

                        <!-- Image -->
                        <div class="relative w-full h-64 mb-5 overflow-hidden rounded-xl">
                            <img src="{{ $ebook['image'] }}" alt="{{ $ebook['title'] }}"
                                class="w-full h-full object-cover transition-transform duration-700 hover:scale-110 hover:rotate-1">
                        </div>

                        <!-- Bouton -->
                        <a href="{{ $ebook['link'] }}"
                            class="relative z-10 block w-full text-center bg-indigo-600 text-white py-3 rounded-xl font-semibold
                                  hover:bg-indigo-500 transition-all duration-300
                                  hover:shadow-[0_0_25px_#6366f1]">
                            📥 Télécharger
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Flèches -->
        <button @click="prev()" aria-label="Précédent"
            class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-700/50 hover:bg-gray-700 text-white p-3 rounded-full shadow-lg focus:ring-2 focus:ring-indigo-500">
            ←
        </button>
        <button @click="next()" aria-label="Suivant"
            class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-700/50 hover:bg-gray-700 text-white p-3 rounded-full shadow-lg focus:ring-2 focus:ring-indigo-500">
            →
        </button>

        <!-- Bullets -->
        <div class="absolute inset-x-0 bottom-4 flex justify-center space-x-2">
            @foreach ($ebooks as $ebook)
                <button @click="goTo({{ $loop->index }})" class="w-3 h-3 rounded-full transition-all"
                    :class="active === {{ $loop->index }} ? 'bg-indigo-500 scale-125' : 'bg-gray-500'"></button>
            @endforeach
        </div>
    </div>

    <!-- CTA -->
    <div class="text-center mt-12">
        <a href="#"
            class="inline-block px-8 py-3 text-indigo-600 font-bold border border-indigo-600 rounded-full
                  hover:bg-indigo-600 hover:text-white transition-all duration-300">
            Voir tous les ebooks
        </a>
    </div>

    <!-- Alpine Logic -->
    <script>
        function ebookCarousel(count) {
            return {
                active: 0,
                interval: null,
                slideWidth: 0,
                trackWidth: 0,
                offset: 0,
                init() {
                    this.updateWidth();
                    window.addEventListener('resize', () => this.updateWidth());

                    this.play();

                    // reveal animation
                    const obs = new IntersectionObserver((entries) => {
                        entries.forEach(e => {
                            if (e.isIntersecting) {
                                e.target.classList.add('opacity-100', 'translate-y-0');
                                e.target.classList.remove('opacity-0', 'translate-y-6');
                                obs.unobserve(e.target);
                            }
                        });
                    }, {
                        threshold: 0.15
                    });
                    document.querySelectorAll('[data-reveal]').forEach(el => {
                        el.classList.add('opacity-0', 'translate-y-6', 'transition-all', 'duration-700',
                        'ease-out');
                        obs.observe(el);
                    });
                },
                updateWidth() {
                    const first = this.$refs.track.firstElementChild;
                    this.slideWidth = first ? first.offsetWidth : 0;
                    this.trackWidth = this.$refs.track.clientWidth;
                    this.updateOffset();
                },
                updateOffset() {
                    if (window.innerWidth >= 1024) {
                        // sur desktop : centrer
                        this.offset = (this.active * this.slideWidth) - (this.trackWidth / 2 - this.slideWidth / 2);
                    } else {
                        // mobile/tablette : aligner à gauche
                        this.offset = this.active * this.slideWidth;
                    }
                },
                next() {
                    this.active = (this.active + 1) % count;
                    this.updateOffset();
                },
                prev() {
                    this.active = (this.active - 1 + count) % count;
                    this.updateOffset();
                },
                goTo(i) {
                    this.active = i;
                    this.updateOffset();
                },
                play() {
                    this.pause();
                    this.interval = setInterval(() => this.next(), 5000);
                },
                pause() {
                    if (this.interval) clearInterval(this.interval);
                }
            }
        }
    </script>
</section>
