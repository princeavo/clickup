@props([
    'ebooks' => [],
    'section' => [],
])

<section x-data="ebookCarousel({{ count($ebooks) }})" x-init="init()"
    class="relative bg-black py-20 px-6 lg:px-20 overflow-hidden text-white">

    <!-- Header -->
    <div class="text-center max-w-3xl mx-auto mb-12">
        <h2 class="text-3xl md:text-4xl font-bold mb-6 opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            <span class="text-[#ffb845]">{{ $section['title_colored'] ?? '' }}</span>
            <span class="text-white">{{ $section['title_white'] ?? '' }}</span>
        </h2>

        <div class="w-24 h-1 mx-auto mb-6 bg-gradient-to-r from-[#ffb845] to-[#ff8c00] rounded-full opacity-0 scale-x-50 transition-all duration-700 ease-out delay-150 origin-center"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','scale-x-50'); $el.classList.add('opacity-100','scale-x-100')"
            x-intersect:leave="$el.classList.add('opacity-0','scale-x-50'); $el.classList.remove('opacity-100','scale-x-100')">
        </div>

        <p class="text-gray-300 text-lg opacity-0 translate-y-6 transition-all duration-700 ease-out delay-300"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            {{ $section['description'] ?? '' }}
        </p>
    </div>

    <div class="relative max-w-6xl mx-auto">
        <!-- Grille (≤ 3 ebooks) -->
        <div x-show="!isCarousel" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($ebooks as $i => $ebook)
                <div class="opacity-0 translate-y-10 transition-all duration-700 ease-out hover:-translate-y-2 hover:shadow-2xl"
                    style="transition-delay: {{ $i * 150 }}ms"
                    x-data
                    x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')"
                    x-intersect:leave="$el.classList.add('opacity-0','translate-y-10'); $el.classList.remove('opacity-100','translate-y-0')">
                    <x-ebook-card :ebook="$ebook" :index="$loop->index" />
                </div>
            @endforeach
        </div>

        <!-- Carousel (> 3 ebooks) -->
        <div x-show="isCarousel" class="relative overflow-hidden p-3">
            <div x-ref="track" class="flex transition-transform duration-700 ease-in-out"
                :style="`transform: translateX(-${offset}px)`"
                @transitionend="onTransitionEnd">
                @foreach ($ebooks as $i => $ebook)
                    <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-4 opacity-0 translate-y-10 transition-all duration-700 ease-out"
                        style="transition-delay: {{ $i * 150 }}ms"
                        x-data
                        x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')"
                        x-intersect:leave="$el.classList.add('opacity-0','translate-y-10'); $el.classList.remove('opacity-100','translate-y-0')">
                        <x-ebook-card :ebook="$ebook" :index="$loop->index" />
                    </div>
                @endforeach
            </div>

            <!-- Flèches -->
            <button @click="prev" aria-label="Précédent"
                class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-800/60 hover:bg-gray-700 text-white p-3 rounded-full shadow-lg transition"
                :class="isAnimating ? 'pointer-events-none opacity-50' : ''">←</button>

            <button @click="next" aria-label="Suivant"
                class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-800/60 hover:bg-gray-700 text-white p-3 rounded-full shadow-lg transition"
                :class="isAnimating ? 'pointer-events-none opacity-50' : ''">→</button>
        </div>

        <!-- Bullets -->
        <div x-show="isCarousel" class="mt-6 flex justify-center space-x-2">
            @foreach ($ebooks as $ebook)
                <button @click="goTo({{ $loop->index }})" class="w-3 h-3 rounded-full transition-all"
                    :class="active === {{ $loop->index }} ? 'bg-orange-500 scale-125' : 'bg-gray-500'"
                    :aria-current="active === {{ $loop->index }} ? 'true' : 'false'"
                    aria-label="Aller à la slide {{ $loop->iteration }}"></button>
            @endforeach
        </div>
    </div>

    <!-- CTA global -->
    <div class="text-center mt-12 opacity-0 translate-y-6 transition-all duration-700 ease-out delay-500"
        x-data
        x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
        x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
        <x-button variant="outline" :href="$section['cta_all_link'] ?? '#'">
            {{ $section['cta_all'] ?? 'Voir tout' }}
        </x-button>
    </div>

    <!-- Alpine Logic -->
    <script>
        function ebookCarousel(count) {
            return {
                isCarousel: count > 3,
                active: 0,
                interval: null,
                slideWidth: 0,
                trackWidth: 0,
                offset: 0,
                isAnimating: false,

                init() {
                    if (this.isCarousel) {
                        this.$nextTick(() => {
                            this.updateWidth();
                            window.addEventListener('resize', this.updateWidth.bind(this));
                            this.play();
                        });
                    }
                },
                updateWidth() {
                    const first = this.$refs.track?.firstElementChild;
                    this.slideWidth = first ? first.offsetWidth : 0;
                    this.trackWidth = this.$refs.track?.clientWidth || 0;
                    this.updateOffset();
                },
                updateOffset() {
                    if (window.innerWidth >= 1024) {
                        this.offset = (this.active * this.slideWidth) - (this.trackWidth / 2 - this.slideWidth / 2);
                    } else {
                        this.offset = this.active * this.slideWidth;
                    }
                },
                next() {
                    if (this.isAnimating) return;
                    this.isAnimating = true;
                    this.active = (this.active + 1) % count;
                    this.updateOffset();
                    this.resetInterval();
                },
                prev() {
                    if (this.isAnimating) return;
                    this.isAnimating = true;
                    this.active = (this.active - 1 + count) % count;
                    this.updateOffset();
                    this.resetInterval();
                },
                goTo(i) {
                    if (this.isAnimating || i === this.active) return;
                    this.isAnimating = true;
                    this.active = i;
                    this.updateOffset();
                    this.resetInterval();
                },
                onTransitionEnd() {
                    this.isAnimating = false;
                },
                play() {
                    this.pause();
                    this.interval = setInterval(() => {
                        if (!this.isAnimating) this.next();
                    }, 5000);
                },
                pause() {
                    if (this.interval) clearInterval(this.interval);
                },
                resetInterval() {
                    this.pause();
                    this.play();
                },
            }
        }
    </script>
</section>
