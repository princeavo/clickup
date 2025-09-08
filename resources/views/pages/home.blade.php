@extends('layouts.app')

@section('title', 'Accueil - ClickUp')

@section('content')
    <main class="pt-16">
        <!-- Hero Section -->
        <x-hero :title="$hero['title']" :subtitle="$hero['subtitle']" :cta="$hero['cta']" :background="$hero['background']" />

        <!-- Carousel Logos -->
        <x-brand-carousel />

        <x-section-usp id="usp-dashboard" title="Un Dashboard Amazon précis pour nos clients"
            subtitle="Des données actionnables, présentées clairement pour décider plus vite." :image="'hero.png'"
            :cfg="[
                'rotateZ' => 7,
                'rotateX' => -12,
                'translateY' => 64,
                'scaleFrom' => 0.99,
                'scaleTo' => 1.05,
                'startProgress' => 0.22,
                'glossWidth' => 130,
                'stagger' => 60,
            ]" />

        <x-crea-method :title="'<span class=&quot;text-white&quot;>La méthode</span> <span class=&quot;text-purple-400&quot;>CREA™</span> : <br> <span class=&quot;text-gray-200&quot;>Des publicités qui frappent, déclenchent l’émotion, et transforment</span> <span class=&quot;text-indigo-400&quot;>l’intérêt en résultats</span>. ?>'"'" cta="Découvrir la méthode CREA™"
            background="linear-gradient(135deg, #0a0a0a, #1a1a1a)" backgroundImage="fence.png" />

        <x-resources-section :resources="$resources" />

        <x-accompagnement-section :title="$accompagnement['title']" :subtitle="$accompagnement['subtitle']" :cta="$accompagnement['cta']" :items="$accompagnement['items']" />

        <x-services-tabs :services="$services" />

        <x-stats-section />

        <x-testimonials-carousel />

        <x-ebook-carousel />

        <x-whatsapp-button />
    </main>
@endsection
