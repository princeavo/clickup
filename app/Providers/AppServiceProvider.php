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
                'logo' => 'https://thewemark.com/wp-content/uploads/2024/03/metaadsmonthly-services.png',
                'about' => "ClickUp est l’agence spécialisée Facebook & TikTok Ads qui transforme ton budget pub en ventes prévisibles.",
                'links' => [
                    [
                        'title' => 'Agence',
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
                'copyright' => "© " . date('Y') . " ClickUp. Tous droits réservés."
            ];
            $view->with('footer', $footer);
        });

        // Injecte les marques dans le carrousel
        View::composer('components.brand-carousel', function ($view) {
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
            $view->with('brands', $brands);
        });

        // Injecte les ebooks
        View::composer('components.ebook-carousel', function ($view) {
            $ebooks = [
                [
                    'title' => 'Stratégies Facebook Ads',
                    'image' => 'https://cdn.prod.website-files.com/682d6c53727e1a42ddfafe91/6852dcaa710ffb3af6ea27c7_ebook3v2.png',
                    'link'  => '#',
                ],
                [
                    'title' => 'Secrets TikTok Ads',
                    'image' => 'https://cdn.prod.website-files.com/682d6c53727e1a42ddfafe91/684454c1e5705b03b0dc96bc_75a5c1cb9eeeedcb391e9da5ad33660f_Frame%2080.webp',
                    'link'  => '#',
                ],
                [
                    'title' => 'Guide Retargeting',
                    'image' => 'https://www.dunod.com/sites/default/files/thumbnails/image/9782100563081-T.jpg',
                    'link'  => '#',
                ],
                [
                    'title' => 'Scaling Ads',
                    'image' => 'https://www.dunod.com/sites/default/files/thumbnails/image/9782100563081-T.jpg',
                    'link'  => '#',
                ],
                [
                    'title' => 'Stratégies Facebook Ads',
                    'image' => 'https://cdn.prod.website-files.com/682d6c53727e1a42ddfafe91/6852dcaa710ffb3af6ea27c7_ebook3v2.png',
                    'link'  => '#',
                ],
                [
                    'title' => 'Secrets TikTok Ads',
                    'image' => 'https://cdn.prod.website-files.com/682d6c53727e1a42ddfafe91/684454c1e5705b03b0dc96bc_75a5c1cb9eeeedcb391e9da5ad33660f_Frame%2080.webp',
                    'link'  => '#',
                ],
                [
                    'title' => 'Guide Retargeting',
                    'image' => 'https://www.dunod.com/sites/default/files/thumbnails/image/9782100563081-T.jpg',
                    'link'  => '#',
                ],
            ];
            $view->with('ebooks', $ebooks);
        });

        View::composer('components.stats-section', function ($view) {
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
            $view->with('stats', $stats);
        });

        View::composer('components.testimonials-carousel', function ($view) {
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
                    'avatar' => 'https://img.rts.ch/medias/2010/image/8sh78z-27965023.image?w=1280&h=960',
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

            $testimonialsCta =  [
                'text' => 'Découvrir leurs transformations',
                'href' => '#' ?? '#',
            ];
            $view->with('testimonials', $testimonials);
            $view->with('testimonialsCta', $testimonialsCta);
        });


        View::composer('components.section-call', function ($view) {
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

            $view->with('callToAction', $callToAction);
            $view->with('formFields', $formFields);
        });
    }
}
