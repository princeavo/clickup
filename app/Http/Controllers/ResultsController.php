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
                    'image' => '/images/produit1.jpg',
                    'goal' => '+150% de ventes en 3 mois',
                    'brand' => 'Marque Alpha',
                    'problem' => 'Difficulté à convertir via TikTok Ads',
                    'link' => '#',
                ],
                [
                    'image' => '/images/produit2.jpg',
                    'goal' => 'ROI x3 sur Facebook Ads',
                    'brand' => 'Marque Beta',
                    'problem' => 'Budget gaspillé sans résultats',
                    'link' => '#',
                ],
                [
                    'image' => '/images/produit3.jpg',
                    'goal' => 'Acquisition de 10k clients',
                    'brand' => 'Marque Gamma',
                    'problem' => 'Manque de notoriété en ligne',
                    'link' => '#',
                ],
            ]
        ]);
    }
}
