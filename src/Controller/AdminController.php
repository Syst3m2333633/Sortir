<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Entity\Sortie;
use App\Form\CreationUserType;
use App\Form\RegistrationFormType;
use App\Form\SortieType;
use App\Security\AppAuthentificator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;


/**
 * @Route("/admin", name="admin_")
 */

class AdminController extends AbstractController
{
    /**
     * @Route ("/ville", name="ville")
     */
    public function ville()
    {
        return $this->render('main/ville.html.twig');
    }

    /**
     * @Route ("/campus", name="campus")
     */
    public function campus()
    {
        return $this->render('main/campus.html.twig');
    }

    // ENREGISTREMENT D'UN NOUVEL UTILISATEUR
    /**
     * @Route("/register", name="register")
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

    /**
     * @Route("/create", name="admin_create")
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



}
