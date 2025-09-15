@props([
    'href' => '#',
    'variant' => 'primary',
    'class' => '',
])

@php
    $base = "inline-block px-6 py-2.5 rounded-full font-semibold text-center transition-all duration-300";

    $variants = [
        'primary' => "bg-gradient-to-r from-[#ff8c00] to-[#ffb845] text-black shadow-md hover:scale-105",
        'outline' => "border border-[#ffb845] text-white bg-transparent hover:bg-gradient-to-r hover:from-[#ffb845] hover:to-[#ff8c00] hover:text-black",
        'ebook'   => "border border-[#ffb845] text-white bg-transparent hover:bg-gradient-to-r hover:from-[#ffb845] hover:to-[#ff8c00] hover:text-black",
        'neon'    => "relative text-white bg-gradient-to-r from-[#ff9900] to-[#ff6600] shadow-[0_8px_40px_rgba(255,120,0,0.25)] hover:scale-105",
    ];

    // si le variant demandé n’existe pas, fallback sur primary
    $variantClass = $variants[$variant] ?? $variants['primary'];
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => trim("$base $variantClass $class")]) }}>
    {{ $slot }}
</a>


{{--

@props([
    'href' => '#',
    'variant' => 'primary',
    'class' => '',
])

@php
    $base =
        'inline-flex select-none rounded-xl p-[2px] focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-400/10';

    $variants = [
        'primary' => 'bg-gradient-to-r from-[#ff8c00] to-[#ffb845] text-black shadow-md hover:scale-105',
        'outline' =>
            'border border-[#ffb845] text-white bg-transparent hover:bg-gradient-to-r hover:from-[#ffb845] hover:to-[#ff8c00] hover:text-black',
        'ebook' =>
            'border border-[#ffb845] text-white bg-transparent hover:bg-gradient-to-r hover:from-[#ffb845] hover:to-[#ff8c00] hover:text-black',
        'neon' =>
            'relative text-white bg-gradient-to-r from-[#ff9900] to-[#ff6600] shadow-[0_8px_40px_rgba(255,120,0,0.25)] hover:scale-105',
        // Variante personnalisée "custom-orange" avec ton code HTML
        'custom-orange' =>
            'group relative mt-8 inline-flex select-none rounded-xl p-[2px] focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-400/10',
    ];

    // si le variant demandé n’existe pas, fallback sur primary
    $variantClass = $variants[$variant] ?? $variants['primary'];
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => trim("$base $variantClass $class")]) }}>
    <!-- Fond orange par défaut -->
    <span
        class="absolute inset-0 rounded-xl bg-orange-400 opacity-50 transition-all duration-300 group-hover:bg-transparent"></span>

    <!-- Texte du bouton avec animation au hover -->
    <span
        class="relative rounded-[10px] px-7 py-4 text-base md:text-lg font-semibold text-white shadow-[0_8px_24px_rgba(255,165,0,0.25)]
               transition-transform duration-300 group-hover:translate-y-[-1px] group-active:translate-y-[0px]">
        {{ $slot }}
    </span>

    <!-- Bordure transparente par défaut -->
    <span
        class="absolute inset-0 rounded-xl border-2 border-transparent transition-all duration-300 group-hover:border-orange-400"></span>
</a> --}}
