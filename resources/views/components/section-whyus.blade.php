@props(['title', 'features'])

<section class="relative w-full py-20 px-6 md:px-12" x-data>
    <div class="max-w-7xl mx-auto">
        <!-- Titre -->
        <h2 class="text-3xl md:text-4xl font-extrabold text-center text-white mb-16
                   opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6');
                               $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6');
                               $el.classList.remove('opacity-100','translate-y-0')">
            {{ $title }}
        </h2>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($features as $i => $feature)
                @php
                    $direction = match($i % 3) {
                        0 => '-translate-x-10', // depuis la gauche
                        1 => 'translate-y-10', // depuis le bas
                        2 => 'translate-x-10', // depuis la droite
                    };
                @endphp

                <x-feature-card
                    :image="$feature['image']"
                    :title="$feature['title']"
                    :description="$feature['description']"
                    :direction="$direction"
                />
            @endforeach
        </div>
    </div>
</section>
