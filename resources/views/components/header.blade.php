@props([
    'links' => [
        ['label' => 'Accueil',       'href' => route('home'),     'active' => request()->routeIs('home')],
        ['label' => 'Agence',        'href' => route('agency'),   'active' => request()->routeIs('agency')],
        ['label' => 'Résultats',     'href' => route('results'),  'active' => request()->routeIs('results')],
        ['label' => 'Accompagnement','href' => route('support'),  'active' => request()->routeIs('support')],
        ['label' => 'Nos Offres',    'href' => route('offers'),   'active' => request()->routeIs('offers')],
    ],
    'logo' => asset('logo-header.png'),
    'brand' => 'clicup',
    'ctaLabel' => 'Audit offert',
    'ctaHref'  => route('audit'),

    'bgImage' => asset('bg-header.jpg'),
])

<header
    x-data="{ open:false, lastScroll:0, hidden:false, scrolled:false }"
    x-init="
        window.addEventListener('scroll', () => {
            let current = window.scrollY;
            scrolled = current > 50;
            if (current > lastScroll && current > 80) {
                hidden = true;  // scroll vers le bas → cacher
            } else {
                hidden = false; // scroll vers le haut → afficher
            }
            lastScroll = current;
        });
    "
    x-effect="document.documentElement.classList.toggle('overflow-hidden', open)"
    :class="{
        '-translate-y-full': hidden,
        'translate-y-0': !hidden,
        'bg-orange-900/80 backdrop-blur-md': scrolled,
        'bg-transparent': !scrolled
    }"
    class="fixed top-0 left-0 w-full z-[9999]
           transition-all duration-500 ease-in-out"
>
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6 lg:px-8 py-3">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <img src="{{ $logo }}" alt="{{ $brand }}" class="h-8 w-auto">
        </a>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex items-center gap-6 text-sm lg:text-base font-medium">
            @foreach ($links as $link)
                <a href="{{ $link['href'] }}" class="nav-link {{ ($link['active'] ?? false) ? 'is-active' : '' }}">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <!-- CTA -->
        <div class="hidden md:block">
            <x-button :href="$ctaHref" variant="primary">
                {{ $ctaLabel }}
            </x-button>
        </div>

        <!-- Hamburger -->
        <button @click="open = !open" class="md:hidden text-white focus:outline-none relative z-[60]" aria-label="Menu">
            <svg x-cloak x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-cloak x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Menu Mobile -->
    <div x-cloak x-show="open" class="fixed inset-0 z-40">
        <div @click="open = false" class="absolute inset-0 bg-black/70"></div>
        <div class="absolute top-16 left-1/2 -translate-x-1/2 w-full max-w-md bg-[#0b0b0b]/95 border border-white/20
                    shadow-2xl rounded-2xl px-6 py-6 space-y-6 z-50"
             x-transition:enter="transition ease-out duration-400"
             x-transition:enter-start="opacity-0 -translate-y-10 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 -translate-y-10 scale-95">
            <nav class="flex flex-col space-y-4 text-lg font-medium">
                @foreach ($links as $i => $link)
                    <a href="{{ $link['href'] }}"
                       @click="open = false"
                       class="nav-link block {{ ($link['active'] ?? false) ? 'is-active' : '' }}"
                       x-show="open"
                       x-transition:enter="transition ease-out duration-300"
                       x-transition:enter-start="opacity-0 translate-y-4"
                       x-transition:enter-end="opacity-100 translate-y-0"
                       style="transition-delay: {{ $i * 80 }}ms">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <x-button :href="$ctaHref" variant="primary" class="block text-center">
                {{ $ctaLabel }}
            </x-button>
        </div>
    </div>
</header>

<style>
    [x-cloak] { display: none !important; }

    .nav-link {
        position: relative;
        display: inline-block;
        color: #fff;
        transition: color .25s ease;
        padding-bottom: 2px;
    }
    .nav-link::after {
        content: '';
        position: absolute;
        left: 0; bottom: -3px;
        width: 0; height: 2px;
        background: #ff8a00;
        transition: width .25s ease;
    }
    .nav-link:hover { color: #ff8a00; }
    .nav-link:hover::after { width: 100%; }
    .nav-link.is-active { color: #ff8a00; font-weight: 600; }
    .nav-link.is-active::after { width: 100%; }
</style>
