@props([
    'title',
    'subtitle' => '',
    'cta' => null,
    'ctaUrl' => '#',
    'ctaVariant' => 'primary',
    'image' => null,
])

<section x-data="{ shown: false }" x-intersect="shown = true" x-intersect:leave="shown = false"
    class="relative py-20 text-white overflow-hidden bg-gradient-to-b from-[#0a1f2d] to-[#04131c]"
    style="background-image: url('crea-bg.jpg'); background-size: cover; background-position: center;">

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Image -->
        <div class="relative transform transition-all duration-1000"
            :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-20'">
            <div
                class="rounded-2xl overflow-hidden shadow-2xl rotate-[-3deg] hover:rotate-0 transition-transform duration-700">
                <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-auto object-cover">
            </div>
        </div>

        <!-- Texte -->
        <div class="text-left lg:pl-10" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
            style="transition: all 0.8s ease-in-out 0.3s">

            <!-- Titre -->
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                <span class="text-orange-400">{{ $title }}</span>
            </h2>

            <!-- Sous-titre -->
            @if ($subtitle)
                <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                    {!! $subtitle !!}
                </p>
            @endif

            <!-- CTA -->
            @if ($cta)
                <x-button :href="$ctaUrl" :variant="$ctaVariant">
                    {{ $cta }}
                </x-button>
            @endif
        </div>
    </div>
</section>
