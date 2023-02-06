<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OverviewController extends AbstractController
{
    #[Route('/sandbox/overview', name: 'sandbox_overview')]
    public function indexAction(): Response
    {
        return new Response('<body>Hello World !</body>');
    }

    #[Route('/sandbox/overview/hello2', name: 'sandbox_overview_hello2')]
    public function hello2Action(): Response
    {
        return $this->render('Sandbox/Overview/hello2.html.twig');
    }

    #[Route('/sandbox/overview/hello3', name: 'sandbox_overview_hello3')]
    public function hello3Action(): Response
    {
        $args = array(
            'prenom' => 'Théo',
            'jeux' => ['Osu!', 'Crypt of the Necrodancer', 'Rhythm Sprout', 'A Dance of Fire and Ice'],
        );

        return $this->render('Sandbox/Overview/hello3.html.twig', $args);
    }

    #[Route('/sandbox/overview/hello4', name: 'sandbox_overview_hello4')]
    public function hello4Action(): Response
    {
        $args = array(
            'prenom' => 'Théo',
            'jeux' => ['Xenoblade Chronicles', 'Xenoblade Chronicles 2', 'Xenoblade Chronicles 3'],
        );

        return $this->render('Sandbox/Overview/hello4.html.twig', $args);
    }
}
