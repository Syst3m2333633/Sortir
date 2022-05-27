<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;

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

    // CREER UNE NOUVELLE SORTIE
    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sortie = new Sortie();
        $sortieForm = $this->createForm(SortieType::class, $sortie);
        $sortieForm->handleRequest($request);

        if ($sortieForm->isSubmitted() && $sortieForm->isValid()) {
            $entityManager->persist($sortie);
            $entityManager->flush();
            $this->addFlash('success', 'Sortie Ajoutée!');
            return $this->redirectToRoute('sortir_details', [
                'id' => $sortie->getId()
            ]);
        }

        return $this->render('sortir/create.html.twig', [
            'sortieForm' => $sortieForm->createView()
        ]);
    }


    // LISTE DES SORTIES EXISTANTES
    /**
     * @Route("/sorties", name="list")
     */
    public function list(SortieRepository $sortieRepository): Response
    {
        //todo: aller chercher les sortie en BDD
        $sorties = $sortieRepository->findAll();

        return $this->render('sortir/list.html.twig', [
            "sorties" => $sorties
        ]);
    }


    // DETAIL D'UNE SORTIE
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

// SUPPRIMER UNE SORTIE
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Sortie $sortie, EntityManagerInterface $entityManager)
    {
        $entityManager->remove($sortie);
        $entityManager->flush();

        return $this->redirectToRoute('main_home');
    }
}
