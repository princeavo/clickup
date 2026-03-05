@props(['faqs' => [], 'guarantees' => []])

<section class="relative py-24 overflow-hidden bg-gradient-to-b from-black to-[#0a0a0a]">

    {{-- Effets de fond --}}
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-1/3 w-[500px] h-[500px] bg-orange-500/8 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/3 w-[500px] h-[500px] bg-orange-600/8 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6">

        {{-- ────────────────────────────────── --}}
        {{-- BLOC GARANTIES — CARROUSEL --}}
        {{-- ────────────────────────────────── --}}
        <div class="mb-24">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4
                           opacity-0 translate-y-6 transition-all duration-700 ease-out"
                    x-data
                    x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                    On s'engage. <span class="text-orange-400">Pour de vrai.</span>
                </h2>
                <x-animated-highlight />
                <p class="text-lg text-gray-400 max-w-2xl mx-auto mt-6
                          opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
                   x-data
                   x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                    Nos garanties ne sont pas du marketing. Ce sont des engagements contractuels inscrits dans chaque offre.
                </p>
            </div>

            {{-- Carrousel Alpine --}}
            <div x-data="{
                    current: 0,
                    total: {{ count($guarantees) }},
                    perView() {
                        if (window.innerWidth >= 1024) return 3;
                        if (window.innerWidth >= 640)  return 2;
                        return 1;
                    },
                    get pages() { return Math.ceil(this.total / this.perView()); },
                    get offset() { return this.current * (100 / this.perView()); },
                    prev()  { this.current = this.current > 0 ? this.current - 1 : this.pages - 1; },
                    next()  { this.current = this.current < this.pages - 1 ? this.current + 1 : 0; },
                    goTo(i) { this.current = i; },
                 }"
                 @resize.window.debounce="current = Math.min(current, pages - 1)"
                 class="relative max-w-6xl mx-auto
                        opacity-0 translate-y-6 transition-all duration-700 ease-out delay-300"
                 x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">

                {{-- Masques dégradé gauche/droite --}}
                <div class="pointer-events-none absolute inset-y-0 left-0 w-12 z-10
                            bg-gradient-to-r from-black to-transparent rounded-l-2xl"></div>
                <div class="pointer-events-none absolute inset-y-0 right-0 w-12 z-10
                            bg-gradient-to-l from-black to-transparent rounded-r-2xl"></div>

                {{-- Track glissant --}}
                <div class="overflow-hidden rounded-2xl">
                    <div class="flex transition-transform duration-500 ease-[cubic-bezier(0.4,0,0.2,1)]"
                         :style="`transform: translateX(-${offset}%)`">

                        @foreach($guarantees as $index => $guarantee)
                            {{-- Chaque carte occupe 100%/perView() de largeur --}}
                            <div class="flex-shrink-0 px-3"
                                 :style="`width: ${100 / perView()}%`">

                                <div class="h-full flex flex-col gap-5 p-7 rounded-2xl border
                                            {{ $guarantee['highlight'] ?? false
                                                ? 'bg-gradient-to-br from-orange-500/15 to-orange-600/5 border-orange-500/50 shadow-2xl shadow-orange-500/20'
                                                : 'bg-[#111111]/90 border-gray-800 hover:border-orange-500/40' }}
                                            backdrop-blur-xl transition-all duration-300 hover:-translate-y-1 group">

                                    {{-- Icône + Badge --}}
                                    <div class="flex items-center justify-between">
                                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0
                                                    {{ $guarantee['highlight'] ?? false
                                                        ? 'bg-orange-500 shadow-lg shadow-orange-500/40'
                                                        : 'bg-orange-500/15 group-hover:bg-orange-500/25 transition-colors' }}">
                                            @if(($guarantee['icon'] ?? 'shield') === 'shield')
                                                <svg class="w-6 h-6 {{ $guarantee['highlight'] ?? false ? 'text-white' : 'text-orange-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                                </svg>
                                            @elseif($guarantee['icon'] === 'money')
                                                <svg class="w-6 h-6 {{ $guarantee['highlight'] ?? false ? 'text-white' : 'text-orange-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                            @elseif($guarantee['icon'] === 'chart')
                                                <svg class="w-6 h-6 {{ $guarantee['highlight'] ?? false ? 'text-white' : 'text-orange-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                                </svg>
                                            @elseif($guarantee['icon'] === 'clock')
                                                <svg class="w-6 h-6 {{ $guarantee['highlight'] ?? false ? 'text-white' : 'text-orange-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                            @elseif($guarantee['icon'] === 'support')
                                                <svg class="w-6 h-6 {{ $guarantee['highlight'] ?? false ? 'text-white' : 'text-orange-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                                                </svg>
                                            @else
                                                <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            @endif
                                        </div>

                                        @if(isset($guarantee['badge']))
                                            <span class="inline-block px-2.5 py-1 rounded-full text-xs font-bold
                                                         bg-orange-500/20 text-orange-400 border border-orange-500/30">
                                                {{ $guarantee['badge'] }}
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Titre + description --}}
                                    <div class="flex-1">
                                        <h3 class="text-lg font-bold text-white mb-2">{{ $guarantee['title'] }}</h3>
                                        <p class="text-sm text-gray-400 leading-relaxed">{{ $guarantee['description'] }}</p>
                                    </div>

                                    {{-- Valeur --}}
                                    @if(isset($guarantee['value']))
                                        <div class="pt-4 border-t border-gray-800/80">
                                            <span class="text-xl font-extrabold text-orange-400">{{ $guarantee['value'] }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Flèches prev / next --}}
                <button @click="prev()"
                        class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-20
                               w-10 h-10 rounded-full bg-[#1a1a1a] border border-gray-700
                               hover:bg-orange-500 hover:border-orange-500 hover:text-white
                               text-gray-400 flex items-center justify-center
                               transition-all duration-250 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button @click="next()"
                        class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-20
                               w-10 h-10 rounded-full bg-[#1a1a1a] border border-gray-700
                               hover:bg-orange-500 hover:border-orange-500 hover:text-white
                               text-gray-400 flex items-center justify-center
                               transition-all duration-250 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                {{-- Dots --}}
                <div class="flex justify-center gap-2 mt-8">
                    <template x-for="i in pages" :key="i">
                        <button @click="goTo(i - 1)"
                                class="rounded-full transition-all duration-300"
                                :class="current === i - 1
                                    ? 'w-8 h-2 bg-orange-500'
                                    : 'w-2 h-2 bg-gray-700 hover:bg-gray-500'">
                        </button>
                    </template>
                </div>
            </div>
        </div>


        {{-- ────────────────────────────────── --}}
        {{-- BLOC FAQ --}}
        {{-- ────────────────────────────────── --}}
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4
                           opacity-0 translate-y-6 transition-all duration-700 ease-out"
                    x-data
                    x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                    Tes questions, <span class="text-orange-400">nos réponses.</span>
                </h2>
                <x-animated-highlight />
                <p class="text-lg text-gray-400 max-w-2xl mx-auto mt-6
                          opacity-0 translate-y-6 transition-all duration-700 ease-out delay-200"
                   x-data
                   x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                    Tu as encore des doutes ? On répond à tout, sans langue de bois.
                </p>
            </div>

            {{-- Accordéon — openFaq dans un seul scope, AUCUN x-data sur les items --}}
            <div class="space-y-2" x-data="{ openFaq: null }">
                @foreach($faqs as $index => $faq)
                    <div class="faq-item rounded-xl overflow-hidden opacity-0 translate-y-4"
                         style="transition-delay: {{ $index * 70 }}ms"
                         :class="openFaq === {{ $index }} ? 'faq-open' : 'faq-closed'"
                         x-intersect:enter="$el.classList.remove('opacity-0','translate-y-4'); $el.classList.add('opacity-100','translate-y-0')">

                        {{-- Bouton question --}}
                        <button @click="openFaq === {{ $index }} ? openFaq = null : openFaq = {{ $index }}"
                                class="w-full flex items-center justify-between gap-4 px-6 py-5 text-left group
                                       transition-all duration-300"
                                :class="openFaq === {{ $index }}
                                    ? 'faq-btn-active'
                                    : 'faq-btn-idle'">

                            <div class="flex items-center gap-4 min-w-0">
                                {{-- Numéro --}}
                                <span class="flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center
                                             text-xs font-bold transition-all duration-300"
                                      :class="openFaq === {{ $index }}
                                          ? 'faq-num-active'
                                          : 'faq-num-idle'">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                {{-- Texte question --}}
                                <span class="font-semibold text-sm md:text-base leading-snug
                                             transition-colors duration-300 md:whitespace-normal"
                                      :class="openFaq === {{ $index }}
                                          ? 'text-orange-400'
                                          : 'text-gray-300 group-hover:text-white'">
                                    {{ $faq['question'] }}
                                </span>
                            </div>

                            {{-- Icône +/× --}}
                            <span class="flex-shrink-0 w-7 h-7 rounded-full border flex items-center justify-center
                                         transition-all duration-300"
                                  :class="openFaq === {{ $index }}
                                      ? 'faq-icon-active'
                                      : 'faq-icon-idle'">
                                <svg class="w-3.5 h-3.5 transition-transform duration-300"
                                     :class="openFaq === {{ $index }} ? 'rotate-45' : 'rotate-0'"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 5v14M5 12h14"/>
                                </svg>
                            </span>
                        </button>

                        {{-- Corps — x-show fiable, plié par défaut via display:none --}}
                        <div x-show="openFaq === {{ $index }}"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 -translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 -translate-y-1"
                             style="display: none;">
                            <div class="px-6 pb-6 pt-4 faq-body-bg border-t border-orange-500/20">

                                    {{-- Barre orange + contenu --}}
                                    <div class="flex gap-4">
                                        <div class="flex-shrink-0 w-0.5 self-stretch rounded-full
                                                    bg-gradient-to-b from-orange-500 via-orange-500/50 to-transparent">
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-gray-300 text-sm md:text-base leading-relaxed">
                                                {{ $faq['answer'] }}
                                            </p>
                                            @if(isset($faq['cta']))
                                                <a href="{{ $faq['cta']['link'] }}"
                                                   class="inline-flex items-center gap-2 mt-5
                                                          text-orange-400 hover:text-white
                                                          bg-orange-500/10 hover:bg-orange-500
                                                          border border-orange-500/30 hover:border-orange-500
                                                          text-sm font-semibold px-4 py-2 rounded-lg
                                                          transition-all duration-200 group/cta">
                                                    {{ $faq['cta']['label'] }}
                                                    <svg class="w-4 h-4 group-hover/cta:translate-x-1 transition-transform duration-200"
                                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- CTA final --}}
            <div class="text-center mt-12
                        opacity-0 translate-y-6 transition-all duration-700 ease-out delay-300"
                 x-data
                 x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                <p class="text-gray-400 mb-4">Tu n'as pas trouvé ta réponse ?</p>
                <x-button href="#contact" variant="primary">
                    Parle directement à notre équipe
                </x-button>
            </div>
        </div>

    </div>
</section>

<style>
/* ── Wrapper item ── */
.faq-item {
    border: 1px solid rgba(55, 65, 81, 0.8); /* gray-700/80 */
    transition: border-color 250ms ease, box-shadow 300ms ease, transform 250ms ease;
}
.faq-item:hover,
.faq-closed:hover {
    border-color: rgba(249, 115, 22, 0.25); /* orange-500/25 */
}
.faq-open {
    border-color: rgba(249, 115, 22, 0.55) !important;
    box-shadow: 0 4px 24px -4px rgba(249, 115, 22, 0.12);
}

/* ── Bouton état normal ── */
.faq-btn-idle {
    background-color: #111111;
}
.faq-btn-idle:hover {
    background-color: #16110a;
}

/* ── Bouton état ouvert ── */
.faq-btn-active {
    background-color: #1c1410;
}

/* ── Numéro état normal ── */
.faq-num-idle {
    background-color: #222222;
    color: #6b7280; /* gray-500 */
    transition: background-color 250ms ease, color 250ms ease;
}
.faq-btn-idle:hover .faq-num-idle {
    background-color: rgba(249, 115, 22, 0.15);
    color: #fb923c; /* orange-400 */
}

/* ── Numéro état ouvert ── */
.faq-num-active {
    background-color: #f97316; /* orange-500 */
    color: #ffffff;
    box-shadow: 0 0 10px rgba(249, 115, 22, 0.4);
    transition: background-color 250ms ease, color 250ms ease, box-shadow 250ms ease;
}

/* ── Icône +/× état normal ── */
.faq-icon-idle {
    border-color: #374151; /* gray-700 */
    background: transparent;
    color: #6b7280;
    transition: border-color 250ms ease, background 250ms ease, color 250ms ease;
}
.faq-btn-idle:hover .faq-icon-idle {
    border-color: rgba(249, 115, 22, 0.4);
    color: #fb923c;
}

/* ── Icône +/× état ouvert ── */
.faq-icon-active {
    border-color: rgba(249, 115, 22, 0.6);
    background-color: rgba(249, 115, 22, 0.1);
    color: #fb923c;
    transition: border-color 250ms ease, background 250ms ease, color 250ms ease;
}

/* ── Fond du corps de réponse ── */
.faq-body-bg {
    background-color: rgba(26, 18, 8, 0.6);
}

/* ── Transition globale item ── */
.faq-item,
.faq-item * {
    box-sizing: border-box;
}
</style>
