<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\CreationUserType;
use App\Form\RegistrationFormType;
use App\Security\AppAuthentificator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppAuthentificator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new Participant();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('participant/creationParticipant.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/demoUser", name="main_demoUser")
     */
    public function demo(EntityManagerInterface $entityManager): Response
    {
        $user = new Participant();
        $user->setIdentifiant('Sagat');
        $user->setPassword('sagatnakmuay');
        /*$user->setAdmin('true');
        $user->setActif('true');*/
        dump($user);
        $entityManager->persist($user);
        $entityManager->flush();
        dump($user);

        return $this->render('main/test.html.twig');
    }
    /**
     * @Route("/creation_user", name="participant_create")
     */
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new Participant();
        dump($user);
        $userForm = $this->createForm(CreationUserType::class, $user);
        $userForm->handleRequest($request);
        dump($user);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success', 'Sortie Ajoutée!');
            return $this->redirectToRoute('main_home', [
                'id' => $participant->getId()
            ]);
        }

        return $this->render('participant/creationParticipant.twig', [
            "userForm" => $userForm->createView()


        ]);
    }

    /**
     * @Route("/demo", name="main_demo")
     */
    public function insertionDemo(EntityManagerInterface $entityManager): Response
    {
        $user = new Participant();
        $user->setIdentifiant('Blanka');
        $user->setNom('Blanka');
        $user->setPrenom('Charlie');
        $user->setTelephone('0448787896');
        $user->setEmail()('edf@sf.com');
        $user->setPassword('bg');
        $user->setConfirmation('');
        $user->setAdministrateur('true');
        $user->setActif('true');
        dump($user);
        $entityManager->persist($user);
        $entityManager->flush();
        dump($user);

        return $this->render('main/test.html.twig');
    }
}


