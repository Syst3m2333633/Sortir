<?php

namespace App\Controller;


use App\Repository\ParticipantRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/user", name="participant_")
 */

class ParticipantController extends AbstractController
{
    // AFFICHAGE DES INFOS DE L'UTILISATEUR
    /**
     * @Route("/{id}", name="participant_infos")
     */
    public function infos (int $id, ParticipantRepository $ParticipantRepository): Response
    {
        $participant = $ParticipantRepository->find($id);
        return $this->render('main/profil.html.twig');
    }



    // MISE A JOUR DES INFOS DE L'UTILISATEUR
    /**
     * @Route("/mise_a_jour{id}", name="participant_infos")
     */
    public function infosMAJ (int $id, ParticipantRepository $ParticipantRepository): Response
    {
        $participant = $ParticipantRepository->find($id);
        return $this->render('main/profil.html.twig');
    }
}





