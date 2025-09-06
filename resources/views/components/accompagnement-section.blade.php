@props(['title', 'subtitle', 'cta', 'items' => []])

<section
    x-data="{ shown: false }"
    x-intersect="shown = true"
    x-intersect:leave="shown = false"
    class="relative py-20 bg-[#0a1f2d] text-white overflow-hidden">

    <!-- Halo décoratif -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-purple-600/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-pink-500/20 rounded-full blur-2xl animate-pulse delay-700"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 text-center relative z-10">

        <!-- Title -->
        <h2 class="text-3xl md:text-4xl font-bold mb-6 transition-all duration-1000 transform"
            :class="shown ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-6 scale-95'">
            {{ $title }}
        </h2>

        <!-- Subtitle -->
        <p class="text-gray-300 max-w-2xl mx-auto mb-10 leading-relaxed transition-all duration-1000 delay-200 transform"
           :class="shown ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-6 scale-95'">
            {!! nl2br(e($subtitle)) !!}
        </p>

        <!-- CTA -->
        <a href="#"
           class="relative inline-block px-8 py-3 mb-16 text-white font-semibold rounded-full
                  bg-gradient-to-r from-pink-500 via-purple-500 to-indigo-500 shadow-lg
                  overflow-hidden transition-transform duration-500 hover:scale-110 group
                  animate-glow-pulse"
           :class="shown ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-6 scale-95'">
            <span class="relative z-10">{{ $cta }}</span>
            <!-- Shine effect -->
            <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
        </a>

        <!-- Items -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($items as $index => $item)
                <div class="relative group p-8 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 shadow-lg
                            transition-all duration-700 transform overflow-hidden"
                     :class="shown ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-8 scale-95'"
                     style="transition-delay: {{ $index * 200 }}ms">

                    <!-- Aura -->
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-purple-500/10 to-pink-500/10 opacity-0 group-hover:opacity-100 blur-2xl transition duration-500"></div>

                    <!-- Icon -->
                    <div class="relative w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full
                                bg-gradient-to-r from-indigo-500 to-purple-600 shadow-lg
                                transform transition duration-500 group-hover:scale-125 group-hover:rotate-6 group-hover:-translate-y-1">
                        <img src="{{ Storage::disk('public')->url($item['icon']) }}" alt="{{ $item['title'] }}" class="w-8 h-8" />
                    </div>

                    <!-- Title -->
                    <h3 class="relative text-xl font-semibold mb-3 transition group-hover:text-purple-300">
                        {{ $item['title'] }}
                    </h3>

                    <!-- Description -->
                    <p class="relative text-gray-300 text-sm leading-relaxed">
                        {{ $item['description'] }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- CTA bottom -->
        <div class="mt-16 transition-all duration-1000 delay-500 transform"
             :class="shown ? 'opacity-100 translate-y-0 scale-100' : 'opacity-0 translate-y-8 scale-95'">
            <a href="#"
               class="inline-block px-8 py-3 text-white font-semibold rounded-full
                      bg-gradient-to-r from-purple-600 to-indigo-500 shadow-lg
                      hover:scale-110 transition-transform duration-500 animate-glow-pulse">
                {{ $cta }}
            </a>
        </div>
    </div>
</section>

<!-- Effets supplémentaires -->
<style>
@keyframes glowPulse {
  0%, 100% { box-shadow: 0 0 20px rgba(168, 85, 247, 0.4), 0 0 40px rgba(236, 72, 153, 0.3); }
  50% { box-shadow: 0 0 30px rgba(236, 72, 153, 0.6), 0 0 60px rgba(139, 92, 246, 0.5); }
}
.animate-glow-pulse {
  animation: glowPulse 3s infinite alternate;
}
</style>
