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
                ['name' => 'Nom1', 'logo' => 'brands/logo_01.png'],
                ['name' => 'Nom2', 'logo' => 'brands/logo_02.png'],
                ['name' => 'Nom3', 'logo' => 'brands/logo_03.png'],
                ['name' => 'Nom4', 'logo' => 'brands/logo_04.png'],
                ['name' => 'Nom5', 'logo' => 'brands/logo_05.png'],
            ];
            $view->with('brands', $brands);
            $view->with('title', 'Plus de <span class="text-orange-400 font-bold">80 marques accompagnées</span>');
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
                    'subtitle' => 'Le GUIDE pratique pour maîtriser la publicité Facebook de A à Z',
                    'image' => 'https://img.freepik.com/vecteurs-premium/telechargez-livre-e-book-marketing-content-marketing-ebook-telecharger-ordinateur-portable-illustration_100456-611.jpg?semt=ais_hybrid&w=740&q=80',
                    'link'  => '#',
                    'cta'   => 'Obtenir',
                ],
                [
                    'title' => 'Vendre sans Efforts',
                    'subtitle' => 'Apprends à créer un système automatisé qui vend pendant ton sommeil',
                    'image' => 'https://www.investintech.com/resources/blog/wp-content/uploads/2013/07/PDF-eBook-reading.jpg',
                    'link'  => '#',
                    'cta'   => 'Obtenir',
                ],
                [
                    'title' => 'Zéro à Millions',
                    'subtitle' => 'Attire des prospects et transforme-les en clients grâce à Facebook Ads',
                    'image' => 'https://www.thebookedition.com/img/cms/CMS/publier-ebook.jpg',
                    'link'  => '#',
                    'cta'   => 'Obtenir',
                ],
                [
                    'title' => 'Facebook Ads Mastery',
                    'subtitle' => 'Le GUIDE pratique pour maîtriser la publicité Facebook de A à Z',
                    'image' => 'https://www.redacteur.com/blog/wp-content/uploads/sites/6/2021/11/ebook.jpg',
                    'link'  => '#',
                    'cta'   => 'Obtenir',
                ],
                // /images/ebooks/vendre-sans-efforts.png
                [
                    'title' => 'Vendre sans Efforts',
                    'subtitle' => 'Apprends à créer un système automatisé qui vend pendant ton sommeil',
                    'image' => 'https://www.aproposdecriture.com/wp-content/uploads/2016/06/free-ebook.jpg',
                    'link'  => '#',
                    'cta'   => 'Obtenir',
                ],
                [
                    'title' => 'Zéro à Millions',
                    'subtitle' => 'Attire des prospects et transforme-les en clients grâce à Facebook Ads',
                    'image' => 'https://www.thebookedition.com/img/cms/CMS/publier-ebook.jpg',
                    'link'  => '#',
                    'cta'   => 'Obtenir',
                ],
            ];

            $section = [
                'title_colored' => 'Ton guide gratuit',
                'title_white' => 'pour lancer des pubs rentables dès aujourd’hui',
                'description' => 'On t’offre un e-book qui révèle nos meilleures stratégies Facebook & TikTok Ads. Tu peux l’appliquer dès demain, sans engagement.',
                'cta_all' => 'Voir tous les ebooks',
            ];

            $view->with(compact('ebooks', 'section'));
        });


        View::composer('components.stats-section', function ($view) {
            $stats = [
                [
                    'value' => 100,
                    'suffix' => '',
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
                    'quote' => "J’ai le plaisir de collaborer avec ClickUp dans le cadre de la gestion de nos campagnes. Réactivité, professionnalisme et recommandations de grande qualité.",
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

        View::composer('components.whatsapp-button', function ($view) {
            $view->with('whatsappLink', "https://wa.me/33612345678");
        });
    }
}
