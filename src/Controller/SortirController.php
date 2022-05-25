<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use App\Repository\ParticipantRepository;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user", name="sortir_")
 */
class SortirController extends AbstractController
{
    /**
     * @Route("/sorties", name="list")
     */
    public function list(SortieRepository $sortieRepository): Response
    {
        //todo: aller chercher les sortie en BDD
        $sortie = $sortieRepository->findAll();

        return $this->render('sortir/list.html.twig', [
            "sortie" => $sortie
        ]);
    }

    /**
     * @Route("/sorties/details/{id}", name="details")
     */
    public function details(int $id, SortieRepository $sortieRepository): Response
    {
        // Aller chercher la sortie en BDD
        $sortie = $sortieRepository->find($id);

        //dd($sortie);//sortie avec les champs complet
        //Boucle pour remonter les participants
        
        //dd($sortie);//sortie avec les champs complet
        return $this->render('sortir/details.html.twig', [
            "sortie" => $sortie
        ]);
    }




    /**
     * @Route("/delete/{id}", name="delete")
     */
    /**
    public function delete(Sortie $sortie, EntityManagerInterface $entityManager)
    {
        $entityManager->remove($sortie);
        $entityManager->flush();

        return $this->redirectToRoute('main_home');
    }*/
}
