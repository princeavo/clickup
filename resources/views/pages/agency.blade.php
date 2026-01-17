@extends('layouts.app')

@section('title', 'L\'Agence - clicup')


@section('hero')
    <x-section-hero-agence :badge="$hero['badge']" :button-text="$hero['button_text']" :button-link="$hero['button_link']" :image="$hero['image']" :image-alt="$hero['image_alt']" />
@endsection

@section('content')
    <main class="pt-16">
        <!-- Carousel Logos -->
        <x-brand-carousel />

        <x-section-video :title="$videoSection['title']" :video-url="$videoSection['video_url']" :thumbnail="$videoSection['thumbnail']" :cta-text="$videoSection['cta_text']" />

        {{-- <x-section-about :title="$aboutSection['title']" :intro="$aboutSection['intro']" :subtitle="$aboutSection['subtitle']" :team="$aboutSection['team']" /> --}}

        <x-about-intro />

        <x-about-team :subtitle="$aboutSection['subtitle']" :team="$aboutSection['team']" />


        <x-section-mission :title="$missionSection['title']" :subtitle="$missionSection['subtitle']" :values="$missionSection['values']" />

        <x-stats-section />

        <x-testimonials-carousel title="Ce sont nos clients qui en parlent le mieux"
            subtitle="Des résultats concrets, des témoignages authentiques, zéro bullshit." />

        <x-section-call />

        <x-ebook-carousel />

        <x-whatsapp-button />
    </main>
@endsection
