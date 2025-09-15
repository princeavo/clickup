@props([
    'title' => 'Ton prospect scrolle ?',
    'subtitle' => 'Nous faisons en sorte qu’il s’arrête, qu’il clique et qu’il achète',
])

<section x-data="{ shown: false }"
         x-intersect="shown = true"
         x-intersect:leave="shown = false"
         class="relative py-20 text-white bg-cover bg-center overflow-hidden"
         style="background-image: url('{{ asset('prospect-bg.jpg') }}');">

    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

        <!-- Texte gauche -->
        <div class="text-left">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 transition-all duration-700"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                <span class="text-orange-400 italic">{!! $title !!}</span>
            </h2>

            <p class="text-gray-300 max-w-md leading-relaxed transition-all duration-700 delay-200"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                {!! $subtitle !!}
            </p>
        </div>

        <!-- Image steps à droite -->
        <div class="relative flex justify-center md:justify-end items-center">
            <img src="{{ asset('prospect-steps.png') }}"
                 alt="Étapes du prospect"
                 class="w-72 sm:w-80 md:w-[420px] transition-all duration-700"
                 :class="shown ? 'opacity-100 scale-100 translate-x-0' : 'opacity-0 scale-50 translate-x-20'">
        </div>

    </div>
</section>
