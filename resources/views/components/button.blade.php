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
