<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function index()
    {
        return view("pages.results", [
            'hero' => [
                'title' => 'Nos success Stories',
                'subtitle' => 'On installe la machine à vente chez nos clients…',
                'ctaText' => 'Appel de découverte',
                'ctaLink' => route('home')
            ],
            'stories' => [
                [
                    'image' => 'https://wininda.com/257-thickbox_default/produit1.jpg',
                    'thumbnail' => 'https://wininda.com/257-thickbox_default/produit1.jpg',
                    'goal' => '+150% de ventes en 3 mois',
                    'brand' => 'Marque Alpha',
                    'problem' => 'Difficulté à convertir via TikTok Ads',
                    'solution' => 'Mise en place d\'une stratégie TikTok Ads ciblée avec des créatives virales et un funnel optimisé.',
                    'results' => [
                        'Ventes augmentées de 150% en 3 mois',
                        'ROI de 4.2x sur les campagnes',
                        'Coût d\'acquisition réduit de 35%',
                    ],
                    'testimonial' => 'ClickUp a transformé notre présence sur TikTok. Les résultats ont dépassé toutes nos attentes !',
                    'link' => '#',
                ],
                [
                    'image' => 'https://www.dfc-electricite.com/70/produit1.jpg',
                    'thumbnail' => 'https://www.dfc-electricite.com/70/produit1.jpg',
                    'goal' => 'ROI x3 sur Facebook Ads',
                    'brand' => 'Marque Beta',
                    'problem' => 'Budget gaspillé sans résultats',
                    'solution' => 'Refonte complète de la stratégie Facebook Ads avec segmentation avancée et retargeting intelligent.',
                    'results' => [
                        'ROI multiplié par 3',
                        'Taux de conversion augmenté de 85%',
                        'Budget optimisé avec -40% de dépenses inutiles',
                    ],
                    'testimonial' => 'Enfin une agence qui tient ses promesses. Notre budget pub est devenu rentable !',
                    'link' => '#',
                ],
                [
                    'image' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/abs-ultra-noir-produit1.jpg',
                    'thumbnail' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/abs-ultra-noir-produit1.jpg',
                    'goal' => 'Acquisition de 10k clients',
                    'brand' => 'Marque Gamma',
                    'problem' => 'Manque de notoriété en ligne',
                    'solution' => 'Campagne d\'acquisition massive sur Facebook et TikTok avec stratégie de contenu viral.',
                    'results' => [
                        '10 000+ nouveaux clients acquis',
                        'Notoriété de marque x5',
                        'Communauté engagée de 50k followers',
                    ],
                    'testimonial' => 'De zéro à héros en quelques mois. ClickUp a boosté notre croissance de façon incroyable.',
                    'link' => '#',
                ],
                [
                    'image' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/abs-ultra-noir-produit3.jpg',
                    'thumbnail' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/abs-ultra-noir-produit3.jpg',
                    'goal' => '+200% de revenus',
                    'brand' => 'Marque Delta',
                    'problem' => 'Stagnation des ventes en ligne',
                    'solution' => 'Stratégie omnicanale Facebook + TikTok avec optimisation du parcours client.',
                    'results' => [
                        'Revenus doublés en 4 mois',
                        'Panier moyen augmenté de 45%',
                        'Taux de rétention client de 68%',
                    ],
                    'testimonial' => 'Notre chiffre d\'affaires a explosé grâce à leur expertise. Merci ClickUp !',
                    'link' => '#',
                ],
                [
                    'image' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/abs-ultra-noir-produit4.jpg',
                    'thumbnail' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/abs-ultra-noir-produit4.jpg',
                    'goal' => 'Scale de 5k à 50k€/mois',
                    'brand' => 'Marque Epsilon',
                    'problem' => 'Incapacité à scaler les campagnes',
                    'solution' => 'Méthode CREA™ appliquée avec tests créatifs massifs et scaling progressif.',
                    'results' => [
                        'Budget pub passé de 5k à 50k€/mois',
                        'Ventes multipliées par 10',
                        'Structure publicitaire stable et rentable',
                    ],
                    'testimonial' => 'Ils ont réussi là où 3 autres agences ont échoué. Du vrai professionnalisme.',
                    'link' => '#',
                ],
                [
                    'image' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/ultrafuse-pet-rouge-produit-300x300.jpg',
                    'thumbnail' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/ultrafuse-pet-rouge-produit-300x300.jpg',
                    'goal' => 'Lancement produit réussi',
                    'brand' => 'Marque Zeta',
                    'problem' => 'Nouveau produit sans visibilité',
                    'solution' => 'Campagne de lancement orchestrée sur Facebook et TikTok avec influenceurs.',
                    'results' => [
                        '5000 ventes en 2 semaines',
                        'Rupture de stock en 1 mois',
                        'Buzz viral avec 2M de vues',
                    ],
                    'testimonial' => 'Notre lancement a été un carton grâce à ClickUp. Produit sold out en un mois !',
                    'link' => '#',
                ],
            ]
        ]);
    }
}
