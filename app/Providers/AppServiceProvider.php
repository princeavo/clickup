<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Injecte le footer dans le layout principal
        View::composer('layouts.app', function ($view) {
            $footer = [
                'logo' => asset('logo-footer.png'),
                'about' => "Clicup est l’agence spécialisée Facebook & TikTok Ads qui transforme ton budget pub en ventes prévisibles.",
                'links' => [
                    [
                        'title' => 'L\'Agence',
                        'items' => [
                            ['label' => 'À propos', 'url' => '/about'],
                            ['label' => 'Notre équipe', 'url' => '/team'],
                            ['label' => 'Carrières', 'url' => '/jobs'],
                        ]
                    ],
                    [
                        'title' => 'Ressources',
                        'items' => [
                            ['label' => 'Blog', 'url' => '/blog'],
                            ['label' => 'Guides', 'url' => '/guides'],
                            ['label' => 'Ebooks', 'url' => '/ebooks'],
                        ]
                    ],
                    [
                        'title' => 'Légal',
                        'items' => [
                            ['label' => 'Confidentialité', 'url' => '/privacy'],
                            ['label' => 'Conditions', 'url' => '/terms'],
                        ]
                    ]
                ],
                'socials' => [
                    ['icon' => 'facebook', 'url' => 'https://facebook.com'],
                    ['icon' => 'twitter', 'url' => 'https://twitter.com'],
                    ['icon' => 'linkedin', 'url' => 'https://linkedin.com'],
                    ['icon' => 'tiktok', 'url' => 'https://tiktok.com'],
                ],
                'copyright' => "© " . date('Y') . " clicup. Tous droits réservés."
            ];
            $view->with('footer', $footer);
        });

        // Injecte les marques dans le carrousel
        View::composer('components.brand-carousel', function ($view) {
            $brands = [
                ['name' => 'Nom1', 'logo' => 'brands/logo_01.png'],
                ['name' => 'Nom2', 'logo' => 'brands/logo_02.png'],
                ['name' => 'Nom3', 'logo' => 'brands/logo_03.png'],
                ['name' => 'Nom4', 'logo' => 'brands/logo_04.png'],
                ['name' => 'Nom5', 'logo' => 'brands/logo_05.png'],
            ];
            $view->with('brands', $brands);
            $view->with('title', 'Ils nous font confiance');
            $view->with('subtitle', '+13 e-commerces accompagnés, +1M€ de CA généré, +180% de ROAS moyen. Nos clients ne sont pas des chiffres ce sont des partenaires qu\'on fait grandir.');
            $view->with('speed', 100);
            $view->with('fade', true);
            $view->with('pauseOnHover', true);
            $view->with('threshold', 10);
        });

        // Injecte les ebooks
        View::composer('components.ebook-carousel', function ($view) {
            $ebooks = [
                [
                    'title' => 'Facebook Ads Mastery',
                    'subtitle' => 'Le guide complet (47 pages) : du setup du pixel au scaling à 10K€/jour.',
                    'image' => asset('images/ebooks/facebook-ads-mastery-2025.png'),
                    'link'  => '#',
                    'cta'   => 'Télécharger gratuitement',
                ],
                [
                    'title' => 'Vendre Sans Effort',
                    'subtitle' => 'Crée un funnel publicitaire qui tourne 24/7 et génère des ventes pendant que tu dors.',
                    'image' => asset('images/ebooks/vendre-en-dormant.png'),
                    'link'  => '#',
                    'cta'   => 'Télécharger gratuitement',
                ],
                [
                    'title' => 'Zéro A Million',
                    'subtitle' => 'Passe de 50% à 400% de ROAS : audiences, créatives et tunnel de vente.',
                    'image' => asset('images/ebooks/roas-x4.png'),
                    'link'  => '#',
                    'cta'   => 'Télécharger gratuitement',
                ],
            ];

            $section = [
                'title_colored' => '3 guides gratuits',
                'title_white' => 'pour maîtriser ton acquisition client (même sans nous)',
                'description' => 'Nos meilleures stratégies en libre accès. Télécharge, applique, et vois les résultats dès cette semaine. Aucune CB requise, aucun spam.',
                'cta_all' => 'Voir tous les ebooks',
            ];

            $view->with(compact('ebooks', 'section'));
        });


        View::composer('components.stats-section', function ($view) {
            $stats = [
                [
                    'value' => 13,
                    'suffix' => '+',
                    'label' => 'E-commerces accompagnés',
                    'precision' => 'Depuis 2 ans',
                ],
                [
                    'value' => 1,
                    'suffix' => 'M€+',
                    'label' => 'De CA généré pour nos clients',
                    'precision' => 'Sur 24 mois',
                ],
                [
                    'value' => 180,
                    'suffix' => '%',
                    'label' => 'De ROAS moyen',
                    'precision' => 'Performance garantie',
                ],
                [
                    'value' => 1100,
                    'suffix' => '+',
                    'label' => 'Créatives testées',
                    'precision' => 'On sait ce qui marche',
                ]
            ];
            $view->with('stats', $stats);
        });

        View::composer('components.testimonials-carousel', function ($view) {
            $testimonials = [
                [
                    'quote' => "J’ai le plaisir de collaborer avec clicup dans le cadre de la gestion de nos campagnes. Réactivité, professionnalisme et recommandations de grande qualité.",
                    'name'  => 'Elise Roux',
                    'role'  => 'Responsable Marketing Digital & Ecommerce — POLAR',
                    'rating' => 5,
                    'avatar' => 'https://www.journaldugeek.com/app/uploads/2025/02/avatar-dernier-maitre-de-lair-suite.jpg',
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
                    'avatar' => 'https://img.rts.ch/medias/2010/image/8sh78z-27965023.image?w=1280&h=960',
                ],
                [
                    'quote' => "Des pubs qui convertissent et une équipe qui tient ses promesses. On recommande chaudement.",
                    'name'  => 'Sophie Martin',
                    'role'  => 'Head of Growth — Bloomup',
                    'rating' => 5,
                    'avatar' => null,
                ],
                // doublons pour le carousel
                [
                    'quote' => "J’ai le plaisir de collaborer avec clicup dans le cadre de la gestion de nos campagnes. Réactivité, professionnalisme et recommandations de grande qualité.",
                    'name'  => 'Elise Roux',
                    'role'  => 'Responsable Marketing Digital & Ecommerce — POLAR',
                    'rating' => 5,
                    'avatar' => 'https://www.journaldugeek.com/app/uploads/2025/02/avatar-dernier-maitre-de-lair-suite.jpg',
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
                    'avatar' => 'https://platform.vox.com/wp-content/uploads/sites/2/chorus/uploads/chorus_asset/file/24395697/bkq6gtrpcnw43vsm5zm62q3z.png?quality=90&strip=all&crop=10.454545454545,0,79.090909090909,100',
                ],
                [
                    'quote' => "Des pubs qui convertissent et une équipe qui tient ses promesses. On recommande chaudement.",
                    'name'  => 'Sophie Martin',
                    'role'  => 'Head of Growth — Bloomup',
                    'rating' => 5,
                    'avatar' => null,
                ],
            ];

            $testimonialsSection = [
                'title' => 'Ils nous font confiance',
                'subtitle' => 'Découvrez ce que nos clients disent de nous',
            ];

            $testimonialsCta = [
                'text' => 'Découvrir leurs transformations',
                'href' => '#',
            ];

            $view->with('testimonials', $testimonials);
            $view->with('testimonialsSection', $testimonialsSection);
            $view->with('testimonialsCta', $testimonialsCta);
        });



        View::composer('components.section-call', function ($view) {
            $callToAction = [
                'title' => "Prêt à scaler sans stress",
                'subtitle' => "Réserve ton appel découverte de 30 minutes. On analyse ton compte, on identifie tes fuites budgétaires, et on te propose un plan d'action concret même si tu ne deviens pas client.",
                'button' => "Réserve ton appel maintenant",
            ];

            // Champs pour la prise de rendez-vous
            $formFields = [
                ['name' => 'name', 'label' => 'Nom complet', 'type' => 'text', 'required' => true],
                ['name' => 'email', 'label' => 'Adresse email', 'type' => 'email', 'required' => true],
                ['name' => 'phone', 'label' => 'Téléphone', 'type' => 'tel', 'required' => false],
                ['name' => 'company', 'label' => 'Nom de la marque', 'type' => 'text', 'required' => false],
                ['name' => 'date', 'label' => 'Choisis ta date', 'type' => 'date', 'required' => true],
                ['name' => 'time', 'label' => 'Horaire préféré', 'type' => 'time', 'required' => true],
                ['name' => 'message', 'label' => 'Parle-nous de tes galères', 'type' => 'textarea', 'required' => false],
            ];

            $view->with('callToAction', $callToAction);
            $view->with('formFields', $formFields);
        });

        View::composer('components.whatsapp-button', function ($view) {
            $view->with('whatsappLink', "https://wa.me/33612345678");
        });
    }
}
