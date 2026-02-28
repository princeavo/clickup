@props(['whatsappLink'])

<div
    x-data="{ hovered: false }"
    class="fixed bottom-6 right-6 z-[60] flex items-center gap-3"
>
    {{-- Tooltip label --}}
    <div
        x-show="hovered"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-x-4"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-4"
        style="display: none;"
        class="flex items-center gap-2 bg-white text-gray-900 text-sm font-semibold
               px-4 py-2.5 rounded-full shadow-xl border border-green-100
               whitespace-nowrap pointer-events-none select-none"
    >
        <span class="text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                <path d="M20.52 3.48A11.94 11.94 0 0 0 12.02 0C5.42 0 .09 5.33.09 11.92c0 2.1.56 4.12 1.62 5.93L0 24l6.32-1.66a11.9 11.9 0 0 0 5.7 1.45h.01c6.6 0 11.93-5.33 11.93-11.92a11.86 11.86 0 0 0-3.44-8.37Z"/>
            </svg>
        </span>
        Intégrer la communauté ·
        <span class="text-green-600 flex items-center gap-1 font-bold">
            La machine à ventes
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/>
                <polyline points="16 7 22 7 22 13"/>
            </svg>
        </span>
    </div>

    {{-- Bouton WhatsApp --}}
    <a
        href="{{ $whatsappLink }}"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Intégrer la communauté WhatsApp La machine à ventes"
        @mouseenter="hovered = true"
        @mouseleave="hovered = false"
        class="flex items-center justify-center w-14 h-14 rounded-full
               bg-green-500 text-white shadow-2xl
               hover:bg-green-600 hover:scale-110
               focus:outline-none focus:ring-4 focus:ring-green-300
               transition-all duration-300"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7" fill="currentColor" aria-hidden="true">
            <path d="M20.52 3.48A11.94 11.94 0 0 0 12.02 0C5.42 0 .09 5.33.09 11.92c0 2.1.56 4.12 1.62 5.93L0 24l6.32-1.66a11.9 11.9 0 0 0 5.7 1.45h.01c6.6 0 11.93-5.33 11.93-11.92a11.86 11.86 0 0 0-3.44-8.37ZM12.02 22.1a9.9 9.9 0 0 1-5.05-1.39l-.36-.21-3.75.98 1-3.65-.24-.38a9.91 9.91 0 0 1-1.57-5.53c0-5.46 4.45-9.9 9.97-9.9 2.66 0 5.16 1.04 7.04 2.92a9.86 9.86 0 0 1 2.93 7.01c0 5.46-4.45 9.9-9.97 9.9Zm5.33-7.44c-.29.81-1.67 1.54-2.34 1.61-.6.06-1.39.09-3.98-.84-3.36-1.25-5.53-4.33-5.69-4.54-.16-.21-1.36-1.81-1.36-3.46 0-1.65.85-2.46 1.16-2.79.31-.33.67-.41.9-.41h.65c.2 0 .47.04.72.55.27.6.92 2.09 1 2.24.08.15.12.33.02.53-.1.21-.15.33-.3.51-.15.18-.32.4-.46.54-.15.14-.3.3-.13.62.17.33.76 1.25 1.64 2.02 1.13 1 2.07 1.3 2.4 1.46.34.16.55.14.75-.09.2-.21.86-1 1.09-1.34.23-.33.46-.28.76-.19.3.09 2 .94 2.34 1.11.34.17.56.26.64.41.08.15.05.9-.23 1.71Z" />
        </svg>
    </a>
</div>
