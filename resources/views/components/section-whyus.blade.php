@props(['features'])

<section
    x-data
    class="relative w-full py-20 px-6 md:px-12 bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('storage/accompagnements/bg-whyus.png') }}');background-size: cover;background-position: center;background-repeat: no-repeat;">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/80 -z-10"></div>

    <div class="max-w-7xl mx-auto">
        <!-- Titre -->
        <h2
            class="text-3xl md:text-4xl font-extrabold text-center mb-16
                   opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                               $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                               $el.classList.remove('opacity-100','translate-y-0')"
        >
            Pourquoi <span class="text-orange-400">travailler avec nous ?</span>
        </h2>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($features as $index => $feature)
                @php
                    $direction = match($index) {
                        0 => '-translate-x-10', // gauche
                        1 => 'translate-y-10',  // bas
                        2 => 'translate-x-10',  // droite
                        default => 'translate-y-6',
                    };
                @endphp

                <x-feature-card
                    :image="$feature['image']"
                    :title="$feature['title']"
                    :description="$feature['description']"
                    :direction="$direction"
                    class="delay-{{ $index * 200 }}"
                />
            @endforeach
        </div>
    </div>
</section>
