@extends('layouts.app')

@section('title', 'Accueil - ClickUp')

@section('hero')
    <x-hero titlePart1="On transforme" titlePart2="ton budget pub" titlePart3="en" titlePart4="ventes prévisibles"
        subtitle=" <strong class='text-orange-400'>ClickUp</strong>, l’agence spécialisée Facebook & TikTok Ads qui aide les marques e-commerce (15–50k€/mois) à scaler x2/x3 et stabiliser leurs ventes en 61 jours grâce à la <span class='text-orange-400'>méthode CREA™</span>."
        cta="Réserve ton Audit Gratuit" ctaLink="#contact" background="banner-home.jpg" />

@endsection

@section('content')
    <main class="pt-16">

        <!-- Carousel Logos -->
        <x-brand-carousel />

        <x-prospect-section :title="$prospect['title']" :subtitle="$prospect['subtitle']" />


        <x-crea-section :title="$crea['title']" :subtitle="$crea['subtitle']" :image="$crea['image']" :cta="$crea['cta']" :ctaUrl="$crea['ctaUrl']"
            ctaVariant="neon" />


        <x-resources-section
            title="Pourquoi <span class='text-[#ffb845]'>Facebook & TikTok</span> sont deux leviers de croissance puissants en 2025"
            subtitle="Tes clients y passent des heures chaque jour. Ces plateformes connaissent leurs envies mieux qu’eux-mêmes. Avec la bonne stratégie, tu peux transformer ce temps d’écran en temps de caisse."
            cta="Nos ressources" :resources="$resources" />

        <x-accompagnement-section :title="$accompagnement['title']" :subtitle="$accompagnement['subtitle']" :cta="$accompagnement['cta']" :items="$accompagnement['items']" />

        <x-services-tabs :services="$services" />

        <x-stats-section />

        <x-testimonials-carousel />

        <x-ebook-carousel />

        <x-whatsapp-button />
    </main>
@endsection
