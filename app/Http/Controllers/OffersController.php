<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        $hero = [
            'title' => 'Nos Offres',
            'subtitle' => 'Des solutions sur-mesure pour transformer ton budget pub en machine à vendre',
            'cta' => 'Réserve ton audit gratuit',
            'ctaLink' => '#contact',
        ];

        $offers = [
            [
                'name' => 'Starter',
                'tagline' => 'Pour démarrer avec Facebook & TikTok Ads',
                'price' => '1 500',
                'period' => '/mois',
                'description' => 'Idéal pour les marques qui veulent tester les publicités Facebook & TikTok avec un accompagnement professionnel.',
                'features' => [
                    'Gestion de 2 plateformes (Facebook ou TikTok)',
                    'Budget pub : 2 000€ - 5 000€/mois',
                    '4 créatives par mois',
                    'Reporting mensuel',
                    'Support par email',
                ],
                'cta' => 'Commencer',
                'ctaLink' => '#contact',
                'popular' => false,
            ],
            [
                'name' => 'Growth',
                'tagline' => 'Pour scaler tes ventes rapidement',
                'price' => '2 500',
                'period' => '/mois',
                'description' => 'Notre offre la plus populaire. Pour les marques prêtes à investir sérieusement dans leur croissance.',
                'features' => [
                    'Gestion Facebook + TikTok Ads',
                    'Budget pub : 5 000€ - 15 000€/mois',
                    '8 créatives par mois',
                    'Méthode CREA™ complète',
                    'Reporting hebdomadaire',
                    'Account manager dédié',
                    'Support prioritaire',
                ],
                'cta' => 'Choisir Growth',
                'ctaLink' => '#contact',
                'popular' => true,
            ],
            [
                'name' => 'Scale',
                'tagline' => 'Pour dominer ton marché',
                'price' => 'Sur devis',
                'period' => '',
                'description' => 'Pour les marques ambitieuses qui veulent exploser leurs ventes avec un accompagnement premium.',
                'features' => [
                    'Gestion multi-plateformes',
                    'Budget pub : 15 000€+/mois',
                    'Créatives illimitées',
                    'Stratégie personnalisée',
                    'Reporting en temps réel',
                    'Équipe dédiée',
                    'Support 24/7',
                    'Accès prioritaire aux nouvelles fonctionnalités',
                ],
                'cta' => 'Nous contacter',
                'ctaLink' => '#contact',
                'popular' => false,
            ],
        ];

        $leadMagnets = [
            [
                'title' => 'Guide Facebook Ads 2025',
                'description' => 'Les 10 stratégies qui génèrent le plus de ventes en 2025',
                'image' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=400',
                'type' => 'PDF',
                'pages' => '25 pages',
                'downloadLink' => '#',
            ],
            [
                'title' => 'Checklist TikTok Ads',
                'description' => 'La checklist complète pour lancer ta première campagne TikTok rentable',
                'image' => 'https://images.unsplash.com/photo-1611162616305-c69b3fa7fbe0?w=400',
                'type' => 'PDF',
                'pages' => '12 pages',
                'downloadLink' => '#',
            ],
            [
                'title' => 'Template de Reporting',
                'description' => 'Notre template Excel pour suivre tes performances publicitaires',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400',
                'type' => 'Excel',
                'pages' => 'Template',
                'downloadLink' => '#',
            ],
            [
                'title' => 'Méthode CREA™',
                'description' => 'Le framework complet pour créer des publicités qui convertissent',
                'image' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=400',
                'type' => 'PDF',
                'pages' => '40 pages',
                'downloadLink' => '#',
            ],
        ];

        $resources = [
            [
                'title' => 'Blog',
                'description' => 'Articles, guides et études de cas pour maîtriser Facebook & TikTok Ads',
                'icon' => 'book',
                'link' => '#',
                'count' => '50+ articles',
            ],
            [
                'title' => 'Webinaires',
                'description' => 'Sessions live pour apprendre les dernières stratégies publicitaires',
                'icon' => 'video',
                'link' => '#',
                'count' => 'Chaque mois',
            ],
            [
                'title' => 'Podcast',
                'description' => 'Interviews d\'experts et retours d\'expérience de nos clients',
                'icon' => 'microphone',
                'link' => '#',
                'count' => '30+ épisodes',
            ],
            [
                'title' => 'Templates',
                'description' => 'Modèles de campagnes, créatives et scripts prêts à l\'emploi',
                'icon' => 'template',
                'link' => '#',
                'count' => '20+ templates',
            ],
            [
                'title' => 'Communauté',
                'description' => 'Rejoins notre groupe privé d\'entrepreneurs e-commerce',
                'icon' => 'users',
                'link' => '#',
                'count' => '500+ membres',
            ],
            [
                'title' => 'Outils',
                'description' => 'Calculateurs, générateurs et outils pour optimiser tes campagnes',
                'icon' => 'tools',
                'link' => '#',
                'count' => '10+ outils',
            ],
        ];

        return view('pages.offers', [
            'hero' => $hero,
            'offers' => $offers,
            'leadMagnets' => $leadMagnets,
            'resources' => $resources,
        ]);
    }
}
