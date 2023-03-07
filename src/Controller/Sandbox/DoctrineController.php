<?php

namespace App\Controller\Sandbox;

use App\Entity\Sandbox\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sandbox/doctrine', name: 'sandbox_doctrine')]
class DoctrineController extends AbstractController
{

    #[Route('/list', name: '_list')]
    public function listAction(EntityManagerInterface $em): Response
    {
        $filmRepository = $em->getRepository(Film::class);
        $films = $filmRepository->findAll();
        $args = array('films' => $films);
        return $this->render('Sandbox/Doctrine/list.html.twig', $args);
    }

    #[Route('/view/{id}', name: '_view')]
    public function viewAction(int $id): Response
    {
        return $this->render('Sandbox/Doctrine/view.html.twig');
    }

    #[Route('/delete/{id}', name: '_delete')]
    public function deleteAction(int $id): Response
    {
        return $this->redirectToRoute('sandbox_doctrine_list');
    }

    #[Route('/ajouterendur', name: '_ajouterendur')]
    public function ajouterEnDurAction(EntityManagerInterface $em): Response
    {
        $film = new Film();
        $film
            ->setTitre('Le grand bleu')
            ->setAnnee(1988)
            ->setEnstock(true)
            ->setPrix(9.99)
            ->setQuantite(88);
        dump($film);

        $em->persist($film);
        $em->flush();
        dump($film);

        return $this->redirectToRoute('sandbox_doctrine_view', ['id' => $film->getId()]);
    }

    #[Route('/modifierendur', name: '_modifierendur')]
    public function modifierEnDurAction(EntityManagerInterface $em): Response
    {
        $id = 6;
        $filmRepository = $em->getRepository(Film::class);
        $film = $filmRepository->find($id);

        if (! is_null($film)){
            $film
                ->setPrix(15.98)
                ->setQuantite($film->getQuantite() + 10);
        }

        $em->flush();

        return $this->redirectToRoute('sandbox_doctrine_view', ['id' => $film->getId()]);
    }

    #[Route('/effacerendur', name: '_effacerendur')]
    public function effacerEnDurAction(EntityManagerInterface $em): Response
    {
        $id = 7;
        $filmRepository = $em->getRepository(Film::class);
        $film = $filmRepository->find($id);

        if (! is_null($film)){
            $em->remove($film);
        }

        $em->flush();

        return $this->redirectToRoute('sandbox_doctrine_list');
    }
}
