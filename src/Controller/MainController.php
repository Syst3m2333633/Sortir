<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user", name="main_")
 */

class MainController extends AbstractController
{
    /**
     * @Route ("/home", name="home")
     */
    public function home()
    {
       return $this->render('main/home.html.twig');
    }

    /**
     * @Route ("/test", name="test")
     */
    public function test()
    {
        return $this->render('main/test.html.twig');
    }

    /**
     * @Route ("/profil", name="profil")
     */
    public function profil()
    {
        return $this->render('main/profil.html.twig');
    }

}