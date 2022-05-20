<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route ("/home", name="main_home")
     */
    public function home()
    {
       return $this->render('main/home.html.twig');
    }

    /**
     * @Route ("/test", name="main_test")
     */
    public function test()
    {
        return $this->render('main/test.html.twig');
    }

    /**
     * @Route ("/ville", name="main_ville")
     */
    public function ville()
    {
        return $this->render('main/ville.html.twig');
    }

    /**
     * @Route ("/campus", name="main_campus")
     */
    public function campus()
    {
        return $this->render('main/campus.html.twig');
    }

    /**
     * @Route ("/profil", name="main_profil")
     */
    public function profil()
    {
        return $this->render('main/profil.html.twig');
    }


}