@props(['title', 'subtitle', 'cta', 'items' => []])

<section class="relative py-20 bg-[#0a1f2d] text-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 text-center">

        <!-- Title -->
        <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-fade-in-up">
            {{ $title }}
        </h2>

        <!-- Subtitle -->
        <p class="text-gray-300 max-w-2xl mx-auto mb-10 leading-relaxed animate-fade-in-up delay-200">
            {!! nl2br(e($subtitle)) !!}
        </p>

        <!-- CTA -->
        <a href="#"
           class="inline-block px-6 py-3 mb-16 text-white font-semibold rounded-full bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300">
            {{ $cta }}
        </a>

        <!-- Items -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($items as $index => $item)
                <div
                    class="relative group p-8 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 shadow-lg hover:shadow-2xl hover:-translate-y-2 transition duration-500 animate-fade-in-up delay-{{ $index * 150 }}">

                    <!-- Icon -->
                    <div
                        class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ Storage::disk('public')->url($item['icon']) }}" alt="{{ $item['title'] }}" class="w-8 h-8" />
                    </div>

                    <!-- Title -->
                    <h3 class="text-xl font-semibold mb-3">{{ $item['title'] }}</h3>

                    <!-- Description -->
                    <p class="text-gray-300 text-sm leading-relaxed">
                        {{ $item['description'] }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- CTA bottom -->
        <div class="mt-16">
            <a href="#"
               class="inline-block px-6 py-3 text-white font-semibold rounded-full bg-gradient-to-r from-purple-600 to-indigo-500 shadow-lg hover:scale-105 transition-transform">
                {{ $cta }}
            </a>
        </div>
    </div>
</section>
