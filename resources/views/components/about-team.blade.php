@props([
    'team' => [],
])

<section class="relative bg-cover bg-center bg-no-repeat py-24 overflow-hidden"
    style="background-image: url('{{ asset('images/about-team-bg.png') }}');">
    <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-12">

        {{-- Titre principal --}}
        <h2 class="text-center text-3xl md:text-4xl font-extrabold text-white opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            Derrière chaque campagne, <span class="text-orange-400">une équipe dédiée</span> à ton succès
        </h2>

        <x-animated-highlight />

        {{-- Grille équipe --}}
        <div class="mt-16 grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($team as $i => $member)
                <div class="group relative bg-white/10 backdrop-blur-sm rounded-2xl shadow-lg overflow-hidden
         border border-orange-400/20 hover:border-orange-400
         transition-all duration-700 ease-out hover:-translate-y-2 hover:shadow-2xl
         opacity-0 translate-y-10"
                    style="transition-delay: {{ $i * 150 }}ms" x-data
                    x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')"
                    x-intersect:leave="$el.classList.add('opacity-0','translate-y-10'); $el.classList.remove('opacity-100','translate-y-0')">

                    {{-- Photo --}}
                    <div class="aspect-square overflow-hidden">
                        <img src="{{ $member['photo'] }}" alt="{{ $member['name'] }}"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>

                    {{-- Overlay subtil --}}
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition">
                    </div>

                    {{-- Infos membre --}}
                    <div class="p-6 text-center relative z-10">
                        <h4 class="text-xl font-bold text-white">{{ $member['name'] }}</h4>
                        <p class="text-orange-400 font-medium text-base mt-1">{{ $member['role'] }}</p>
                        <p class="text-white/80 text-sm mt-1">{{ $member['position'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
