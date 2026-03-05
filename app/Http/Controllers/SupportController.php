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
                'quote' => "J’ai le plaisir de collaborer avec clicup dans le cadre de la gestion de nos campagnes. Réactivité, professionnalisme et recommandations de grande qualité.",
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
                'quote' => "J’ai le plaisir de collaborer avec clicup dans le cadre de la gestion de nos campagnes. Réactivité, professionnalisme et recommandations de grande qualité.",
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
                       Notre process cyclique clicup™ te permet d’avoir un flux continu de ventes, sans hasard.",
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
                'title' => "L'accompagnement complet pour scaler ta marque <span class='text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00]'>de 15K à 100K€/mois</span>",
                'subtitle' => "On installe un système d'acquisition prévisible pour ta marque. Fini les montagnes russes bienvenue dans la croissance stable et rentable.",
                'button_text' => "Réserve ton audit gratuit (30 min)",
                'button_link' => '#contact',
                'image' => asset('images/hero-accompagnement.jpg')
            ],
            'whyUs' => [
                'title' => "3 raisons de choisir ClicUP plutôt qu'une autre agence",
                'subtitle' => "On ne promet pas la lune. On livre des résultats mesurables, un suivi béton, et une obsession : faire scaler ton CA sans exploser ton ROAS.",
                'features' => [
                    [
                        'image' => Storage::disk('public')->url('accompagnements/feat1.png'),
                        'title' => "Un stratège dédié qui connaît ton business sur le bout des doigts",
                        'description' => "Un interlocuteur unique qui suit ton business semaine après semaine. Point hebdo par appel, dashboard temps réel, WhatsApp direct. Résultat : quelqu'un qui comprend tes enjeux, répond vite, et prend les bonnes décisions.",
                    ],
                    [
                        'image' => Storage::disk('public')->url('accompagnements/feat2.png'),
                        'title' => "On optimise pour le ROAS, pas pour les likes",
                        'description' => "Chaque euro dépensé est tracké. Chaque campagne est analysée. Si ça ne rapporte pas +180% de ROAS minimum, on coupe ou on ajuste. Résultat : ton budget pub devient un investissement rentable, pas un gouffre financier.",
                    ],
                    [
                        'image' => Storage::disk('public')->url('accompagnements/feat3.png'),
                        'title' => "Fini les montagnes russes, bienvenue dans la stabilité",
                        'description' => "Grâce à la méthode CREA™, on élimine l'aléatoire. Tu sais combien investir pour générer X€ de CA. Tu peux planifier ta croissance sur 3, 6, 12 mois. Résultat : tu passes de \"j'espère que ça marche\" à \"je sais que ça marche\".",
                    ],
                ],
            ],
            'methodology' => [
                'title' => 'Comment on travaille : <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00]">la méthode CREA™ en 4 phases</span>',
                'subtitle' => 'Un processus cyclique et éprouvé pour transformer ton budget pub en machine à ventes prévisible. Pas de one-shot : on itère, on optimise, on scale.',
                'steps' => [
                    [
                        'number' => 1,
                        'title' => 'Audit & Clarté',
                        'week' => 'Semaine 1',
                        'image' => asset('images/accompagnement/audit.png'),
                        'content' => "Audit complet de ton compte publicitaire et tunnel de vente. Identification des fuites budgétaires et opportunités. Clarification du positionnement et segments cibles. Livrables : audit PDF, feuille de route et 3 quick wins.",
                        'tags' => ['Analyse de compte', 'Objectifs clairs', 'Feuille de route'],
                    ],
                    [
                        'number' => 2,
                        'title' => 'Refonte & Setup',
                        'week' => 'Semaine 2',
                        'image' => asset('images/accompagnement/refonte.png'),
                        'content' => "Restructuration complète du compte. Installation des pixels Facebook & TikTok et tracking avancé. Création des audiences custom et lookalike. Production de 10-15 créatives. Livrables : compte prêt à scaler et créatives testables.",
                        'tags' => ['Restructuration', 'Tracking', 'Audiences', 'Créatives'],
                    ],
                    [
                        'number' => 3,
                        'title' => 'Pilotage & Optimisation',
                        'content' => "Lancement avec tests A/B continus. Suivi quotidien : ajustements budget, optimisation enchères, arrêt des losers. 10-15 nouvelles créatives/mois. Scaling progressif et point hebdo. Résultats : campagnes 24/7 et croissance stable.",
                        'week' => 'Semaine 3-8+',
                        'tags' => ['Suivi quotidien', 'A/B Testing', 'Optimisation', 'Scaling'],
                        'image' => asset('images/accompagnement/optimisation.png'),
                    ],
                    [
                        'number' => 4,
                        'title' => 'Reporting & Stratégie',
                        'week' => 'Mensuel',
                        'image' => asset('images/accompagnement/reporting.png'),
                        'content' => "Analyse mensuelle des performances. Identification des tendances et opportunités. Ajustement de la stratégie (budgets, audiences, créa). Recommandations tunnel de vente. Livrables : rapport détaillé, roadmap 30 jours et insights stratégiques.",
                        'tags' => ['Tableau de bord', 'Insights', 'Stratégie', 'Croissance continue'],
                    ],
                ],
            ],
            'process' => [
                'headline' => "Pourquoi attendre te coûte <span class='text-orange-400'>des milliers d'euros chaque mois</span>",
                'subtext' => "Pendant que tu hésites, tes concurrents scalent. Chaque mois sans stratégie c'est des milliers d'euros perdus",
                'bullets' => [
                    ['type' => 'negative', 'text' => 'Chaque mois sans stratégie = 10-30K€ de CA en moins'],
                    ['type' => 'negative', 'text' => 'Tes concurrents prennent des parts de marché pendant que tu attends'],
                    ['type' => 'highlight', 'text' => 'Nos clients qui ont démarré il y a 6 mois ont x2 leur CA'],
                    ['type' => 'highlight', 'text' => 'Le meilleur moment pour planter un arbre ? Il y a 10 ans. Le 2ème meilleur moment ? Aujourd\'hui.'],
                ],
                'cta' => [
                    'text' => 'Réserve ton appel découverte maintenant',
                    'link' => '#contact',
                    'subtext' => '30 minutes pour voir si on peut t\'aider. Aucune obligation. Audit offert.',
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
