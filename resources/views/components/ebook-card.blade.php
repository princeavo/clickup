@props([
    'ebook' => [],
    'index' => 0,
])

<div class="relative rounded-2xl p-8 flex flex-col items-center text-center transition-all duration-500 ease-out group
           bg-black backdrop-blur-lg border border-orange-400/20
           hover:border-orange-400/60 hover:shadow-2xl hover:shadow-orange-500/20 hover:-translate-y-2 min-h-[520px]">

    <!-- Titre -->
    <h3 class="text-xl md:text-2xl font-bold text-orange-400 mb-6 min-h-[60px] flex items-center">
        {{ $ebook['title'] }}
    </h3>

    <!-- Image -->
    <div class="w-full h-56 flex items-center justify-center mb-6 rounded-xl overflow-hidden bg-black/20">
        <img src="{{ $ebook['image'] }}" alt="{{ $ebook['title'] }}"
            class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
    </div>

    <!-- Subtitle -->
    @if (!empty($ebook['subtitle']))
        <p class="text-gray-300 text-sm md:text-base leading-relaxed mb-6 flex-grow">
            {{ $ebook['subtitle'] }}
        </p>
    @endif

    <!-- CTA -->
    <div class="mt-auto w-full">
        <x-button variant="ebook" :href="$ebook['link'] ?? '#'" class="w-full">
            {{ $ebook['cta'] ?? 'Obtenir' }}
        </x-button>
    </div>
</div>
