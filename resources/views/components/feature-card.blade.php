@props(['image', 'title', 'description', 'direction' => 'translate-y-6', 'class' => ''])

<div class="group relative bg-gradient-to-b from-black/90 to-black
            border border-gray-800 rounded-2xl p-8 text-left shadow-xl
            hover:shadow-orange-500/20 transition-all duration-500 hover:-translate-y-2
            opacity-0 {{ $direction }} transition-all duration-700 ease-out {{ $class }}"
     x-data
     x-intersect:enter="$el.classList.remove('opacity-0','{{ $direction }}');
                        $el.classList.add('opacity-100','translate-x-0','translate-y-0')"
     x-intersect:leave="$el.classList.add('opacity-0','{{ $direction }}');
                        $el.classList.remove('opacity-100','translate-x-0','translate-y-0')">

    <!-- Glow -->
    <div class="absolute inset-0 bg-gradient-to-r from-orange-500/10 to-orange-400/10
                opacity-0 group-hover:opacity-100 blur-2xl transition duration-500 -z-10"></div>

    <!-- Header (image + title) -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-4 mb-4">
        <div class="flex-shrink-0 flex justify-center sm:justify-start">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-14 h-14 object-contain">
        </div>
        <h3 class="text-lg sm:text-xl font-bold text-orange-400 mt-3 sm:mt-0">
            {{ $title }}
        </h3>
    </div>

    <!-- Description -->
    <p class="text-gray-300 text-lg pt-4 leading-relaxed text-justify">
        {{ $description }}
    </p>
</div>
