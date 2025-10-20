@extends('layouts.app')

@section('title', '500 - Erreur interne')

@section('content')
    <section class="relative overflow-hidden bg-gradient-to-b from-orange-950 via-black to-black py-24 md:py-40">
        <div class="absolute inset-0 -z-10">
            <div
                class="absolute -top-28 left-10 h-72 w-72 rounded-full bg-[#ff8c00]/18 blur-[160px] animate-[float_12s_ease-in-out_infinite]">
            </div>
            <div
                class="absolute bottom-0 right-0 h-[28rem] w-[28rem] rounded-full bg-[#ff5f40]/18 blur-[200px] animate-[float_18s_ease-in-out_infinite]">
            </div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,140,0,0.12),_transparent_60%)]"></div>
        </div>

        <div
            class="relative mx-auto flex max-w-6xl flex-col gap-16 px-6 lg:flex-row lg:items-center lg:justify-between">
            <div class="max-w-2xl">
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-orange-500/30 bg-orange-500/10 px-4 py-1 text-sm font-semibold uppercase tracking-wide text-orange-300">
                    500 • Erreur interne
                </span>

                <h1 class="mt-8 text-4xl font-extrabold tracking-tight text-white md:text-6xl">
                    On a rencontré un imprévu.
                </h1>
                <p class="mt-6 text-lg text-orange-100/80 md:text-xl">
                    L’application a rencontré une erreur inattendue. Nos développeurs ont été avertis et vont corriger la
                    situation rapidement.
                </p>

                <div class="mt-10 flex flex-col gap-4 sm:flex-row sm:items-center">
                    <a href="{{ url('/') }}"
                        class="group inline-flex items-center justify-center rounded-full bg-gradient-to-r from-[#ffb845] to-[#ff8c00] px-7 py-3 text-base font-semibold text-black shadow-lg shadow-orange-500/30 transition-transform duration-300 hover:scale-105">
                        Retourner à l’accueil
                        <svg class="ml-2 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a href="{{ url('/support') }}"
                        class="inline-flex items-center justify-center rounded-full border border-orange-400/30 px-7 py-3 text-base font-semibold text-orange-200 transition hover:border-orange-300 hover:text-orange-100">
                        Contacter le support
                    </a>
                </div>

                <div class="mt-12 grid gap-4 sm:grid-cols-2">
                    <a href="{{ url('/results') }}"
                        class="group flex items-center justify-between rounded-2xl border border-orange-500/10 bg-orange-500/5 px-5 py-4 text-sm text-orange-100 transition hover:border-orange-400/40 hover:bg-orange-500/10">
                        <div>
                            <p class="font-semibold text-orange-50">Découvrir nos succès clients</p>
                            <p class="mt-1 text-xs text-orange-100/70">Pendant que l’on règle ça, inspire-toi de leurs résultats</p>
                        </div>
                        <span
                            class="ml-4 inline-flex h-9 w-9 items-center justify-center rounded-full bg-orange-500/20 text-orange-200 transition group-hover:bg-orange-500/40">
                            →
                        </span>
                    </a>
                    <a href="{{ url('/agency') }}"
                        class="group flex items-center justify-between rounded-2xl border border-orange-500/10 bg-orange-500/5 px-5 py-4 text-sm text-orange-100 transition hover:border-orange-400/40 hover:bg-orange-500/10">
                        <div>
                            <p class="font-semibold text-orange-50">Voir comment on peut t’aider</p>
                            <p class="mt-1 text-xs text-orange-100/70">Notre équipe est toujours prête à débloquer ta croissance</p>
                        </div>
                        <span
                            class="ml-4 inline-flex h-9 w-9 items-center justify-center rounded-full bg-orange-500/20 text-orange-200 transition group-hover:bg-orange-500/40">
                            →
                        </span>
                    </a>
                </div>
            </div>

            <div
                class="relative w-full max-w-md rounded-3xl border border-orange-500/10 bg-orange-500/5 p-8 text-orange-100 shadow-lg shadow-orange-500/20 backdrop-blur">
                <div class="absolute -top-8 right-10 h-16 w-16 rounded-full bg-orange-500/30 blur-xl"></div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-300">Que faire ensuite ?</p>
                <h2 class="mt-4 text-2xl font-bold text-white">Nos conseils pendant la résolution</h2>
                <p class="mt-4 text-sm leading-relaxed text-orange-100/80">
                    Pour éviter toute perte et nous aider à reproduire le problème, suis ces quelques bonnes pratiques avant
                    de réessayer.
                </p>

                <ul class="mt-6 space-y-3 text-sm leading-relaxed">
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-1 flex h-5 w-5 items-center justify-center rounded-full bg-orange-500/30 text-xs text-orange-100">1</span>
                        <span>Note le parcours et l’heure de l’erreur pour partager ces détails à notre support.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-1 flex h-5 w-5 items-center justify-center rounded-full bg-orange-500/30 text-xs text-orange-100">2</span>
                        <span>Patiente quelques minutes avant de retenter, le temps que la relance automatique s’effectue.</span>
                    </li>
                </ul>

                <a href="{{ url('/support') }}"
                    class="mt-8 inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-[#ffb845] to-[#ff8c00] px-6 py-3 text-sm font-semibold text-black shadow-md shadow-orange-500/30 transition hover:scale-[1.02]">
                    Signaler l’erreur
                </a>
            </div>
        </div>
    </section>

    <style>
        @keyframes float {
            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1);
            }

            50% {
                transform: translate3d(22px, -18px, 0) scale(1.05);
            }
        }
    </style>
@endsection
