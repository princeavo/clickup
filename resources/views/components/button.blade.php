@props([
    'href' => '#',
    'variant' => 'primary',
    'class' => '',
    'type' => null,
])

@php
    // Style de base unifié (comme "Voir nos success stories")
    $base = "inline-block px-8 py-3 rounded-xl font-bold text-center transition-all duration-300";

    $variants = [
        'primary' => "text-[#111111] bg-gradient-to-r from-[#ffb845] to-[#ff8c00] hover:scale-105 hover:shadow-lg hover:shadow-orange-500/30",
        'outline' => "border-2 border-[#ffb845] text-white bg-transparent hover:bg-gradient-to-r hover:from-[#ffb845] hover:to-[#ff8c00] hover:text-[#111111] hover:scale-105 hover:shadow-lg hover:shadow-orange-500/30",
        'ebook'   => "border-2 border-[#ffb845] text-white bg-transparent hover:bg-gradient-to-r hover:from-[#ffb845] hover:to-[#ff8c00] hover:text-[#111111] hover:scale-105 hover:shadow-lg hover:shadow-orange-500/30",
        'neon'    => "text-[#111111] bg-gradient-to-r from-[#ffb845] to-[#ff8c00] hover:scale-105 hover:shadow-lg hover:shadow-orange-500/30",
    ];

    // si le variant demandé n'existe pas, fallback sur primary
    $variantClass = $variants[$variant] ?? $variants['primary'];
@endphp

@if($type === 'submit')
    <button type="submit" {{ $attributes->merge(['class' => trim("$base $variantClass $class")]) }}>
        {{ $slot }}
    </button>
@else
    <a href="{{ $href }}" {{ $attributes->merge(['class' => trim("$base $variantClass $class")]) }}>
        {{ $slot }}
    </a>
@endif
