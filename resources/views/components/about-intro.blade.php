<section class="relative bg-cover bg-center bg-no-repeat py-24 overflow-hidden"
    style="background-image: url('{{ asset('images/about-intro-bg.png') }}');">
    <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-12">

        {{-- Titre principal --}}
        <h2 class="text-center text-3xl md:text-4xl font-extrabold text-white opacity-0 translate-y-6 transition-all duration-700 ease-out"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            <span class="text-orange-400">Pourquoi</span> nous avons créé ClickUp
        </h2>

        <x-animated-highlight />

        {{-- Texte intro --}}
        <div class="mt-8 text-lg md:text-xl text-white/90 leading-relaxed max-w-4xl mx-auto text-center opacity-0 translate-y-6 transition-all duration-700 ease-out delay-150"
            x-data
            x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')"
            x-intersect:leave="$el.classList.add('opacity-0','translate-y-6'); $el.classList.remove('opacity-100','translate-y-0')">
            <p>
                Le constat était brutal : trop d'agences vendent du rêve à prix d'or, mais livrent des résultats
                décevants.
                ClickUp naît d'une conviction simple : apporter de la performance réelle.
            </p>
            <p class="mt-4 font-semibold text-orange-400">
                Facebook & TikTok Ads.
            </p>
            <p class="mt-4">
                Notre approche ? Laser-focus sur ces deux plateformes, zéro service inutile, que des résultats qui se
                voient sur ton compte en banque.
            </p>
        </div>

    </div>
</section>
