@extends('layouts.app')

@section('title', 'Actualités - clicup')

@section('hero')
    <section class="relative min-h-[40vh] flex items-center justify-center">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Nos <span class="text-orange-500">Actualités</span>
            </h1>
            <p class="text-xl text-gray-300">
                Suivez nos dernières publications et conseils en publicité digitale
            </p>
        </div>
    </section>
@endsection

@section('content')
    <main class="pt-16">
        <!-- Section Posts Facebook -->
        <x-social-feed :posts="$posts" />

        <!-- CTA -->
        <x-section-call :call-to-action="[
            'title' => 'Envie d\'en savoir plus ?',
            'subtitle' => 'Rejoins-nous sur Facebook pour ne rien manquer de nos conseils et actualités.',
            'button' => 'Suivre sur Facebook'
        ]" :form-fields="[]" />
    </main>
@endsection
