<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        $hero = [
            'title' => '3 offres pour scaler ta pub — du test au scaling agressif',
            'subtitle' => 'Que tu débutes en pub payante ou que tu veuilles passer un palier, on a l\'offre qui correspond à ton niveau. Toutes incluent la méthode CREA™ et un accompagnement personnalisé.',
            'cta' => 'Réserve ton audit gratuit',
            'ctaLink' => '#contact',
        ];

        $offers = [
            [
                'name' => 'CREA AUDIT™',
                'tagline' => 'One-Shot Premium',
                'oldPrice' => '697',
                'price' => '497',
                'period' => '€',
                'features' => [
                    'Analyse complète de ton compte publicitaire',
                    'Audit de tes créatives actuelles',
                    'Décryptage landing page / page produit',
                    'Benchmark vs ton marché + analyse concurrence',
                    'Roadmap stratégique 30 jours',
                    'Session 2h en visio + livrable PDF détaillé',
                ],
                'extraFeatures' => [
                    '5 templates de créatives validées',
                    '1 hook + script vidéo personnalisé',
                    'Support WhatsApp 7 jours post-audit',
                    'Check-list « Ads Ready-to-Launch »',
                    'Accès CREA Library™ (14 jours)',
                ],
                'cta' => 'Réserver mon audit',
                'popular' => false,
            ],
            [
                'name' => 'CREA FOUNDATION™',
                'tagline' => 'Offre de validation - 90 jours',
                'oldPrice' => '1 997',
                'price' => '1 497',
                'period' => '€/mois',
                'priceNote' => 'Engagement 3 mois (4 491€)',
                'features' => [
                    'Phase 1 : Diagnostic & Setup (Jours 1-15)',
                    'Phase 2 : Test & Validation (Jours 16-60)',
                    'Phase 3 : Scaling Initial (Jours 61-90)',
                    'Gestion quotidienne Meta/TikTok',
                    'Tests structurés (audiences, formats, messages)',
                    '2 calls stratégiques/mois',
                    'Budget pub minimum : 2 000€/mois',
                ],
                'extraFeatures' => [
                    'Garantie : Remboursement dernier mois si ROAS < 2',
                    'Pack créatif CREA TEST recommandé (+897€/mois)',
                ],
                'cta' => 'Commencer FOUNDATION™',
                'popular' => true,
            ],
            [
                'name' => 'CREA SCALE™',
                'tagline' => 'Scaling confirmé - Récurrent',
                'oldPrice' => '2 997',
                'price' => '2 497',
                'period' => '€/mois',
                'priceNote' => 'À partir de (selon CA)',
                'features' => [
                    'Conditions : ROAS > 2.5 sur 30 derniers jours',
                    'Budget pub minimum : 3 500€/mois',
                    'Gestion & scaling quotidien 5j/7',
                    'Optimisation avancée (CBO, audiences, placements)',
                    'Dashboard temps réel (Notion)',
                    '1 call stratégique hebdo',
                    'Support WhatsApp direct',
                ],
                'extraFeatures' => [
                    'Garantie : -50% si ROAS baisse >20%',
                    'Pack CREA FLOW minimum requis (+897€/mois)',
                ],
                'cta' => 'Passer à SCALE™',
                'popular' => false,
            ],
        ];

        $creativeOffers = [
            [
                'name' => 'CREA STARTER™',
                'tagline' => 'One-shot test',
                'oldPrice' => '497',
                'price' => '397',
                'period' => '€',
                'description' => 'Idéal pour tester nos créatives avec un pack one-shot sans engagement.',
                'features' => [
                    '4 créatives one-shot (2 vidéos + 2 images)',
                    '1 itération',
                    '3 hooks par créa',
                    'Livraison 7 jours',
                ],
                'cta' => 'Commander CREA STARTER™',
                'popular' => false,
            ],
            [
                'name' => 'CREA TEST™',
                'tagline' => 'Best-seller attendu',
                'oldPrice' => '1 197',
                'price' => '897',
                'period' => '€/mois',
                'description' => 'Parfait pour tester la puissance de nos créatives sans engagement long terme.',
                'features' => [
                    '8 créatives/mois (mix UGC + images + carrousels)',
                    '1 itération par créa',
                    'Brief stratégique mensuel',
                    'Formats Meta + TikTok',
                    'Engagement mensuel',
                ],
                'cta' => 'Commencer CREA TEST™',
                'popular' => true,
            ],
            [
                'name' => 'CREA SCALE™',
                'tagline' => 'Pour clients en scaling',
                'oldPrice' => '1 997',
                'price' => '1 497',
                'period' => '€/mois',
                'description' => 'L\'offre premium pour scaler avec un flux constant de créatives performantes.',
                'features' => [
                    '14 créatives/mois (tous formats)',
                    '2 itérations par créa',
                    'Brief stratégique + analyse concurrence',
                    'Accès CREA Library™',
                    'Support 48h',
                    'Engagement mensuel',
                ],
                'extraFeatures' => [
                    '-15% si engagement 3 mois',
                ],
                'cta' => 'Choisir CREA SCALE™',
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
            'creativeOffers' => $creativeOffers,
            'leadMagnets' => $leadMagnets,
            'resources' => $resources,
        ]);
    }
}
