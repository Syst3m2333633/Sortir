<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use App\Entity\Etat;
use App\Entity\Lieu;
use App\Entity\Participant;
use App\Entity\Sortie;
use App\Entity\Ville;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;



class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        //CAMPUS
        $campus = new Campus();
        $campus->setNom("Rennes");
        $manager->persist($campus);
        $manager->flush();


        //ETAT
        $etat = new Etat();
        $etat->setLibelle("chaud");
        $manager->persist($campus);
        $manager->flush();


        //VILLE
        $ville = new Ville();
        $ville->setNom("Langres");
        $ville->setCodePostal("88000");
        $manager->persist($ville);
        $manager->flush();


        //LIEU
        $lieu = new Lieu();
        $lieu->setNom("Chez Momo");
        $lieu->setRue("Rue des hirondelles");
        $lieu->setVille($ville);
        $lieu->setLatitude("58.336");
        $lieu->setLongitude("98.874");
        $manager->persist($lieu);
        $manager->flush();


        //PARTICIPANT
        $participant = new Participant();
        $participant->setNom("Chichester");
        $participant->setCampus($campus);
        $participant->setAdministrateur("TRUE");
        $participant->setConfirmation("test");
        $participant->setPassword("test");
        $participant->setTelephone("0235658987");
        $participant->setRoles(["ADMIN"]);
        $participant->setEmail("patrice@sf2.fr");
        $participant->setPrenom("Patrice");
        $participant->setIdentifiant("zangief");
        $participant->setActif("true");
        $manager->persist($participant);
        $manager->flush();


        //SORTIE
        $sortie = new Sortie();
        $sortie->setNom("tournoi de Tekken");
        $sortie->setCampus($campus);
        $sortie->setDateHeureDebut(DateTime::createFromFormat('Y-m-d H:i:s', "2022-07-10 13.00.00"));
        $sortie->setDateLimiteInscription(DateTime::createFromFormat('Y-m-d H:i:s', "2022-07-09 18.00.00"));
        $sortie->setDuree("5");
        $sortie->setEtat("En cours");
        $sortie->setIdSortie("tek");
        $sortie->setInfosSortie("du game");
        $sortie->setLieu($lieu);
        $sortie->setNbInscriptionsMax("25");
        $sortie->setParticipant($participant);
        $sortie->setStatut("01");
        $manager->persist($sortie);
        $manager->flush();




    }
}
