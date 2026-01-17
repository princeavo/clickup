@extends('layouts.app')

@section('title', 'Nos Offres - clicup')

@section('hero')
    <x-offers.hero 
        :title="$hero['title']" 
        :subtitle="$hero['subtitle']" 
        :cta="$hero['cta']" 
        :cta-link="$hero['ctaLink']" 
    />
@endsection

@section('content')
    <main class="pt-16">
        <!-- Section Offres -->
        <x-offers.pricing :offers="$offers" />

        <!-- Section Lead Magnets -->
        <x-offers.lead-magnets :lead-magnets="$leadMagnets" />

        <!-- Section Ressources -->
        <x-offers.resources :resources="$resources" />

        <!-- Stats Section -->
        <x-stats-section />

        <!-- CTA Final -->
        <x-section-call :call-to-action="[
            'title' => 'Prêt à transformer ton budget pub en machine à vendre ?',
            'subtitle' => 'Réserve ton audit gratuit et découvre comment on peut t\'aider à scaler tes ventes.',
            'button' => 'Réserve ton audit gratuit'
        ]" :form-fields="[
            ['name' => 'name', 'label' => 'Nom complet', 'type' => 'text', 'required' => true],
            ['name' => 'email', 'label' => 'Email', 'type' => 'email', 'required' => true],
            ['name' => 'phone', 'label' => 'Téléphone', 'type' => 'tel', 'required' => false],
            ['name' => 'company', 'label' => 'Entreprise', 'type' => 'text', 'required' => false],
            ['name' => 'message', 'label' => 'Parle-nous de ton projet', 'type' => 'textarea', 'required' => false],
        ]" />

        <x-whatsapp-button />
    </main>
@endsection
