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
use Symfony\Contracts\Translation\TranslatorInterface;


class AdminController extends AbstractController
{
    // ENREGISTREMENT D'UN NOUVEL UTILISATEUR
    /**
     * @Route("/register", name="admin_register")
     * @param Request $request
     * @param UserPasswordHasherInterface $userPasswordHasher
     * @param UserAuthenticatorInterface $userAuthenticator
     * @param AppAuthentificator $authenticator
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppAuthentificator $authenticator, EntityManagerInterface $entityManager) : Response
    {
        $user = new Participant();

        $userForm = $this->createForm(RegistrationFormType::class, $user);
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $userForm->get('plainPassword')->getData()
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
            'registrationForm' => $userForm->createView(),
        ]);
    }



// HYDRATATION DE DONNEES
    /**
     * @Route("/insertData", name="app_register")
     */

        public function insertData (EntityManagerInterface $entityManager) {

        $user = new Participant();
        $user->setIdentifiant("krs");
        $user->setRoles(["ROLE_USER"]);
        $user->setNom("Guile");
        $user->setPrenom("William");
        $user->setTelephone("0235448511");
        $user->setEmail("guile@sf2.fr");
        $user->setPassword("krstest");
        $user->setConfirmation("krstest");
        $user->setAdministrateur("false");

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render("main/home.html.twig");
    }

}
