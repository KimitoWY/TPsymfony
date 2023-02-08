<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil_index.html.twig')]
    public function indexAction(): Response
    {
        return $this->render('Accueil/accueil_index.html.twig');
    }
}
