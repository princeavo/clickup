@extends('layouts.app')

@section('title', 'Agence - ClickUp')

@section('content')
    <x-section-hero-agence :badge="$hero['badge']" :title="$hero['title']" :subtitle="$hero['subtitle']" :button-text="$hero['button_text']" :button-link="$hero['button_link']"
        :image="$hero['image']" :image-alt="$hero['image_alt']" />

    <!-- Carousel Logos -->
    <x-brand-carousel />

    <x-section-video :title="$videoSection['title']" :video-url="$videoSection['video_url']" :thumbnail="$videoSection['thumbnail']" :cta-text="$videoSection['cta_text']" />

    <x-section-about :title="$aboutSection['title']" :intro="$aboutSection['intro']" :subtitle="$aboutSection['subtitle']" :team="$aboutSection['team']" />

    <x-section-mission :title="$missionSection['title']" :subtitle="$missionSection['subtitle']" :values="$missionSection['values']" />

    <x-testimonials-carousel title="Ce que nos clients disent de nous"
        subtitle="Ce sont nos clients qui en parlent le mieux." />

    <x-section-call />

    <x-ebook-carousel />

    <x-whatsapp-button />
@endsection
