<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {
        $hero = [
            'badge'       => "Agence Performance Ads",
            'title'       => "ClickUp — L’agence Facebook & TikTok Ads obsédée par une seule chose : tes ventes.",
            'subtitle'    => "Nous installons une machine à vendre qui transforme ton budget pub en croissance rentable et prévisible.",
            'button_text' => "Obtenir ton rdv (GRATUIT)",
            'button_link' => "#",
            'image'       => 'https://cdn.prod.website-files.com/682d6c53727e1a42ddfafe91/6844e9c4c42ade07a2fc0151_d5e067220d46bcfa4b1820c210b78054_agence-image.webp', // remplace par ton visuel
            'image_alt'   => "Illustration de machine à vendre / marketing performance",
        ];

        $videoSection = [
            'title' => "Pourquoi travailler avec nous ?",
            'video_url' => "https://youtu.be/Ym0AxpMdtFQ?si=PMEE-EyFERr7EwJC", // mets ton vrai lien YouTube ou Vimeo
            'thumbnail' => 'https://angiil.com/wp-content/uploads/2021/11/Pub-e1637242285887.png', // image d'aperçu
            'cta_text' => "Regarder la vidéo",
        ];
        $aboutSection = [
            'title' => "Pourquoi nous avons créé ClickUp",
            'intro' => "Le constat était brutal : trop d'agences vendent du rêve à prix d'or, mais livrent des résultats décevants.
                    ClickUp naît d'une conviction simple : apporter de la performance réelle avec notre spécialisation Facebook & TikTok Ads.
                    Notre approche ? Laser-focus sur ces deux plateformes, zéro service inutile, que des résultats qui se voient sur ton compte en banque.",
            'subtitle' => "Derrière chaque campagne, une équipe dédiée à ton succès.",
            'team' => [
                [
                    'name' => "Jean Dupont",
                    'role' => "Co-fondateur",
                    'position' => "Expert Facebook Ads",
                    'photo' => 'https://sm.ign.com/ign_fr/cover/a/avatar-gen/avatar-generations_bssq.jpg',
                ],
                [
                    'name' => "Marie Martin",
                    'role' => "Co-fondatrice",
                    'position' => "Experte TikTok Ads",
                    'photo' => 'https://lumiere-a.akamaihd.net/v1/images/a_avatarpandorapedia_jakesully_16x9_1098_02_b13c4171.jpeg?region=0%2C0%2C1920%2C1080',
                ],
                [
                    'name' => "Ali Ahmed",
                    'role' => "Head of Strategy",
                    'position' => "Growth Hacker",
                    'photo' => 'https://upload.wikimedia.org/wikipedia/en/8/86/Avatar_Aang.png',
                ],
                [
                    'name' => "Jean Dupont",
                    'role' => "Co-fondateur",
                    'position' => "Expert Facebook Ads",
                    'photo' => 'https://sm.ign.com/ign_fr/cover/a/avatar-gen/avatar-generations_bssq.jpg',
                ],
                [
                    'name' => "Marie Martin",
                    'role' => "Co-fondatrice",
                    'position' => "Experte TikTok Ads",
                    'photo' => 'https://lumiere-a.akamaihd.net/v1/images/a_avatarpandorapedia_jakesully_16x9_1098_02_b13c4171.jpeg?region=0%2C0%2C1920%2C1080',
                ],
                [
                    'name' => "Ali Ahmed",
                    'role' => "Head of Strategy",
                    'position' => "Growth Hacker",
                    'photo' => 'https://upload.wikimedia.org/wikipedia/en/8/86/Avatar_Aang.png',
                ],
            ],
        ];

        $missionSection = [
            'title' => "Chaque marque mérite d’avoir une vraie machine à vendre derrière son produit.",
            'subtitle' => "Notre mission est de rendre cela possible, d’abord pour nos clients en Afrique et en Europe, puis dans le monde entier.",
            'values' => [
                [
                    'title' => "Performance & stratégie",
                    'description' => "Spécialistes pub qui maximisent ta visibilité, ton ROI et tes conversions. Une seule obsession : tes résultats.",
                    'icon' => 'fa-solid fa-chart-line',
                ],
                [
                    'title' => "Satisfaction client",
                    'description' => "Tes besoins au centre, tes attentes dépassées. On livre plus que prévu.",
                    'icon' => 'fa-solid fa-heart',
                ],
                [
                    'title' => "Innovation & IA",
                    'description' => "L’intelligence artificielle et l’automatisation sont au cœur de notre ADN. Objectif : se concentrer sur ce qui compte vraiment — créer des campagnes rentables.",
                    'icon' => 'fa-solid fa-robot',
                ],
            ],
        ];


        return view('pages.agency', [
            'hero' => $hero,
            'videoSection' => $videoSection,
            'aboutSection' => $aboutSection,
            'missionSection' => $missionSection,
        ]);
    }
}
