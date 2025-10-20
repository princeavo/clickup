@extends('layouts.app')

@section('title', '419 - Session expirée')

@section('content')
    <section class="relative overflow-hidden bg-gradient-to-b from-orange-950 via-black to-black py-24 md:py-40">
        <div class="absolute inset-0 -z-10">
            <div
                class="absolute -top-20 left-1/4 h-60 w-60 rounded-full bg-[#ffb845]/20 blur-[150px] animate-[float_10s_ease-in-out_infinite]">
            </div>
            <div
                class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-[#ff8c00]/18 blur-[170px] animate-[float_16s_ease-in-out_infinite]">
            </div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,184,69,0.14),_transparent_60%)]"></div>
        </div>

        <div
            class="relative mx-auto flex max-w-6xl flex-col gap-16 px-6 lg:flex-row lg:items-center lg:justify-between">
            <div class="max-w-2xl">
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-orange-500/30 bg-orange-500/10 px-4 py-1 text-sm font-semibold uppercase tracking-wide text-orange-300">
                    419 • Session expirée
                </span>

                <h1 class="mt-8 text-4xl font-extrabold tracking-tight text-white md:text-6xl">
                    Ta session a pris fin.
                </h1>
                <p class="mt-6 text-lg text-orange-100/80 md:text-xl">
                    Pour sécuriser tes données, nous avons interrompu la session inactive. Rassure-toi : ton travail est
                    sauvegardé et tu peux reprendre en quelques secondes.
                </p>

                <div class="mt-10 flex flex-col gap-4 sm:flex-row sm:items-center">
                    <button type="button"
                        onclick="window.location.reload()"
                        class="group inline-flex items-center justify-center rounded-full bg-gradient-to-r from-[#ffb845] to-[#ff8c00] px-7 py-3 text-base font-semibold text-black shadow-lg shadow-orange-500/30 transition-transform duration-300 hover:scale-105">
                        Rafraîchir la page
                        <svg class="ml-2 h-4 w-4 transition-transform duration-300 group-hover:rotate-90"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4v6h6M20 20v-6h-6M5 19A9 9 0 0119 5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <a href="{{ url('/') }}"
                        class="inline-flex items-center justify-center rounded-full border border-orange-400/30 px-7 py-3 text-base font-semibold text-orange-200 transition hover:border-orange-300 hover:text-orange-100">
                        Retourner à l’accueil
                    </a>
                </div>

                <div class="mt-12 grid gap-4 sm:grid-cols-2">
                    <a href="{{ url('/support') }}"
                        class="group flex items-center justify-between rounded-2xl border border-orange-500/10 bg-orange-500/5 px-5 py-4 text-sm text-orange-100 transition hover:border-orange-400/40 hover:bg-orange-500/10">
                        <div>
                            <p class="font-semibold text-orange-50">Besoin d’une assistance humaine ?</p>
                            <p class="mt-1 text-xs text-orange-100/70">Notre équipe te répond sous 24h ouvrées</p>
                        </div>
                        <span
                            class="ml-4 inline-flex h-9 w-9 items-center justify-center rounded-full bg-orange-500/20 text-orange-200 transition group-hover:bg-orange-500/40">
                            →
                        </span>
                    </a>
                    <a href="{{ url('/results') }}"
                        class="group flex items-center justify-between rounded-2xl border border-orange-500/10 bg-orange-500/5 px-5 py-4 text-sm text-orange-100 transition hover:border-orange-400/40 hover:bg-orange-500/10">
                        <div>
                            <p class="font-semibold text-orange-50">Découvrir les success stories</p>
                            <p class="mt-1 text-xs text-orange-100/70">Inspire-toi des clients qui ont dépassé ce cap</p>
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
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-300">Pour éviter que ça recommence</p>
                <h2 class="mt-4 text-2xl font-bold text-white">Les réflexes à avoir</h2>
                <p class="mt-4 text-sm leading-relaxed text-orange-100/80">
                    Nous interrompons les sessions longues pour protéger tes données confidentielles. Voici comment ne rien
                    perdre.
                </p>

                <ul class="mt-6 space-y-3 text-sm leading-relaxed">
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-1 flex h-5 w-5 items-center justify-center rounded-full bg-orange-500/30 text-xs text-orange-100">1</span>
                        <span>Valide ou enregistre tes formulaires toutes les 10 minutes environ.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-1 flex h-5 w-5 items-center justify-center rounded-full bg-orange-500/30 text-xs text-orange-100">2</span>
                        <span>Utilise le chat ou le support si tu dois récupérer des informations non sauvegardées.</span>
                    </li>
                </ul>

                <a href="{{ url('/support') }}"
                    class="mt-8 inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-[#ffb845] to-[#ff8c00] px-6 py-3 text-sm font-semibold text-black shadow-md shadow-orange-500/30 transition hover:scale-[1.02]">
                    Contacter le support
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
                transform: translate3d(-18px, -22px, 0) scale(1.05);
            }
        }
    </style>
@endsection
