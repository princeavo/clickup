@extends('layouts.app')

@section('title', '404 - Page introuvable')

@section('content')
    <section class="relative overflow-hidden bg-gradient-to-b from-orange-950 via-black to-black py-24 md:py-40">
        <!-- Halo principal -->
        <div class="absolute inset-0 -z-10">
            <div
                class="absolute -top-32 -left-24 h-72 w-72 rounded-full bg-orange-500/25 blur-[140px] animate-[float_12s_ease-in-out_infinite]">
            </div>
            <div
                class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-[#ff8c00]/15 blur-[160px] animate-[float_14s_ease-in-out_infinite]">
            </div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,140,0,0.12),_transparent_55%)]"></div>
        </div>

        <div
            class="relative mx-auto flex max-w-6xl flex-col gap-16 px-6 lg:flex-row lg:items-center lg:justify-between">
            <!-- Bloc texte principal -->
            <div class="max-w-2xl">
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-orange-500/30 bg-orange-500/10 px-4 py-1 text-sm font-semibold uppercase tracking-wide text-orange-300">
                    404 • Page introuvable
                </span>

                <h1 class="mt-8 text-4xl font-extrabold tracking-tight text-white md:text-6xl">
                    On dirait que tu es sorti du parcours.
                </h1>
                <p class="mt-6 text-lg text-orange-100/80 md:text-xl">
                    La page que tu cherches n’existe plus ou a été déplacée. Pas de panique, nous t’aidons à retrouver le
                    bon chemin pour transformer ton business.
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
                    <a href="{{ url('/contact') }}"
                        class="inline-flex items-center justify-center rounded-full border border-orange-400/30 px-7 py-3 text-base font-semibold text-orange-200 transition hover:border-orange-300 hover:text-orange-100">
                        Nous contacter
                    </a>
                </div>

                <div class="mt-12 grid gap-4 sm:grid-cols-2">
                    <a href="{{ url('/agency') }}"
                        class="group flex items-center justify-between rounded-2xl border border-orange-500/10 bg-white/5 px-5 py-4 text-sm text-orange-100 transition hover:border-orange-400/40 hover:bg-white/10">
                        <div>
                            <p class="font-semibold text-orange-50">Découvrir notre accompagnement</p>
                            <p class="mt-1 text-xs text-orange-100/70">Comprends comment la méthode CREA™ peut t’aider</p>
                        </div>
                        <span
                            class="ml-4 inline-flex h-9 w-9 items-center justify-center rounded-full bg-orange-500/20 text-orange-200 transition group-hover:bg-orange-500/40">
                            →
                        </span>
                    </a>
                    <a href="{{ url('/results') }}"
                        class="group flex items-center justify-between rounded-2xl border border-orange-500/10 bg-white/5 px-5 py-4 text-sm text-orange-100 transition hover:border-orange-400/40 hover:bg-white/10">
                        <div>
                            <p class="font-semibold text-orange-50">Voir des résultats concrets</p>
                            <p class="mt-1 text-xs text-orange-100/70">Découvre les success stories de nos clients</p>
                        </div>
                        <span
                            class="ml-4 inline-flex h-9 w-9 items-center justify-center rounded-full bg-orange-500/20 text-orange-200 transition group-hover:bg-orange-500/40">
                            →
                        </span>
                    </a>
                </div>
            </div>

            <!-- Encadré support -->
            <div
                class="relative w-full max-w-md rounded-3xl border border-orange-500/10 bg-orange-500/5 p-8 text-orange-100 shadow-lg shadow-orange-500/20 backdrop-blur">
                <div class="absolute -top-8 right-10 h-16 w-16 rounded-full bg-orange-500/30 blur-xl"></div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-300">Besoin d’un guide ?</p>
                <h2 class="mt-4 text-2xl font-bold text-white">Notre équipe peut t’orienter</h2>
                <p class="mt-4 text-sm leading-relaxed text-orange-100/80">
                    Raconte-nous ce que tu voulais trouver et nous t’enverrons les ressources adaptées pour relancer ta
                    croissance.
                </p>

                <ul class="mt-6 space-y-3 text-sm leading-relaxed">
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-1 flex h-5 w-5 items-center justify-center rounded-full bg-orange-500/30 text-xs text-orange-100">1</span>
                        <span>Écris-nous via le chat en bas à droite.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span
                            class="mt-1 flex h-5 w-5 items-center justify-center rounded-full bg-orange-500/30 text-xs text-orange-100">2</span>
                        <span>Prends rendez-vous avec un stratège pour un diagnostic express.</span>
                    </li>
                </ul>

                <a href="{{ url('/support') }}"
                    class="mt-8 inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-[#ffb845] to-[#ff8c00] px-6 py-3 text-sm font-semibold text-black shadow-md shadow-orange-500/30 transition hover:scale-[1.02]">
                    Programmer un appel découverte
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
                transform: translate3d(20px, -30px, 0) scale(1.05);
            }
        }
    </style>
@endsection
