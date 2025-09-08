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
                    'goal' => '+150% de ventes en 3 mois',
                    'brand' => 'Marque Alpha',
                    'problem' => 'Difficulté à convertir via TikTok Ads',
                    'link' => '#',
                ],
                [
                    'image' => 'https://www.dfc-electricite.com/70/produit1.jpg',
                    'goal' => 'ROI x3 sur Facebook Ads',
                    'brand' => 'Marque Beta',
                    'problem' => 'Budget gaspillé sans résultats',
                    'link' => '#',
                ],
                [
                    'image' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/abs-ultra-noir-produit1.jpg',
                    'goal' => 'Acquisition de 10k clients',
                    'brand' => 'Marque Gamma',
                    'problem' => 'Manque de notoriété en ligne',
                    'link' => '#',
                ],
                [
                    'image' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/abs-ultra-noir-produit3.jpg',
                    'goal' => '+150% de ventes en 3 mois',
                    'brand' => 'Marque Alpha',
                    'problem' => 'Difficulté à convertir via TikTok Ads',
                    'link' => '#',
                ],
                [
                    'image' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/abs-ultra-noir-produit4.jpg',
                    'goal' => 'ROI x3 sur Facebook Ads',
                    'brand' => 'Marque Beta',
                    'problem' => 'Budget gaspillé sans résultats',
                    'link' => '#',
                ],
                [
                    'image' => 'https://www.3dconsommables.fr/wp-content/uploads/2023/07/ultrafuse-pet-rouge-produit-300x300.jpg',
                    'goal' => 'Acquisition de 10k clients',
                    'brand' => 'Marque Gamma',
                    'problem' => 'Manque de notoriété en ligne',
                    'link' => '#',
                ],
            ]
        ]);
    }
}
