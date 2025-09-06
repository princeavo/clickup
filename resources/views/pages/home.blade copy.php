<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-gray-50">

    <!-- Header -->
    <x-header />

    <main class="pt-16" style="background: #04131c">
        <!-- Hero Section -->
        <x-hero :title="$hero['title']" :subtitle="$hero['subtitle']" :cta="$hero['cta']" :background="$hero['background']" />

        <!-- Carousel Logos -->
        <x-brand-carousel :brands="$brands" speed="70" :fade="true" :pauseOnHover="false"
            gapClass="gap-10 sm:gap-14" />




        {{--
        {{-- <x-scroll-hero title="Ton prospect scrolle ? Nous faisons en sorte qu’il s’arrête… clique… et achète."
        whatsapp="https://wa.me/33612345678" :maxRotate="6"  :maxTranslate="56"
     :startProgress="0.22" image="scroll-hero.svg" /> --}}

        <x-section-usp id="usp-dashboard" title="Un Dashboard Amazon précis pour nos clients"
            subtitle="Des données actionnables, présentées clairement pour décider plus vite." :image="'hero.png'"
            {{-- mets ton visuel --}} whatsapp="https://wa.me/33612345678" :cfg="[
                'rotateZ' => 7, // incline un peu moins si besoin
                'rotateX' => -12, // un peu plus de profondeur
                'translateY' => 64, // parallax vertical
                'scaleFrom' => 0.99,
                'scaleTo' => 1.05,
                'startProgress' => 0.22,
                'glossWidth' => 130,
                'stagger' => 60,
            ]" />

        <x-crea-method :title="'<span class=&quot;text-white&quot;>La méthode</span> <span class=&quot;text-purple-400&quot;>CREA™</span> : <br> <span class=&quot;text-gray-200&quot;>Des publicités qui frappent, déclenchent l’émotion, et transforment</span> <span class=&quot;text-indigo-400&quot;>l’intérêt en résultats</span>.'" cta="Découvrir la méthode CREA™"
            background="linear-gradient(135deg, #0a0a0a, #1a1a1a)" backgroundImage="fence.png" />

        <x-resources-section :resources="$resources" />

        <x-accompagnement-section :title="$accompagnement['title']" :subtitle="$accompagnement['subtitle']" :cta="$accompagnement['cta']" :items="$accompagnement['items']" />
    </main>

</body>

</html>
