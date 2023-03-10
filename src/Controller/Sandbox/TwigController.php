<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/sandbox/twig', name: 'sandbox_twig')]
class TwigController extends AbstractController
{
    #[Route('', name: '')]
    public function indexAction(): Response
    {
        return new Response('<body>Hello World !</body>');
    }
    #[Route('/vue1', '_vue1')]
    public function vue1Action() : Response
    {
        return $this->render('Sandbox/Twig/vue1.html.twig');
    }
    #[Route('/vue2', '_vue2')]
    public function vue2Action() : Response
    {
        return $this->render('Sandbox/Twig/vue2.html.twig');
    }

    #[Route('/vue3', '_vue3')]
    public function vue3Action() : Response
    {
        return $this->render('Sandbox/Twig/vue3.html.twig');
    }

    #[Route('/vue4', '_vue4')]
    public function vue4Action() : Response
    {
        return $this->render('Sandbox/Twig/vue4.html.twig');
    }

    public function palmaresAction(int $n) : Response
    {
        $products = [];
        for ($i = 1; $i <= $n; $i++){
            $products[] = ['nom' => 'product' . $i, 'prix' => 1000 - $i];
        }
        return $this->render('Sandbox/Layouts/palmares.html.twig', ['products' => $products]);
    }

    #[Route('/vue5', name: '_vue5')]
    public function vue5Action(): Response
    {
        return $this->render('Sandbox/Twig/vue5.html.twig');
    }

    #[Route('/vue6', name: '_vue6')]
    public function vue6Action(): Response
    {
        $tab = array (
            'mentions' => array(                       // tableau des mentions   -> $tab['mentions']
                'Info' => array(                     //     mention Info       -> $tab['mentions']['Info']
                    'nom' => 'Informatique',       //         nom            -> $tab['mentions']['Info']['nom']
                    'parcours' => array(           //         parcours       -> $tab['mentions']['Info']['parcours']
                        'Informatique',          //             1er        -> $tab['mentions']['Info']['parcours'][0]
                        'Image',                 //             2me        -> $tab['mentions']['Info']['parcours'][1]
                    ),                          //
                    'responsable' => 'XS',         //         responsable    -> $tab['mentions']['Info']['responsable']
                ),
                'PC' => array(                       //     mention  PC        -> $tab['mentions']['PC']
                    'nom' => 'Physique-Chimie',    //         ...
                    'parcours' => array(
                        'Physique',
                        'Chimie min??rale',
                    ),
                    'responsable' => 'GA',
                ),
                'Bio' => array(                      //     mention  Bio       -> $tab['mentions']['Bio']
                    'nom' => 'Biologie',
                    'parcours' => array(
                        'G??ologie',
                        'Biologie v??g??tale',
                        'Biologie animale',
                    ),
                    'responsable' => 'MN',
                ),
            ),
            'ues' => array(                            // tableau des UEs        -> $tab['ues']
                array(                               //     1re UE             -> $tab['ues'][0]
                    'nom' => 'Algo 1',             //         nom            -> $tab['ues'][0]['nom']
                    'volume' => 54,                //         volume         -> $tab['ues'][0]['volume']
                ),
                array(                               //     2me UE             -> $tab['ues'][1]
                    'nom' => 'Maths discr??tes',    //         ...
                    'volume' => 40,
                ),
                array(                               //     3me UE             -> $tab['ues'][2]
                    'nom' => 'Anglais S1',
                    'volume' => 20,
                ),
                array(                               //     4me UE             -> $tab['ues'][3]
                    'nom' => 'Anglais S2',
                    'volume' => 20,
                ),
                array(                               //     5me UE             -> $tab['ues'][4]
                    'nom' => 'Projet',
                    'volume' => 70,
                ),
            ),
        );
        $args = array(
          'prenom' => "Th??o",
          'mail' => "th.berroyer@gmail.com",
          'offre' => $tab
        );
        return $this->render('Sandbox/Twig/vue6.html.twig', $args);
    }

}
