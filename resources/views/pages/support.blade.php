@extends('layouts.app')

@section('title', 'Accompagnement')

@section('content')
    <section class="w-full text-center">
        <x-section-hero :title="$section['title']" :subtitle="$section['subtitle']" :button-text="$section['button_text']" :button-link="$section['button_link']" :image="$section['image']" />
        <!-- Carousel Logos -->
        <x-brand-carousel speed="70" :fade="true" :pauseOnHover="false" gapClass="gap-10 sm:gap-14" />
        <!-- Section Pourquoi travailler avec nous -->
        <x-section-whyus :title="$whyUs['title']" :features="$whyUs['features']" />
        <!-- Section Méthodologie -->
        <!-- Nouvelle section Méthodologie -->
        <x-section-methodology :title="$methodology['title']" :subtitle="$methodology['subtitle']" :steps="$methodology['steps']" />

        <!-- Nouvelle section Process -->
        <x-section-process :intro="$intro" :steps="$steps" />
        <x-stats-section />
        <x-testimonials-carousel title="Ce que nos clients disent de nous"
            subtitle="Ce sont nos clients qui en parlent le mieux." :testimonials="$testimonials" :cta="$testimonialsCta" />
        <x-section-call :call-to-action="$callToAction" :form-fields="$formFields" />
        <!-- Section Ebook -->
        <x-ebook-carousel />
        <x-whatsapp-button />
    </section>
@endsection
