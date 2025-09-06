@props(['image', 'title', 'description', 'direction' => 'translate-y-6'])

<div class="group relative bg-gradient-to-b from-gray-900/70 to-black/70
            border border-gray-800 rounded-2xl p-6 text-center shadow-xl
            hover:shadow-purple-500/20 transition-all duration-500 hover:-translate-y-2
            opacity-0 {{ $direction }} transition-all duration-700 ease-out" x-data

     x-intersect:enter="$el.classList.remove('opacity-0','{{ $direction }}');
                        $el.classList.add('opacity-100','translate-x-0','translate-y-0')"

     x-intersect:leave="$el.classList.add('opacity-0','{{ $direction }}');
                        $el.classList.remove('opacity-100','translate-x-0','translate-y-0')">

    <!-- Glow -->
    <div class="absolute inset-0 bg-gradient-to-r from-fuchsia-500/10 to-orange-500/10
                opacity-0 group-hover:opacity-100 blur-2xl transition duration-500 -z-10"></div>

    <!-- Image -->
    <div class="flex justify-center mb-4">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-20 h-20 object-contain">
    </div>

    <!-- Title -->
    <h3 class="text-xl font-bold text-white mb-3">{{ $title }}</h3>

    <!-- Description -->
    <p class="text-gray-300 text-sm leading-relaxed">{{ $description }}</p>
</div>
