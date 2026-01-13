@props([
    'width' => '7rem',
    'height' => '0.2rem',
    'class' => '',
])

{{-- Composant : barre animée sous un titre --}}
<div x-data="{ inView: false }" x-intersect:enter="inView = true" x-intersect:leave="inView = false"
    class="mx-auto my-4 relative overflow-hidden {{ $class }}"
    style="width: {{ $width }}; height: {{ $height }};">
    <div class="absolute inset-0 rounded-full origin-left transform transition-transform duration-700 bg-orange-400"
        :class="inView ? 'scale-x-100' : 'scale-x-0'"
        style="transform-origin: left;">
    </div>
</div>
