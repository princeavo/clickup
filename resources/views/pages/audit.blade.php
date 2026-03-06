@extends('layouts.app')

@section('title', 'Audit Offert — Appel Stratégique Gratuit | ClicUp')

@section('hero')
    {{-- Hero compact pour cette page --}}
    <div class="relative min-h-[55vh] flex items-center justify-center overflow-hidden pt-24 pb-12">

        {{-- Fond --}}
        <div class="absolute inset-0 -z-10">
            <div class="absolute inset-0 bg-gradient-to-b from-black via-[#0a0500] to-black"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[700px] h-[500px]
                        bg-orange-500/10 rounded-full blur-3xl"></div>
            {{-- Grille --}}
            <div class="absolute inset-0 opacity-[0.04]"
                 style="background-image: linear-gradient(rgba(255,255,255,0.5) 1px, transparent 1px),
                                          linear-gradient(90deg, rgba(255,255,255,0.5) 1px, transparent 1px);
                        background-size: 48px 48px;"></div>
            {{-- Lignes horizontales orange --}}
            <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-orange-500/50 to-transparent"></div>
            <div class="absolute bottom-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-orange-500/30 to-transparent"></div>
        </div>

        <div class="max-w-4xl mx-auto px-6 text-center">

            {{-- Label --}}
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                        bg-orange-500/10 border border-orange-500/30 text-orange-400 text-sm font-semibold mb-8
                        opacity-0 translate-y-4 transition-all duration-700"
                 x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-4'); $el.classList.add('opacity-100','translate-y-0')">
                <span class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></span>
                30 min · Gratuit · Sans engagement
            </div>

            {{-- Titre --}}
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight mb-6
                       opacity-0 translate-y-6 transition-all duration-700 delay-100"
                x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                Vous avez tout testé pour augmenter vos ventes avec la <span class="text-orange-400">PUB</span>.<br>
                Et pourtant,<br>
                <span class="text-orange-400">rien ne tient ?</span>
            </h1>

            {{-- Sous-titre --}}
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed
                      opacity-0 translate-y-6 transition-all duration-700 delay-200"
               x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                Cet appel est conçu pour les marques e-commerce qui génèrent déjà des ventes,
                mais qui <strong class="text-white">stagnent, brûlent de l'argent en pub</strong>
                ou sentent que "quelque chose bloque" — sans savoir quoi.
            </p>

            {{-- Scroll indicator --}}
            <div class="mt-12 flex justify-center
                        opacity-0 transition-all duration-700 delay-500"
                 x-data x-intersect:enter="$el.classList.remove('opacity-0'); $el.classList.add('opacity-100')">
                <a href="#qualification" class="flex flex-col items-center gap-2 text-gray-500 hover:text-orange-400 transition-colors group">
                    <span class="text-xs font-medium tracking-widest uppercase">Découvrir</span>
                    <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
<main>

    {{-- ── INSIGNE CLEF ─────────────────────────────────────── --}}
    <x-animated-highlight />

    {{-- ── ALERTE INSIGHT ───────────────────────────────────── --}}
    <section class="py-12 bg-black">
        <div class="max-w-3xl mx-auto px-6">
            <div class="flex gap-4 p-6 rounded-2xl border border-orange-500/30 bg-orange-500/5
                        opacity-0 translate-y-6 transition-all duration-700"
                 x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-orange-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">Le problème n'est presque jamais la pub.</p>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Beaucoup dépensent plus en publicité alors que le problème se situe
                        <span class="text-orange-400 font-bold">AVANT LE CLIC</span>.
                        C'est <strong class="text-white">ce qu'elle renvoie</strong> qui fait la différence.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ── QUALIFICATION ────────────────────────────────────── --}}
    <section id="qualification" class="relative py-24 overflow-hidden"
             style="background: linear-gradient(180deg, #000 0%, #0a0500 50%, #000 100%);">

        <div class="absolute inset-0 -z-10">
            <div class="absolute left-0 top-1/2 w-96 h-96 bg-orange-500/5 rounded-full blur-3xl -translate-y-1/2"></div>
        </div>

        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4
                           opacity-0 translate-y-6 transition-all duration-700"
                    x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                    Cet échange est <span class="text-orange-400">pertinent si…</span>
                </h2>
                <p class="text-gray-400 max-w-xl mx-auto
                          opacity-0 translate-y-4 transition-all duration-700 delay-100"
                   x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-4'); $el.classList.add('opacity-100','translate-y-0')">
                    Cet appel n'est pas un audit théorique. C'est un point de clarté.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @php
                    $qualifs = [
                        [
                            'icon'  => 'chart',
                            'title' => 'Instabilité des résultats',
                            'text'  => 'Vous avez déjà validé un produit, mais les résultats publicitaires sont instables ou plafonnent sans raison aparente.',
                        ],
                        [
                            'icon'  => 'cart',
                            'title' => 'Problème de conversion',
                            'text'  => 'Votre page produit ne fait pas le travail : CTR correct, mais peu d\'ajouts panier ou d\'achats finalisés.',
                        ],
                        [
                            'icon'  => 'question',
                            'title' => 'Vous testez sans comprendre',
                            'text'  => 'Vous avez testé des créas, des audiences, des structures… sans savoir ce qui bloque vraiment.',
                        ],
                        [
                            'icon'  => 'compass',
                            'title' => 'Besoin de clarté',
                            'text'  => 'Vous voulez des décisions claires, pas des "tests au hasard". Vous êtes prêt à remettre en question votre méthode.',
                        ],
                    ];
                @endphp

                @foreach($qualifs as $i => $q)
                    <div class="flex gap-5 p-6 rounded-2xl border border-gray-800 bg-[#111]/80
                                hover:border-orange-500/40 hover:bg-[#1a1000]/60
                                transition-all duration-300 group
                                opacity-0 translate-y-6"
                         style="transition-delay: {{ $i * 100 }}ms"
                         x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                        <div class="flex-shrink-0 w-11 h-11 rounded-xl bg-orange-500/15
                                    group-hover:bg-orange-500/25 transition-colors
                                    flex items-center justify-center">
                            @if($q['icon'] === 'chart')
                                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            @elseif($q['icon'] === 'cart')
                                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            @elseif($q['icon'] === 'question')
                                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            @else
                                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-bold text-white mb-1 group-hover:text-orange-400 transition-colors">
                                {{ $q['title'] }}
                            </h3>
                            <p class="text-sm text-gray-400 leading-relaxed">{{ $q['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ── CE QUE VOUS REPARTEZ AVEC ───────────────────────── --}}
    <section class="py-24 bg-black">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4
                           opacity-0 translate-y-6 transition-all duration-700"
                    x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                    À la fin, vous repartez avec
                    <span class="text-orange-400">tout ça</span>
                </h2>
                <x-animated-highlight />
            </div>

            <div class="space-y-4 max-w-3xl mx-auto">
                @php
                    $deliverables = [
                        'Une lecture claire de ce qui empêche votre boutique de scaler.',
                        'La priorité exacte à corriger : offre, page, créa, structure ou message.',
                        'Une direction stratégique nette — même si on ne travaille pas ensemble.',
                        'La confirmation que votre business est prêt à scaler (ou pourquoi il ne l\'est pas encore).',
                        '30 minutes de clarté qui valent plus que des mois de tests au hasard.',
                    ];
                @endphp

                @foreach($deliverables as $i => $item)
                    <div class="flex items-start gap-4 p-5 rounded-2xl border border-gray-800
                                bg-[#111]/60 hover:border-orange-500/30 hover:bg-[#181000]/60
                                transition-all duration-300
                                opacity-0 translate-x-6"
                         style="transition-delay: {{ $i * 80 }}ms"
                         x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-x-6'); $el.classList.add('opacity-100','translate-x-0')">
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-orange-500 flex items-center justify-center shadow-md shadow-orange-500/30">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p class="text-gray-200 leading-relaxed">{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ── DÉROULÉ ──────────────────────────────────────────── --}}
    <section class="py-24 overflow-hidden"
             style="background: linear-gradient(180deg, #000 0%, #0a0500 100%);">
        <div class="max-w-5xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                {{-- Texte --}}
                <div class="opacity-0 translate-y-6 transition-all duration-700"
                     x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">
                        Comment ça <span class="text-orange-400">se passe ?</span>
                    </h2>
                    <p class="text-gray-400 mb-8 leading-relaxed">
                        En un visio de <strong class="text-white">30 minutes</strong>, vous parlez de votre situation réelle.
                        J'analyse, je pose les bonnes questions pour comprendre où ça bloque.
                        Puis à la fin, on décide si une suite a du sens — ou non.
                    </p>

                    <div class="space-y-5">
                        @php
                            $steps = [
                                ['num' => '01', 'title' => 'Vous réservez', 'text' => 'Choisissez un créneau dans l\'agenda ci-dessous. C\'est gratuit, sans CB, sans engagement.'],
                                ['num' => '02', 'title' => 'On se retrouve en visio', 'text' => 'Vous partagez votre situation, vos chiffres, ce qui bloque. Aucun discours commercial, juste de l\'analyse.'],
                                ['num' => '03', 'title' => 'Vous repartez avec un plan', 'text' => 'En 30 min, vous savez exactement quoi corriger en priorité pour débloquer votre croissance.'],
                            ];
                        @endphp
                        @foreach($steps as $i => $step)
                            <div class="flex gap-4 opacity-0 translate-x-4"
                                 style="transition-delay: {{ ($i+1) * 100 }}ms; transition: all 0.6s ease;"
                                 x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-x-4'); $el.classList.add('opacity-100','translate-x-0')">
                                <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-orange-500/15 border border-orange-500/30
                                            flex items-center justify-center">
                                    <span class="text-xs font-bold text-orange-400">{{ $step['num'] }}</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-1">{{ $step['title'] }}</h4>
                                    <p class="text-sm text-gray-400 leading-relaxed">{{ $step['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Carte visuelle --}}
                <div class="relative opacity-0 translate-y-6 transition-all duration-700 delay-200"
                     x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                    <div class="relative p-8 rounded-3xl border border-orange-500/30
                                bg-gradient-to-br from-[#1c1000]/80 to-[#0a0500]/80
                                backdrop-blur-xl shadow-2xl shadow-orange-500/10">
                        {{-- Glow --}}
                        <div class="absolute -inset-px rounded-3xl bg-gradient-to-br from-orange-500/10 to-transparent -z-10"></div>

                        <div class="text-center mb-6">
                            <div class="w-16 h-16 mx-auto rounded-2xl bg-orange-500 flex items-center justify-center
                                        shadow-lg shadow-orange-500/40 mb-4">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">Appel Stratégique Offert</h3>
                            <p class="text-orange-400 font-semibold mt-1">30 minutes · Visio · Gratuit</p>
                        </div>

                        <div class="space-y-3">
                            @foreach(['Analyse de votre situation réelle', 'Diagnostic de ce qui bloque', 'Priorité claire à corriger', 'Sans discours commercial'] as $pt)
                                <div class="flex items-center gap-3">
                                    <div class="w-5 h-5 rounded-full bg-green-500/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm text-gray-300">{{ $pt }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── DISQUALIFICATION ─────────────────────────────────── --}}
    <section class="py-20 bg-black">
        <div class="max-w-3xl mx-auto px-6">
            <div class="p-8 rounded-2xl border border-red-500/20 bg-red-500/5
                        opacity-0 translate-y-6 transition-all duration-700"
                 x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-red-500/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </span>
                    Par contre, on ne discutera pas si…
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach([
                        'Vous cherchez une "recette magique"',
                        'Vous débutez sans aucune vente',
                        'Vous voulez juste "tester un appel"',
                        'Vous n\'êtes pas prêt à remettre en question votre méthode',
                    ] as $disq)
                        <div class="flex items-center gap-3 text-sm text-gray-400">
                            <svg class="w-4 h-4 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            {{ $disq }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ── PREUVES SOCIALES ─────────────────────────────────── --}}
    <section class="py-20 overflow-hidden"
             style="background: linear-gradient(180deg, #000 0%, #0a0500 50%, #000 100%);">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-extrabold text-white
                           opacity-0 translate-y-6 transition-all duration-700"
                    x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                    L'expérience <span class="text-orange-400">terrain derrière cet appel</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $proofs = [
                        ['value' => '13+',  'label' => 'marques accompagnées',           'suffix' => ''],
                        ['value' => '1 000+','label' => 'créatives testées sur Meta & TikTok', 'suffix' => ''],
                        ['value' => '1M€+', 'label' => 'générés via nos stratégies pub', 'suffix' => ''],
                    ];
                @endphp
                @foreach($proofs as $i => $proof)
                    <div class="text-center p-8 rounded-2xl border border-gray-800 bg-[#111]/80
                                hover:border-orange-500/30 transition-all duration-300
                                opacity-0 translate-y-6"
                         style="transition-delay: {{ $i * 100 }}ms"
                         x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                        <p class="text-4xl md:text-5xl font-extrabold text-orange-400 mb-2">{{ $proof['value'] }}</p>
                        <p class="text-gray-400 text-sm leading-snug">{{ $proof['label'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Citation --}}
            <div class="mt-12 text-center max-w-xl mx-auto
                        opacity-0 translate-y-4 transition-all duration-700 delay-300"
                 x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-4'); $el.classList.add('opacity-100','translate-y-0')">
                <blockquote class="text-lg md:text-xl text-gray-300 italic leading-relaxed">
                    "La clarté est inconfortable.<br>
                    Mais elle coûte toujours moins cher que l'approximation."
                </blockquote>
            </div>
        </div>
    </section>

    {{-- ── CALENDLY ─────────────────────────────────────────── --}}
    <section id="reserver" class="py-24 bg-black">
        <div class="max-w-4xl mx-auto px-6 text-center">

            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4
                       opacity-0 translate-y-6 transition-all duration-700"
                x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">
                Accédez à <span class="text-orange-400">l'agenda 👇</span>
            </h2>
            <x-animated-highlight />
            <p class="text-gray-400 mt-6 mb-10 max-w-xl mx-auto
                      opacity-0 translate-y-4 transition-all duration-700 delay-100"
               x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-4'); $el.classList.add('opacity-100','translate-y-0')">
                Votre appel stratégique offert · Session de 30 min · Vous faites moins de 15 000€/mois
                avec votre boutique et vous voulez passer un cap ?
            </p>

            {{-- Widget Calendly --}}
            <div class="relative opacity-0 translate-y-6 transition-all duration-700 delay-200"
                 x-data x-intersect:enter="$el.classList.remove('opacity-0','translate-y-6'); $el.classList.add('opacity-100','translate-y-0')">

                {{-- Halo orange derrière --}}
                <div class="absolute -inset-4 bg-orange-500/5 rounded-3xl blur-2xl -z-10"></div>

                <div class="rounded-2xl overflow-hidden border border-gray-800 shadow-2xl shadow-orange-500/10">
                    <div id="calendly-widget"
                         class="calendly-inline-widget"
                         data-url="{{ $calendlyUrl }}?hide_gdpr_banner=1&background_color=0a0a0a&text_color=ffffff&primary_color=f97316"
                         style="min-width:320px; height:900px;"></div>
                </div>

                <script>
                    window.addEventListener('message', function (e) {
                        if (e.data && e.data.event && e.data.event === 'calendly.page_height') {
                            var h = e.data.payload && e.data.payload.height;
                            if (h) {
                                var el = document.getElementById('calendly-widget');
                                if (el) el.style.height = (parseInt(h) + 16) + 'px';
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </section>

    <x-whatsapp-button />

</main>

{{-- Script Calendly --}}
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
@endsection
