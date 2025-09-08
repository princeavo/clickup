<header x-data="{ open: false }" class="bg-[#2d1f4d] text-white fixed w-full top-0 z-50 shadow-lg">
    <div class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6">
        <!-- Logo -->
        <div class="font-bold text-2xl">
            <a href="{{ route('home') }}">ClickUp</a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex gap-6 text-sm lg:text-base">

             <a href="{{ route('home') }}"
                class="transition {{ request()->routeIs('home') ? 'text-purple-400 font-semibold border-b-2 border-purple-400' : 'hover:text-purple-300' }}">
                Accueil
            </a>
            <a href="{{ route('agency') }}"
                class="transition {{ request()->routeIs('agency') ? 'text-purple-400 font-semibold border-b-2 border-purple-400' : 'hover:text-purple-300' }}">
                Agence
            </a>

            <a href="{{ route('results') }}"
                class="transition {{ request()->is('resultats') ? 'text-purple-400 font-semibold border-b-2 border-purple-400' : 'hover:text-purple-300' }}">
                Résultats
            </a>

            <a href="{{ route('support') }}"
                class="transition {{ request()->routeIs('support') ? 'text-purple-400 font-semibold border-b-2 border-purple-400' : 'hover:text-purple-300' }}">
                Accompagnement
            </a>

            <a href="#ressources"
                class="transition {{ request()->is('ressources') ? 'text-purple-400 font-semibold border-b-2 border-purple-400' : 'hover:text-purple-300' }}">
                Ressources
            </a>
        </nav>


        <!-- CTA (toujours visible) -->
        <a href="#contact"
            class="hidden md:inline-block bg-gradient-to-r from-purple-600 to-pink-500 px-4 md:px-6 py-2 rounded-full font-semibold shadow hover:scale-105 transition-transform text-sm md:text-base">
            Audit offert
        </a>

        <!-- Bouton hamburger (mobile) -->
        <button @click="open = !open" class="md:hidden focus:outline-none">
            <svg x-cloak x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-cloak x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

    </div>

    <!-- Overlay + Menu mobile -->
    <div x-cloak x-show="open" class="fixed inset-0 z-40" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <!-- Overlay -->
        <div @click="open = false" class="absolute inset-0 bg-black/40"></div>

        <!-- Menu -->
        <div class="absolute top-16 left-1/2 -translate-x-1/2 w-[100%] max-w-md bg-[#1a0f2e] shadow-2xl rounded-2xl px-6 py-6 space-y-4 z-50"
            x-transition:enter="transition ease-out duration-400"
            x-transition:enter-start="opacity-0 -translate-y-10 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 -translate-y-10 scale-95">
            <nav class="space-y-4">
                <a href="{{ route('home') }}" class="block transition-all duration-500 delay-100 {{ request()->routeIs('home') ? 'text-purple-400 font-semibold border-b-2 border-purple-400' : 'hover:text-purple-300' }}" x-show="open"
                    x-transition:enter="transition ease-out" x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    Accueil
                </a>

                <a href="{{ route('agency') }}" class="block transition-all duration-500 delay-100 {{ request()->routeIs('agency') ? 'text-purple-400 font-semibold border-b-2 border-purple-400' : 'hover:text-purple-300' }}" x-show="open"
                    x-transition:enter="transition ease-out" x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    Agence
                </a>

                <a href="{{ route('results') }}" class="block transition-all duration-500 delay-200 {{ request()->is('resultats') ? 'text-purple-400 font-semibold border-b-2 border-purple-400' : 'hover:text-purple-300' }}" x-show="open"
                    x-transition:enter="transition ease-out" x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    Résultats
                </a>

                <a href="{{ route('support') }}" class="block transition-all duration-500 delay-300 {{ request()->routeIs('support') ? 'text-purple-400 font-semibold border-b-2 border-purple-400' : 'hover:text-purple-300' }}" x-show="open"
                    x-transition:enter="transition ease-out" x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    Accompagnement
                </a>

                <a href="#ressources" class="block transition-all duration-500 delay-400 {{ request()->is('ressources') ? 'text-purple-400 font-semibold border-b-2 border-purple-400' : 'hover:text-purple-300' }}" x-show="open"
                    x-transition:enter="transition ease-out" x-transition:enter-start="opacity-0 translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0">
                    Ressources
                </a>
            </nav>

            <a href="#contact"
                class="block text-center bg-gradient-to-r from-purple-600 to-pink-500 px-4 py-2 rounded-full font-semibold shadow hover:scale-105 transition-transform duration-500 delay-500"
                x-show="open" x-transition:enter="transition ease-out"
                x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                Audit offert
            </a>
        </div>
    </div>



</header>
