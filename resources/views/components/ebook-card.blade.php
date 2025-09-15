@props([
    'ebook' => [],
    'index' => 0,
])

<div
    class="relative rounded-2xl p-6 flex flex-col items-center text-center transition-all duration-500 ease-out cursor-pointer group
           border bg-black/90 hover:scale-105 hover:z-30"
    :class="active === {{ $index }} ? 'border-[#ffb845]' : 'border-gray-700'">

    <!-- Titre -->
    <h3 class="text-lg font-semibold text-[#ffb845] mb-4">
        {{ $ebook['title'] }}
    </h3>

    <!-- Image -->
    <div class="w-full h-48 flex items-center justify-center mb-4 rounded-lg overflow-hidden">
        <img src="{{ $ebook['image'] }}" alt="{{ $ebook['title'] }}"
            class="object-contain max-h-full transition-transform duration-700 group-hover:scale-110">
    </div>

    <!-- Subtitle -->
    @if (!empty($ebook['subtitle']))
        <p class="text-gray-300 text-sm leading-relaxed mb-6">
            {{ $ebook['subtitle'] }}
        </p>
    @endif

    <!-- CTA -->
    <x-button variant="ebook" :href="$ebook['link'] ?? '#'">
        {{ $ebook['cta'] ?? 'Obtenir' }}
    </x-button>
</div>
