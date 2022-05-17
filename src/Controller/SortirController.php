<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("Sortir", name="sortir_")
 */
class SortirController extends AbstractController
{
    /**
     * @Route("", name="list")
     */
    public function list(): Response
    {
        //todo: aller chercher les sortie en BDD
        return $this->render('sortir/list.html.twig', [

        ]);
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(int $id): Response
    {
        //todo: aller chercher la sortie en BDD

        return $this->render('sortir/details.html.twig');
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request): Response
    {
        dump($request);
        return $this->render('sortir/create.html.twig');
    }
}
