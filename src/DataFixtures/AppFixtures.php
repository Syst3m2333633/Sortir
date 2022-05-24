<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use App\Entity\Etat;
use App\Entity\Lieu;
use App\Entity\Participant;
use App\Entity\Sortie;
use App\Entity\Ville;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //CAMPUS
        $campus = new Campus();
        $campus->setNom("Un campus de test");

        $manager->persist($campus);

        $sortie = new Sortie();
        $sortie->setCampus($campus);

        $manager->flush();

        //PARTICIPANT
        $participant = new Participant();
        $participant->setIdentifiant("gdlj44");
        $participant->setNom("Delajungle");
        $participant->setPrenom("George");
        $participant->setTelephone("0102030405");
        $participant->setEmail("g@dlj.fr");
        $participant->setPassword("test1234");
        $participant->setConfirmation("test1234");
        $participant->setAdministrateur(false);
        $participant->setActif(true);

        $manager->persist($participant);

        $sortie = new Sortie();
        $sortie->setParticipant($participant);

        $manager->flush();

        //ETAT
        $etat = new Etat();
        $etat->setLibelle("Créée");

        $manager->persist($etat);

        $sortie = new Sortie();
        $sortie->setEtat($etat);

        $manager->flush();

        //LIEU
        $lieu = new Lieu();
        $lieu->setNom("Tour Eiffel");
        $lieu->setRue("Boulevard de la république");
        $lieu->setLatitude(48.51);
        $lieu->setLongitude(2.17);

        $manager->persist($lieu);

        $sortie = new Sortie();
        $sortie->setLieu($lieu);

        $manager->flush();

        //VILLE
        $ville = new Ville();
        $ville->setNom("Paris");
        $ville->setCodePostal(75000);

        $manager->persist($ville);

        $sortie = new Sortie();
        $sortie->setVille($ville);

        $manager->flush();

        //Sortie
        $sortie = new Sortie();
        $sortie->setNom("Eiffel");
        $sortie->setDateHeureDebut("31/08/2022");
        $sortie->setDuree(5);
        $sortie->setDateLimiteInscription("21/08/2022");
        $sortie->setNbInscriptionsMax(50);
        $sortie->setInfosSortie("blablabla");
        $sortie->setEtat("Créée");

        $manager->persist($sortie);

        $sortie = new Sortie();
        $sortie->setSortie($sortie);

        $manager->flush();

    }
}
