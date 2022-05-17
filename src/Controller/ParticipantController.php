<?php

namespace App\Controller;

use App\Entity\Participants;
use App\Form\CreationUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/creation_user", name="participant_create")
     */
    public function create(): Response
    {
        $user = new Participants();
        $userForm = $this->createForm(CreationUserType::class, $user);
        return $this->render('participant/creationUser.html.twig', [
            "userForm" => $userForm->createView()
        ]);
    }
}


