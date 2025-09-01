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
                'description' => 'La plateforme qui connaît les besoins de tes clients mieux que leur entourage.',
                'image' => 'resources/facebook.png'
            ],
            [
                'title' => 'TikTok',
                'description' => 'L’eldorado de l’attention où les achats impulsifs deviennent tes meilleures ventes.',
                'image' => 'resources/tiktok.png'
            ],
            [
                'title' => 'Stats',
                'description' => '98% de tes clients passent 5 à 6 heures par jour sur Facebook & TikTok. Tu peux vendre à tout moment.',
                'image' => 'resources/social.png'
            ],
        ];

        $accompagnement = [
            'title' => "Arrête de perdre de l’argent avec des pubs qui ne vendent pas.",
            'subtitle' => "Chez ClickUp : pas de jolies pubs, des machines à vendre. Facebook & TikTok qui rapportent :
        ✓ Tu te concentres sur ton business
        ✓ Chaque euro investi rapporte
        ✓ On gère, tu encaisses",
            'cta' => "Notre accompagnement",
            'items' => [
                [
                    'title' => 'Rentabilité',
                    'description' => "Chaque euro investi doit rapporter. Sinon, ce n’est pas de la pub, c’est une perte.",
                    'icon' => 'accompagnements/profit.png',
                ],
                [
                    'title' => 'Expertise',
                    'description' => "350+ campagnes lancées, des millions gérés, un savoir-faire éprouvé.",
                    'icon' => 'accompagnements/expertise.png',
                ],
                [
                    'title' => 'Suivi dédié',
                    'description' => "Un account manager qui connaît ton business (pas un stagiaire).",
                    'icon' => 'accompagnements/manager.png',
                ],
                [
                    'title' => 'Tranquillité',
                    'description' => "On gère, tu dors. Tes pubs tournent et tes ventes tombent.",
                    'icon' => 'accompagnements/peace.png',
                ],
            ]
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
            'accompagnement' => $accompagnement
        ]);
    }
}
