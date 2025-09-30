<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupportController extends Controller
{
    public function index()
    {
        $testimonials = [
            [
                'quote' => "J’ai le plaisir de collaborer avec ClickUp dans le cadre de la gestion de nos campagnes. Réactivité, professionnalisme et recommandations de grande qualité.",
                'name'  => 'Elise Roux',
                'role'  => 'Responsable Marketing Digital & Ecommerce — POLAR',
                'rating' => 5,
                'avatar' => 'avatars/elise.jpg',     // optionnel
            ],
            [
                'quote' => "Grâce à l’équipe, nous avons réduit nos coûts tout en augmentant les ventes. Un partenaire fiable et impliqué.",
                'name'  => 'Jérôme Sabourin',
                'role'  => 'CEO — Thorvald | SAB Brothers',
                'rating' => 5,
                'avatar' => null,
            ],
            [
                'quote' => "Ils comprennent vite les enjeux, s’adaptent et délivrent. On a enfin une stratégie claire et qui performe.",
                'name'  => 'William Dupont',
                'role'  => 'E-commerce Manager — XYZ',
                'rating' => 5,
                'avatar' => 'avatars/william.jpg',
            ],
            [
                'quote' => "Des pubs qui convertissent et une équipe qui tient ses promesses. On recommande chaudement.",
                'name'  => 'Sophie Martin',
                'role'  => 'Head of Growth — Bloomup',
                'rating' => 5,
                'avatar' => null,
            ],
            [
                'quote' => "J’ai le plaisir de collaborer avec ClickUp dans le cadre de la gestion de nos campagnes. Réactivité, professionnalisme et recommandations de grande qualité.",
                'name'  => 'Elise Roux',
                'role'  => 'Responsable Marketing Digital & Ecommerce — POLAR',
                'rating' => 5,
                'avatar' => 'avatars/elise.jpg',     // optionnel
            ],
            [
                'quote' => "Grâce à l’équipe, nous avons réduit nos coûts tout en augmentant les ventes. Un partenaire fiable et impliqué.",
                'name'  => 'Jérôme Sabourin',
                'role'  => 'CEO — Thorvald | SAB Brothers',
                'rating' => 5,
                'avatar' => null,
            ],
            [
                'quote' => "Ils comprennent vite les enjeux, s’adaptent et délivrent. On a enfin une stratégie claire et qui performe.",
                'name'  => 'William Dupont',
                'role'  => 'E-commerce Manager — XYZ',
                'rating' => 5,
                'avatar' => 'avatars/william.jpg',
            ],
            [
                'quote' => "Des pubs qui convertissent et une équipe qui tient ses promesses. On recommande chaudement.",
                'name'  => 'Sophie Martin',
                'role'  => 'Head of Growth — Bloomup',
                'rating' => 5,
                'avatar' => null,
            ],
        ];

        $intro = [
            'title' => "En 2025, la publicité n’est plus une option, c’est ta survie.",
            'subtitle' => "Tes futurs clients dépensent des milliards chaque année sur Facebook & TikTok.
                       Sans stratégie claire, ton produit reste invisible.
                       Notre process cyclique ClickUp™ te permet d’avoir un flux continu de ventes, sans hasard.",
            'cta' => "Réserve ton appel découverte",
        ];

        $steps = [
            [
                'number' => 1,
                'title' => 'Formulaire rapide',
                'content' => 'Tu remplis un bref questionnaire en 2 minutes.',
                'icon' => 'https://faibrik.com/wp-content/uploads/list-2389219_1280.png',
            ],
            [
                'number' => 2,
                'title' => 'Analyse en 48h',
                'content' => 'On décortique ton compte et on prépare un plan concret.',
                'icon' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLc2IhvI_ReLN8Ei54wztlDY99jjzUm4vhPw&s',
            ],
            [
                'number' => 3,
                'title' => 'Reprise en main complète',
                'content' => 'On restructure tes pubs, on coupe les fuites, on scale ce qui marche.',
                'icon' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS0BToNiqiD7HukGSliz4yZhsGxg6JYDpwXVw&s',
            ],
            [
                'number' => 4,
                'title' => 'Suivi hebdo',
                'content' => 'Chaque semaine, tu reçois un point détaillé : ce qu’on a fait, ce qu’on va faire, et où tu en es.',
                'icon' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnpSQmlD68EKsIREGwAoebEUm2eTjn-ZbvuA&s',
            ],
        ];

        $callToAction = [
            'title' => "Tu veux transformer ton business en machine à vendre",
            'subtitle' => "Réserve ton appel découverte, parle-nous de tes galères,
                       et on t’apporte un plan clair + la méthode CREA™ pour les résoudre.",
            'button' => "Réserve ton appel maintenant",
        ];

        // Champs pour la prise de rendez-vous
        $formFields = [
            ['name' => 'name', 'label' => 'Nom complet', 'type' => 'text', 'required' => true],
            ['name' => 'email', 'label' => 'Adresse email', 'type' => 'email', 'required' => true],
            ['name' => 'phone', 'label' => 'Téléphone', 'type' => 'tel', 'required' => false],
            ['name' => 'company', 'label' => 'Entreprise', 'type' => 'text', 'required' => false],
            ['name' => 'date', 'label' => 'Choisis ta date', 'type' => 'date', 'required' => true],
            ['name' => 'time', 'label' => 'Horaire préféré', 'type' => 'time', 'required' => true],
            ['name' => 'message', 'label' => 'Parle-nous de tes galères', 'type' => 'textarea', 'required' => false],
        ];

        return view('pages.support', [
            'section' => [
                'title' => "L’accompagnement qui transforme ton budget pub en une machine à cash.",
                'subtitle' => "Avec notre méthode CREA™, on t’aide à installer un système publicitaire rentable et prévisible sur Facebook & TikTok. Ton business, notre obsession.",
                'button_text' => "Réserve ton appel découverte",
                'button_link' => url('contact'),
                'image' => Storage::disk('public')->url('accompagnements/hero.png')
            ],
            'whyUs' => [
                'title' => "Pourquoi travailler avec nous ?",
                'features' => [
                    [
                        'image' => Storage::disk('public')->url('accompagnements/feat1.png'),
                        'title' => "Accompagnement stratégique",
                        'description' => "On ne se contente pas de lancer des pubs. On construit une stratégie claire adaptée à ton marché, ton produit et ton budget, pour que tes ventes explosent sans te noyer dans la complexité.",
                    ],
                    [
                        'image' => Storage::disk('public')->url('accompagnements/feat2.png'),
                        'title' => "Objectifs = Rentabilité",
                        'description' => "Ton objectif n’est pas d’avoir des clics, mais du cash. Notre mission : transformer chaque euro investi en retour concret et mesurable.",
                    ],
                    [
                        'image' => Storage::disk('public')->url('accompagnements/feat3.png'),
                        'title' => "Méthode CREA = Résultats prévisibles",
                        'description' => "Notre méthode CREA™ combine psychologie, storytelling et data. Résultat : des publicités qui accrochent, qui vendent, et un système publicitaire qui tourne comme une machine.",
                    ],
                ],
            ],
            'methodology' => [
                'title' => 'Notre méthodologie en 4 temps',
                'subtitle' => 'Un accompagnement complet, sur-mesure, pour gérer et faire évoluer votre compte Amazon Ads.',
                'steps' => [
                    [
                        'number' => 1,
                        'title' => 'Audit',
                        'week' => 'Semaine 1',
                        'image' => "https://cdn.prod.website-files.com/682d6c53727e1a42ddfafe91/684996da176738787dd9e4b2_refonte.webp",
                        'content' => "Analyse initiale de votre compte pour identifier les points faibles et les opportunités. Nous clarifions vos objectifs et établissons une feuille de route claire.",
                        'tags' => ['Analyse compte', 'Objectifs', 'Feuille de route'],
                    ],
                    [
                        'number' => 2,
                        'title' => 'Refonte',
                        'week' => 'Semaine 2',
                        'image' => "https://cdn.prod.website-files.com/682d6c53727e1a42ddfafe91/684995ef6ddb2e1ba7e9bddd_audit.webp",
                        'content' => "On clarifie les objectifs, on priorise les bons ASINs, on restructure et on réactive les leviers efficaces : sponsored products, sponsored brands, sponsored display.",
                        'tags' => ['Campagnes', 'Produits', 'Tendances'],
                    ],
                    [
                        'number' => 3,
                        'title' => 'Pilotage',
                        'week' => 'Semaine 3',
                        'image' => "https://cdn.prod.website-files.com/682d6c53727e1a42ddfafe91/684997174a9d876870fae016_pilotage.webp",
                        'content' => "Mise en place d’un suivi hebdo : ajustement des campagnes, pilotage budgétaire et tests A/B continus pour améliorer la performance.",
                        'tags' => ['Suivi budget', 'A/B Testing', 'Optimisation'],
                    ],
                    [
                        'number' => 4,
                        'title' => 'Reporting',
                        'week' => 'Semaine 4',
                        'image' => "https://cdn.prod.website-files.com/682d6c53727e1a42ddfafe91/6849975c03d8f92b68d3f0b2_reporting.webp",
                        'content' => "Un reporting clair et détaillé, avec des insights exploitables pour ajuster votre stratégie et assurer une croissance continue.",
                        'tags' => ['Tableau de bord', 'Insights', 'Croissance'],
                    ],
                ],
            ],
            'process' => [
                'headline' => "En 2025, la publicité n’est plus une option, c’est ta survie.",
                'subtext' => "Tes futurs clients dépensent des milliards chaque année sur Facebook & TikTok.
                      Sans stratégie claire, ton produit reste invisible.
                      Notre process cyclique ClickUp™ te permet d’avoir un flux continu de ventes, sans hasard.",
                'cta' => [
                    'text' => 'Réserve ton appel découverte',
                    'link' => '/contact'
                ],
                'steps' => [
                    [
                        'title' => 'Formulaire rapide',
                        'number' => 1,
                        'description' => 'Tu remplis un bref questionnaire en 2 minutes.',
                    ],
                    [
                        'title' => 'Analyse en 48h',
                        'number' => 2,
                        'description' => 'On décortique ton compte et on prépare un plan concret.',
                    ],
                    [
                        'title' => 'Reprise en main complète',
                        'number' => 3,
                        'description' => 'On restructure tes pubs, on coupe les fuites, on scale ce qui marche.',
                    ],
                    [
                        'title' => 'Suivi hebdo',
                        'number' => 4,
                        'description' => 'Chaque semaine, tu reçois un point détaillé : ce qu’on a fait, ce qu’on va faire, où tu en es.',
                    ],
                ],
            ],
            'intro' => $intro,
            'steps' => $steps,
            'testimonials' => $testimonials,
            'testimonialsCta' => [
                'text' => 'Découvrir leurs transformations',
                'href' => '#' ?? '#',
            ],
            'callToAction' => $callToAction,
            'formFields' => $formFields,
        ]);
    }
}
