<?php

namespace App\Controller;

use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user", name="main_")
 */

class MainController extends AbstractController
{
    /**
     * @Route ("/home", name="home")
     */
    public function home(SortieRepository $sortieRepository): Response
    {
        $sorties = $sortieRepository->findAll();
       return $this->render('main/home.html.twig',[
        "sorties" => $sorties
    ]);

    }


    /**
     * @Route ("/profil", name="profil")
     */
    public function profil()
    {
        return $this->render('main/profil.html.twig');
    }


}