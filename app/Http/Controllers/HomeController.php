<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brands = [
            ['name' => 'Decoho', 'logo' => 'brands/decoho.png'],
            ['name' => 'Merry Square', 'logo' => 'brands/merry-square.png'],
            ['name' => 'Polar', 'logo' => 'brands/polar.png'],
            ['name' => 'Bloomup', 'logo' => 'brands/bloomup.png'],
            ['name' => 'Thorvald', 'logo' => 'brands/thorvald.png'],
            ['name' => 'Decoho', 'logo' => 'brands/decoho.png'],
            ['name' => 'Merry Square', 'logo' => 'brands/merry-square.png'],
            ['name' => 'Polar', 'logo' => 'brands/polar.png'],
            ['name' => 'Bloomup', 'logo' => 'brands/bloomup.png'],
            ['name' => 'Thorvald', 'logo' => 'brands/thorvald.png'],
        ];

        $resources = [
            [
                'title' => 'Le géant de la conversion',
                'description' => '3 milliards d\'utilisateurs. Ciblage ultra-précis pour le reciblage et la conversion. Idéal pour paniers élevés.',
                'image' => asset('storage/resources/facebook.png'),
            ],
            [
                'title' => 'La machine à viralité',
                'description' => '1,5 milliard d\'utilisateurs engagés. CPM très bas. Parfait pour tester des créatives et toucher de nouvelles audiences.',
                'image' => asset('storage/resources/tiktok.png'),
            ],
            [
                'title' => 'Les chiffres ne mentent pas',
                'description' => '84 % des e-commerces qui scalent combinent les deux. ROAS moyen x2,8 sur Facebook. Acquisition 1,5x moins chère sur TikTok.',
                'image' => asset('storage/resources/stats.png'),
            ],
        ];



        $accompagnement = [
            'title' => "Pourquoi nos clients <span class='text-orange-400'>ne veulent plus nous quitter</span>",
            'subtitle' => "On ne fait pas que lancer des pubs. On devient ton bras droit acquisition avec une obsession : tes résultats.",
            'points' => [
                "Tu te concentres sur ton business",
                "Chaque € investi rapporte",
                "On gère, tu encaisses",
            ],
            'cta' => ['text' => 'Notre Accompagnement', 'href' => '#'],
            'items' => [
                ['title' => 'Rentabilité mesurée au centime près', 'description' => "Chaque euro est tracké. On optimise pour le ROAS, pas les vanity metrics. Si ça ne rapporte pas, on coupe. Objectif : +180% de ROAS minimum.", 'icon' => 'dollar-sign'],
                ['title' => '+700 créatives testées, 13 marques accompagnées', 'description' => "On ne théorise pas, on teste. 2 ans d'expérience e-commerce. On sait ce qui marche. Tu bénéficies de notre courbe d'apprentissage.", 'icon' => 'award'],
                ['title' => 'Un interlocuteur unique, dispo et réactif', 'description' => "Pas de junior. Un stratège dédié qui connaît ton business. Point hebdo, dashboard temps réel, WhatsApp direct. Tu sais toujours où tu en es.", 'icon' => 'user-check'],
                ['title' => 'Tu dors tranquille, on pilote la machine', 'description' => "Fini les nuits à surveiller. On gère : budget, optimisations, tests, reporting. Tu te concentres sur ton produit. Nous, on ramène les ventes.", 'icon' => 'moon'],
            ]
        ];



        $services = [
            [
                'name' => 'Social Adds',
                'price' => 'À partir de 2999€/mois',
                'content' => [
                    [
                        'title' => 'Setup & Lancement',
                        'description' => 'Audit de ton compte, installation du pixel, structure de campagnes, audiences custom, catalogue produits. On pose les fondations solides.',
                        'icon' => 'settings'
                    ],
                    [
                        'title' => 'Création & Tests créatifs',
                        'description' => 'Rédaction des accroches, design des visuels (ou brief à ton designer), montage vidéo, tests A/B. On produit 10-15 créatives/mois minimum.',
                        'icon' => 'image'
                    ],
                    [
                        'title' => 'Optimisation continue',
                        'description' => 'Suivi quotidien, ajustements de budget, scaling des winners, arrêt des losers. Dashboard temps réel + point hebdo par appel.',
                        'icon' => 'trending-up'
                    ],
                ]
            ],
            [
                'name' => 'Stratégie Créative',
                'price' => '999€ (one-shot)',
                'content' => [
                    [
                        'title' => 'Veille concurrentielle',
                        'description' => 'Analyse de tes concurrents directs : quelles créa ils utilisent, quels messages, quels angles. On identifie les gaps et opportunités.',
                        'icon' => 'eye'
                    ],
                    [
                        'title' => 'Swipe File personnalisé',
                        'description' => 'On te livre un dossier complet avec les meilleures créatives de ton secteur + nos recommandations d\'adaptation pour ta marque.',
                        'icon' => 'folder'
                    ],
                    [
                        'title' => 'Brief créatif clé en main',
                        'description' => 'Scripts vidéo, accroches texte, concepts visuels. Tu n\'as plus qu\'à produire (ou on produit pour toi si besoin).',
                        'icon' => 'file-text'
                    ],
                ]
            ],
            [
                'name' => 'Consultation Stratégique',
                'price' => '499€ (audit + roadmap) | +299€/mois (suivi)',
                'content' => [
                    [
                        'title' => 'Audit complet de ton compte',
                        'description' => 'Analyse de tes campagnes actuelles, identification des fuites budgétaires, recommandations priorisées. Document PDF + appel 1h.',
                        'icon' => 'search'
                    ],
                    [
                        'title' => 'Roadmap personnalisée',
                        'description' => 'Plan d\'action sur 90 jours : quelles campagnes lancer, quels budgets, quelles créa, quelles audiences. Étape par étape.',
                        'icon' => 'map'
                    ],
                    [
                        'title' => 'Suivi mensuel (optionnel)',
                        'description' => 'Appel stratégique 1x/mois pour ajuster ta roadmap, répondre à tes questions, débloquer tes galères. Tu exécutes, on guide.',
                        'icon' => 'phone'
                    ],
                ]
            ]
        ];

        $stats = [
            [
                'value' => 13,
                'suffix' => '+',
                'label' => 'E-commerces accompagnés',
                'precision' => 'De 15K€ à 80K€/mois',
            ],
            [
                'value' => 1,
                'suffix' => 'M€',
                'label' => 'De CA généré pour nos clients',
                'precision' => 'En 24 mois d\'activité',
            ],
            [
                'value' => 180,
                'suffix' => '%',
                'label' => 'De ROAS moyen',
                'precision' => '1€ investi = 1,80€ de retour minimum',
            ],
            [
                'value' => 1100,
                'suffix' => '+',
                'label' => 'Créatives testées',
                'precision' => 'On sait ce qui marche en 2025',
            ]
        ];

        $testimonials = [
            [
                'quote' => "J’ai le plaisir de collaborer avec clicup dans le cadre de la gestion de nos campagnes. Réactivité, professionnalisme et recommandations de grande qualité.",
                'name'  => 'Elise Roux',
                'role'  => 'Responsable Marketing Digital & Ecommerce — POLAR',
                'rating' => 5,
                'avatar' => 'https://www.journaldugeek.com/app/uploads/2025/02/avatar-dernier-maitre-de-lair-suite.jpg',     // optionnel
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

        $ebooks = [
            [
                'title' => 'Stratégies Facebook Ads',
                'image' => '/images/ebooks/facebook-ads.png',
                'link'  => '#',
            ],
            [
                'title' => 'Secrets TikTok Ads',
                'image' => '/images/ebooks/tiktok-ads.png',
                'link'  => '#',
            ],
            [
                'title' => 'Guide Retargeting',
                'image' => '/images/ebooks/retargeting.png',
                'link'  => '#',
            ],
            [
                'title' => 'Scaling Ads',
                'image' => '/images/ebooks/scaling.png',
                'link'  => '#',
            ],
            [
                'title' => 'Stratégies Facebook Ads',
                'image' => '/images/ebooks/facebook-ads.png',
                'link'  => '#',
            ],
            [
                'title' => 'Secrets TikTok Ads',
                'image' => '/images/ebooks/tiktok-ads.png',
                'link'  => '#',
            ],
            [
                'title' => 'Guide Retargeting',
                'image' => '/images/ebooks/retargeting.png',
                'link'  => '#',
            ],
            [
                'title' => 'Scaling Ads',
                'image' => '/images/ebooks/scaling.png',
                'link'  => '#',
            ],
        ];

        $crea = [
            'title' => 'La méthode CREA™',
            'subtitle' => "Des publicités qui <span class='font-semibold'>captent l’attention</span>, déclenchent l’émotion et transforment l’intérêt en <span class='font-semibold'>chiffre d’affaires</span>.",
            'cta' => 'Découvrir la méthode CREA™',
            'ctaUrl' => '/methode-crea',
            'image' => 'https://www.creageneve.com/wp-content/uploads/2022/10/crea_homepage.jpg',
        ];

        $prospect = [
            'title' => "<span class='text-orange-400 italic'>Ton prospect scroll ?</span>",
            'subtitle' => "Nous faisons en sorte qu’il s’arrête, qu’il clique et qu’il achète",
            'steps' => [
                "Ta pub apparaît dans son feed",
                "Il clique sur ta pub",
                "Il va sur ton site et achète",
            ],
        ];


        return view('pages.home', [
            'brands' => $brands,
            'hero' => [
                'title' => "On transforme ton budget pub en ventes prévisibles (pas en likes inutiles)",
                'subtitle' => "Clicup est l’agence spécialisée Facebook & TikTok Ads qui aide les marques e-commerce (15–50k€/mois) à scaler x2/x3 et stabiliser leurs ventes en 61 jours grâce à la méthode CREA™",
                'cta' => "Réserve ton audit gratuit",
                'background' => "/images/bg-hero.jpg"
            ],
            'resources' => $resources,
            'accompagnement' => $accompagnement,
            'services' => $services,
            'stats' => $stats,
            'testimonials' => $testimonials,
            'testimonialsCta' => [
                'text' => 'Découvrir leurs transformations',
                'href' => '#',
            ],
            'ebooks' => $ebooks,
            'ebookSection' => [
                'title_colored' => '3 guides gratuits',
                'title_white' => 'pour maîtriser Facebook & TikTok Ads',
                'description' => 'Nos meilleures stratégies en accès libre. Télécharge, applique, et vois les résultats dès cette semaine. Aucune carte bancaire requise.',
                'cta_all' => 'Voir tous les guides',
                'cta_all_link' => '#ebooks'
            ],
            'crea' => $crea,
            'prospect' => $prospect
        ]);
    }
}
