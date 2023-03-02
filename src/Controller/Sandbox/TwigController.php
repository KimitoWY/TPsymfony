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
    public function vue1() : Response
    {
        return $this->render('Sandbox/Twig/vue1.html.twig');
    }
    #[Route('/vue2', '_vue2')]
    public function vue2() : Response
    {
        return $this->render('Sandbox/Twig/vue2.html.twig');
    }

    #[Route('/vue3', '_vue3')]
    public function vue3() : Response
    {
        return $this->render('Sandbox/Twig/vue3.html.twig');
    }
}
