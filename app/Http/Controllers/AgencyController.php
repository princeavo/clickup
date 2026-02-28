<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {
        $hero = [
            'badge'       => "Agence Performance Ads",
            'button_text' => "Découvre notre méthode",
            'button_link' => "/support",
            'image'       => asset('images/hero-agency.png'),
            'image_alt'   => "Illustration de machine à vendre / marketing performance",
        ];

        $videoSection = [
            'title' => "Pourquoi travailler avec nous ?",
            'video_url' => "https://youtu.be/Ym0AxpMdtFQ?si=PMEE-EyFERr7EwJC", // mets ton vrai lien YouTube ou Vimeo
            'thumbnail' => 'https://angiil.com/wp-content/uploads/2021/11/Pub-e1637242285887.png', // image d'aperçu
            'cta_text' => "Regarder la vidéo",
        ];
        $aboutSection = [
            'subtitle' => "Derrière chaque campagne, une équipe dédiée à ton succès.",
            'team' => [
                [
                    'name' => "Kévin Michozounnou",
                    'role' => "Co-fondateur",
                    'position' => "Expert Facebook Ads",
                    'photo' => asset('images/team/kevin-michozounnou.jpg'),
                ],
                [
                    'name' => "Géovani BOKOSSA",
                    'role' => "Co-fondateur",
                    'position' => "Experte TikTok Ads",
                    'photo' => asset('images/team/geovani-bokossa.png'),
                ],
            ],
        ];

        $missionSection = [
            'title' => "Chaque marque mérite d’avoir une vraie machine à vendre derrière son produit.",
            'subtitle' => "Notre mission est de rendre cela possible, d’abord pour nos clients en Afrique et en Europe, puis dans le monde entier.",
            'values' => [
                [
                    'title' => "Obsession de la performance",
                    'description' => "Chaque décision est data-driven. Chaque euro tracké. Chaque campagne optimisée pour le ROAS, pas les vanity metrics. On ne garde que ce qui rapporte. Promesse : +180% de ROAS minimum.",
                    'icon' => 'fa-solid fa-chart-line',
                ],
                [
                    'title' => "Partenaire, pas prestataire",
                    'description' => "On devient ton bras droit acquisition. Point hebdo, dashboard temps réel, WhatsApp direct. Question à 22h ? On répond. Engagement : transparence totale, zéro langue de bois, résultats mesurables.",
                    'icon' => 'fa-solid fa-heart',
                ],
                [
                    'title' => "On teste avant tout le monde",
                    'description' => "IA générative pour les créatives, automation avancée, nouveaux placements... On teste tout pour un avantage concurrentiel. Ce qui marche, tu en bénéficies en premier. Résultat : toujours une longueur d'avance.",
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
