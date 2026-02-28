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
                    'image' => null,
                    'thumbnail' => null,
                    'goal' => '0 à 100k FCFA de ventes en 1 jour de testing',
                    'brand' => 'Noraske',
                    'problem' => 'Refonte complète de sa boutique pour la passer à une vraie marque qui domine en COD',
                    'solution' => 'Mise en place de la stratégie créative et application de la méthode CREA. Test lancé avec seulement 10€ d\'investissement publicitaire.',
                    'results' => [
                        '100 000 FCFA de ventes en 1 jour de test',
                        '10€ d\'investissement publicitaire seulement',
                        'Boutique repositionnée en marque dominante COD',
                    ],
                    'testimonial' => null,
                    'link' => route('offers') . '#pricing',
                ],
                [
                    'image' => null,
                    'thumbnail' => null,
                    'goal' => 'Stratégie créative performante sur marché concurrentiel',
                    'brand' => 'Griffe d\'Amour',
                    'problem' => 'Boutique e-commerce vendant des produits pour chats sur un marché très concurrentiel',
                    'solution' => 'Mise en place de la stratégie créative adaptée au marché des produits pour chats et application de la méthode CREA pour se démarquer de la concurrence.',
                    'results' => [
                        'Stratégie créative différenciante opérationnelle',
                        'Positionnement unique sur un marché saturé',
                    ],
                    'testimonial' => null,
                    'link' => route('offers') . '#pricing',
                ],
                [
                    'image' => null,
                    'thumbnail' => null,
                    'goal' => 'De 35€ à +7 000€ de CA avec la méthode CREA',
                    'brand' => 'Lakerain',
                    'problem' => 'A testé + de 100 créatives sans trouver une créa qui marche',
                    'solution' => 'Pack créa pour ses ads, identification de l\'angle gagnant et application rigoureuse de la méthode CREA.',
                    'results' => [
                        'CA passé de 35€ à +7 000€',
                        'Angle créatif gagnant identifié',
                        '+100 créatives testées → LA bonne trouvée',
                    ],
                    'testimonial' => null,
                    'link' => route('offers') . '#pricing',
                ],
                [
                    'image' => null,
                    'thumbnail' => null,
                    'goal' => '+879 000 FCFA de ventes en 2 jours avec 10€ investis',
                    'brand' => 'Love',
                    'problem' => 'Création complète de la boutique à partir de zéro',
                    'solution' => 'Création complète de la boutique, mise en place de la stratégie complète d\'acquisition et application de la méthode CREA.',
                    'results' => [
                        '879 000 FCFA de ventes en 2 jours de tests',
                        'Seulement 6 000 FCFA (10€) dépensés en ads',
                        'Boutique créée de zéro et rentable immédiatement',
                    ],
                    'testimonial' => null,
                    'link' => route('offers') . '#pricing',
                ],
                [
                    'image' => null,
                    'thumbnail' => null,
                    'goal' => '18 000€ investis → 56 000€ de CA généré',
                    'brand' => 'Staresia Paris',
                    'problem' => 'A commandé et testé plusieurs créatives sur le marché du shapewear sans succès',
                    'solution' => 'Pack créa avec la méthode CREA, mise en place du process de test sur 3 semaines et identification de ce qui marche.',
                    'results' => [
                        '56 000€ de CA généré',
                        '18 000€ dépensés en ads (ROI x3,1)',
                        'Process de test validé sur 3 semaines',
                    ],
                    'testimonial' => null,
                    'link' => route('offers') . '#pricing',
                ],
                [
                    'image' => null,
                    'thumbnail' => null,
                    'goal' => '+10 000€ de CA avec 20€/jour sur un produit à 35€',
                    'brand' => 'Labo 540',
                    'problem' => '0 stratégie créative, 0 méthode d\'acquisition',
                    'solution' => 'Création de la stratégie créative et mise en place des méthodes d\'acquisition avec un budget de 20€ par jour.',
                    'results' => [
                        '+10 000€ de CA généré',
                        'Produit vendu à 35€ avec 20€/jour de budget',
                        'Stratégie d\'acquisition construite de A à Z',
                    ],
                    'testimonial' => null,
                    'link' => route('offers') . '#pricing',
                ],
            ]
        ]);
    }
}
