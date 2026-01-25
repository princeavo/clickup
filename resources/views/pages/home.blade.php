@extends('layouts.app')

@section('title', 'Accueil - clicup')

@section('hero')
    <x-hero titlePart1="Transforme tes ventes de " titlePart2="montagnes russes" titlePart3="en machine" titlePart4=" à cash prévisible"
        subtitle="L'agence Facebook & TikTok Ads pour les marques mois qui veulent scaler sans stress. Notre <span class='text-orange-400'>méthode CREA™</span> te garantit un flux constant de ventes fini les mois à 40K€ suivis de 18K€."
        cta="Réserve ton Audit Gratuit" ctaLink="{{ route('agency') }}#contact" background="banner-home.jpg" />

@endsection

@section('content')
    <main class="pt-16">

        <!-- Carousel Logos -->
        <x-brand-carousel />

        <x-prospect-section :title="$prospect['title']" :subtitle="$prospect['subtitle']" />


        <x-crea-section :title="$crea['title']" :subtitle="$crea['subtitle']" :image="$crea['image']" :cta="$crea['cta']" :ctaUrl="$crea['ctaUrl']"
            ctaVariant="neon" />


        <x-resources-section
            title="Pourquoi <span class='text-orange-400'>Facebook & TikTok Ads</span> les 2 meilleurs leviers pour scaler en 2026"
            subtitle="Tes futurs clients scrollent 3h/jour sur ces plateformes. Si tu n'y es pas avec une stratégie solide, tu laisses des millions sur la table."
            cta="La méthode" :resources="$resources" />

        <x-accompagnement-section :title="$accompagnement['title']" :subtitle="$accompagnement['subtitle']" :cta="$accompagnement['cta']" :items="$accompagnement['items']" />

        <x-services-tabs :services="$services" />

        <x-stats-section :stats="$stats" />

        <x-testimonials-carousel />

        <x-ebook-carousel />

        <x-whatsapp-button />
    </main>
@endsection
