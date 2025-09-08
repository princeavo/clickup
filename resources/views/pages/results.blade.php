@extends('layouts.app')

@section('title', 'Résultats - ClickUp')

@section('content')
    <main>
        <x-results.hero :title="$hero['title']" :subtitle="$hero['subtitle']" :cta-text="$hero['ctaText']" :cta-link="$hero['ctaLink']" />
        <!-- Carousel Logos -->
        <x-brand-carousel />
        <x-results.stories :stories="$stories" />
        <x-ebook-carousel />
        <x-whatsapp-button />
    </main>
@endsection
