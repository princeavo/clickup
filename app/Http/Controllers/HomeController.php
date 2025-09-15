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
                'title' => 'Facebook',
                'description' => 'La plateforme qui connaît les <strong>besoins de tes clients</strong> mieux que leur entourage.',
                'image' => asset('storage/resources/facebook.png'),
            ],
            [
                'title' => 'TikTok',
                'description' => 'L’eldorado de <strong>l’attention</strong> où les achats impulsifs deviennent tes meilleures ventes.',
                'image' => asset('storage/resources/tiktok.png'),
            ],
            [
                'title' => 'Les Stats',
                'description' => '98% de tes clients passent <strong>5 à 6h/jour</strong> sur FB & TikTok. Tu peux vendre à tout moment.',
                'image' => asset('storage/resources/stats.png'),
            ],
        ];



        $accompagnement = [
            'title' => "Arrête de perdre de l’argent <span class='text-transparent bg-clip-text bg-gradient-to-r from-[#ffb845] to-[#ff8c00]'>avec des pubs qui ne vendent pas</span>",
            'subtitle' => "Chez ClicUp : pas de jolies pubs, des machines à vendre Facebook & TikTok qui rapportent",
            'points' => [
                "Tu te concentres sur ton business",
                "Chaque € investi rapporte",
                "On gère, tu encaisses",
            ],
            'cta' => ['text' => 'Notre Accompagnement', 'href' => '#'],
            'items' => [
                ['title' => 'Rentabilité', 'description' => "Chaque € investi doit rapporter. Sinon, ce n’est pas de la pub, c’est une perte.", 'icon' => 'dollar-sign'],
                ['title' => 'Expertise', 'description' => "350+ campagnes lancées, des millions générés, un savoir-faire éprouvé.", 'icon' => 'award'],
                ['title' => 'Suivi dédié', 'description' => "Un account manager qui connaît ton business (pas un stagiaire multi-tâches).", 'icon' => 'user-check'],
                ['title' => 'Tranquillité', 'description' => "On gère, tu dors. Tes pubs tournent et tes ventes tombent.", 'icon' => 'moon'],
            ]
        ];



        $services = [
            [
                'name' => 'Publicité Facebook et TikTok',
                'content' => [
                    [
                        'title' => 'Facebook Ads',
                        'description' => 'La plateforme qui connaît les besoins de tes clients mieux que leur entourage.',
                        'icon' => 'https://images.icon-icons.com/4048/PNG/512/facebook_logo_icon_257007.png'
                    ],
                    [
                        'title' => 'TikTok Ads',
                        'description' => 'L’eldorado de l’attention où les achats impulsifs deviennent tes meilleures ventes.',
                        'icon' => 'https://cdn-bgp.bluestacks.com/BGP/fr/gametiles_com.zhiliaoapp.musically.go.jpg'
                    ],
                    [
                        'title' => 'Social Proof',
                        'description' => '98% de tes clients passent 5h/jour sur Facebook & TikTok : deviens omniprésent.',
                        'icon' => 'https://3fe8cdf4.delivery.rocketcdn.me/wp-content/uploads/2019/10/Depositphotos_159503330_xl-2015-scaled.jpg.webp'
                    ],
                ]
            ],
            [
                'name' => 'Stratégie Créative',
                'content' => [
                    [
                        'title' => 'Création Vidéo',
                        'description' => 'Des publicités qui frappent, déclenchent l’émotion et convertissent.',
                        'icon' => 'https://images.icon-icons.com/4048/PNG/512/facebook_logo_icon_257007.png'
                    ],
                    [
                        'title' => 'Design Graphique',
                        'description' => 'Des visuels impactants qui captent l’attention en 3 secondes.',
                        'icon' => 'https://images.icon-icons.com/4048/PNG/512/facebook_logo_icon_257007.png'
                    ],
                    [
                        'title' => 'Copywriting',
                        'description' => 'Des textes qui vendent et créent un lien émotionnel.',
                        'icon' => 'https://images.icon-icons.com/4048/PNG/512/facebook_logo_icon_257007.png'
                    ],
                ]
            ],
            [
                'name' => 'Consultation Stratégique',
                'content' => [
                    [
                        'title' => 'Audit Business',
                        'description' => 'Une analyse profonde pour identifier les freins et opportunités.',
                        'icon' => 'https://cdn-bgp.bluestacks.com/BGP/fr/gametiles_com.zhiliaoapp.musically.go.jpg'
                    ],
                    [
                        'title' => 'Scaling',
                        'description' => 'On t’aide à scaler sans sacrifier ta rentabilité.',
                        'icon' => 'https://cdn-bgp.bluestacks.com/BGP/fr/gametiles_com.zhiliaoapp.musically.go.jpg'
                    ],
                    [
                        'title' => 'Suivi personnalisé',
                        'description' => 'Un accompagnement continu adapté à ton business.',
                        'icon' => 'https://cdn-bgp.bluestacks.com/BGP/fr/gametiles_com.zhiliaoapp.musically.go.jpg'
                    ],
                ]
            ]
        ];

        $stats = [
            [
                'value' => 100,
                'suffix' => '+',
                'label' => 'Clients accompagnés',
            ],
            [
                'value' => 24,
                'suffix' => 'M€',
                'label' => 'de CA généré pour nos clients',
            ],
            [
                'value' => 92,
                'suffix' => '%',
                'label' => 'de satisfaction clients',
            ],
            [
                'value' => 300,
                'suffix' => 'K€',
                'label' => 'gérés mensuellement',
            ]
        ];

        $testimonials = [
            [
                'quote' => "J’ai le plaisir de collaborer avec ClickUp dans le cadre de la gestion de nos campagnes. Réactivité, professionnalisme et recommandations de grande qualité.",
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
            'title' => "<span class='text-orange-400 italic'>Ton prospect scrolle ?</span>",
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
                'subtitle' => "ClickUp est l’agence spécialisée Facebook & TikTok Ads qui aide les marques e-commerce (15–50k€/mois) à scaler x2/x3 et stabiliser leurs ventes en 61 jours grâce à la méthode CREA™",
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
                'href' => '#' ?? '#',
            ],
            'ebooks' => $ebooks,
            'crea' => $crea,
            'prospect' => $prospect
        ]);
    }
}
