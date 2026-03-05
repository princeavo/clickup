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

        $guarantees = [
            [
                'icon'        => 'money',
                'title'       => 'Remboursement dernier mois',
                'description' => 'Avec CREA FOUNDATION™, si ton ROAS est inférieur à 2 à la fin des 90 jours, on te rembourse le dernier mois d\'accompagnement. Sans discussion.',
                'badge'       => 'FOUNDATION™',
                'value'       => 'ROAS < 2 → Remboursé',
                'highlight'   => false,
            ],
            [
                'icon'        => 'chart',
                'title'       => '-50% sur nos honoraires',
                'description' => 'Avec CREA SCALE™, si ton ROAS baisse de plus de 20% sur une période d\'un mois, on divise nos honoraires par deux ce mois-là. On est dans le même bateau.',
                'badge'       => 'SCALE™',
                'value'       => 'Baisse > 20% → -50%',
                'highlight'   => true,
            ],
            [
                'icon'        => 'shield',
                'title'       => 'Roadmap offerte sans engagement',
                'description' => 'Peu importe l\'issue de notre call d\'audit initial, tu repars avec une roadmap stratégique personnalisée 30 jours — même si tu ne travailles pas avec nous.',
                'badge'       => 'Tous',
                'value'       => '100% offerte',
                'highlight'   => false,
            ],
            [
                'icon'        => 'support',
                'title'       => 'Support WhatsApp réactif',
                'description' => 'Toutes nos offres incluent un accès direct à notre équipe via WhatsApp. Pas de ticket, pas d\'attente — une réponse sous 24h maximum, souvent bien moins.',
                'value'       => '< 24h de réponse',
                'highlight'   => false,
            ],
            [
                'icon'        => 'clock',
                'title'       => 'Onboarding en 48h',
                'description' => 'Dès la signature, on est opérationnels en 48 heures. Accès aux comptes, brief stratégique, lancement des premières actions — on ne perd pas de temps.',
                'value'       => 'Démarrage en 48h',
                'highlight'   => false,
            ],
            [
                'icon'        => 'shield',
                'title'       => 'Aucune CB requise pour l\'audit',
                'description' => 'Ton audit de découverte est 100% gratuit et sans engagement. Aucune carte bancaire demandée, aucune obligation d\'avancer ensemble après le call.',
                'value'       => 'Zéro risque',
                'highlight'   => false,
            ],
        ];

        $faqs = [
            [
                'question' => 'Quel est le budget publicitaire minimum pour travailler avec vous ?',
                'answer'   => 'Le budget pub minimum est de 1 500€/mois. Ce seuil nous permet de lancer des tests structurés, d\'optimiser en continu et de générer des données suffisantes pour performer. En dessous, les résultats seraient trop lents à valider et on ne pourrait pas t\'offrir la qualité d\'accompagnement qu\'on promet.',
            ],
            [
                'question' => 'Y a-t-il un engagement minimum de durée ?',
                'answer'   => 'CREA FOUNDATION™ engage sur 3 mois — c\'est le temps minimum pour mener les 3 phases (diagnostic, test, scaling initial) et obtenir des résultats mesurables. CREA SCALE™ fonctionne sur abonnement mensuel renouvelable. CREA AUDIT™ est un one-shot sans engagement.',
            ],
            [
                'question' => 'Comment fonctionne concrètement la garantie ROAS ?',
                'answer'   => 'La garantie est contractuelle. Pour FOUNDATION™ : si le ROAS moyen sur 30 jours est inférieur à 2 à la fin du 3ème mois, on rembourse le dernier mois d\'accompagnement. Pour SCALE™ : si le ROAS baisse de plus de 20% sur un mois, nos honoraires sont réduits de 50% ce mois-là. Ces conditions sont précisées dans le contrat.',
                'cta'      => ['label' => 'Réserver mon audit pour en discuter', 'link' => '#contact'],
            ],
            [
                'question' => 'Combien de temps avant de voir des premiers résultats ?',
                'answer'   => 'Les premières données significatives apparaissent généralement entre la 2ème et la 4ème semaine. Un vrai palier de performance se confirme autour de 60 jours. C\'est pourquoi FOUNDATION™ dure 90 jours : la phase 1 sert à poser des bases solides, pas à brûler du budget.',
            ],
            [
                'question' => 'Travaillez-vous avec tous les secteurs e-commerce ?',
                'answer'   => 'On se spécialise dans le e-commerce B2C sur Meta (Facebook/Instagram) et TikTok. On travaille très bien avec la mode, la beauté, la maison, le sport, les accessoires et les produits tech grand public. Si ton secteur est très réglementé (finance, santé, alcool…), on en discute au cas par cas lors de l\'audit.',
            ],
            [
                'question' => 'Puis-je passer d\'une offre à une autre en cours de route ?',
                'answer'   => 'Oui. Si tu as démarré avec FOUNDATION™ et que tu atteins les critères de SCALE™ (ROAS > 2.5 sur 30 jours), on peut faire évoluer ton contrat. De même, si tu es déjà client SCALE™ et que tu souhaites descendre temporairement, on en discute ensemble sans friction.',
            ],
            [
                'question' => 'Qu\'est-ce qui est inclus dans la gestion quotidienne ?',
                'answer'   => 'La gestion quotidienne comprend : monitoring des campagnes, ajustements des enchères et budgets, analyse des créatives en cours, lancement des nouvelles créatives validées, et un reporting hebdomadaire. Tu n\'as pas à toucher au compte — on gère tout pendant que tu te concentres sur ton business.',
            ],
            [
                'question' => 'Que se passe-t-il si je ne suis pas satisfait ?',
                'answer'   => 'On applique d\'abord nos garanties contractuelles (remboursement ou réduction d\'honoraires). Au-delà, si tu estimes que la collaboration ne fonctionne pas, on peut convenir d\'une sortie propre. Notre réputation repose sur vos résultats — on n\'a aucun intérêt à retenir un client insatisfait.',
            ],
        ];

        return view('pages.offers', [
            'hero'          => $hero,
            'offers'        => $offers,
            'creativeOffers'=> $creativeOffers,
            'leadMagnets'   => $leadMagnets,
            'resources'     => $resources,
            'guarantees'    => $guarantees,
            'faqs'          => $faqs,
        ]);
    }
}
