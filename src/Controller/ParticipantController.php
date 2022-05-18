<?php

namespace App\Controller;

use App\Entity\Participants;
use App\Form\CreationUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/creation_user", name="participant_create")
     */
    public function create(Request $request): Response
    {
        $user = new Participants();
        $userForm = $this->createForm(CreationUserType::class, $user);
        $userForm->handleRequest($request);
        dump ($user);


        return $this->render('participant/creationUser.html.twig', [
            "userForm" => $userForm->createView()
        ]);
    }

    /**
     * @Route("/demo", name="main_demo")
     */
    public function demo(EntityManagerInterface $entityManager): Response
    {
        $user = new Participants();
        $user->setPseudo('Sagat');
        $user->setNom('Chichester');
        $user->setPrenom('Patrice');
        $user->setTelephone('0235478296');
        $user->setMail('chicha@sf.com');
        $user->setPassword('sagatnakmuay');
        $user->setConfirmation('');
        $user->setAdmin('true');
        $user->setActif('true');
        dump($user);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('main/test.html.twig');
    }
}


