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
        $campus->setNom("Strasbourg");
        $manager->persist($campus);

        //ETAT
        $etat = new Etat();
        $etat->setLibelle("bouillant");
        $manager->persist($etat);

        //VILLE
        $ville = new Ville();
        $ville->setNom("Schiltigeim");
        $ville->setCodePostal("67000");
        $manager->persist($ville);

        //LIEU
        $lieu = new Lieu();
        $lieu->setNom("Chez Bébert");
        $lieu->setRue("Rue des pinsons");
        $lieu->setVille($ville);
        $lieu->setLatitude("87.965");
        $lieu->setLongitude("17.852");
        $manager->persist($lieu);

        //PARTICIPANT
        $participant = new Participant();
        $participant->setNom("Trogluglu");
        $participant->setCampus($campus);
        $participant->setAdministrateur("true");
        $participant->setPassword(password_hash('test', PASSWORD_BCRYPT));
        $participant->setTelephone("0235658987");
        $participant->setRoles(["ROLE_USER"]);
        $participant->setEmail("arash@sf2.fr");
        $participant->setPrenom("Arash");
        $participant->setIdentifiant("honda");
        $participant->setActif("true");
        $manager->persist($participant);

        //SORTIE
        $sortie = new Sortie();
        $sortie->setNom("concours de mangeur de burgers");
        $sortie->setCampus($campus);
        $sortie->setDateHeureDebut(new DateTime());
        $sortie->setDateLimiteInscription(new DateTime());
        $sortie->setDuree("5");
        $sortie->setEtat("En cours");
        $sortie->setIdSortie("tar");
        $sortie->setInfosSortie("du gras");
        $sortie->setLieu($lieu);
        $sortie->setNbInscriptionsMax("25");
        $sortie->setParticipant($participant);
        $sortie->setStatut($etat);
        $manager->persist($sortie);

//*************************2e ENTREE****************************************************************************

                //CAMPUS
                $campus = new Campus();
                $campus->setNom("Rennes");
                $manager->persist($campus);

                //ETAT
                $etat = new Etat();
                $etat->setLibelle("chaud");
                $manager->persist($etat);

                //VILLE
                $ville = new Ville();
                $ville->setNom("Langres");
                $ville->setCodePostal("88000");
                $manager->persist($ville);

                //LIEU
                $lieu = new Lieu();
                $lieu->setNom("Chez Momo");
                $lieu->setRue("Rue des hirondelles");
                $lieu->setVille($ville);
                $lieu->setLatitude("58.336");
                $lieu->setLongitude("98.874");
                $manager->persist($lieu);

                //PARTICIPANT
                $participant = new Participant();
                $participant->setNom("Chichester");
                $participant->setCampus($campus);
                $participant->setAdministrateur("TRUE");
                $participant->setPassword(password_hash('test', PASSWORD_BCRYPT));
                $participant->setTelephone("0235658987");
                $participant->setRoles(["ROLE_ADMIN"]);
                $participant->setEmail("patrice@sf2.fr");
                $participant->setPrenom("Patrice");
                $participant->setIdentifiant("zangief");
                $participant->setActif("true");
                $manager->persist($participant);

                //SORTIE
                $sortie = new Sortie();
                $sortie->setNom("tournoi de Tekken");
                $sortie->setCampus($campus);
                $sortie->setDateHeureDebut(new DateTime());
                $sortie->setDateLimiteInscription(new DateTime());
                $sortie->setDuree("5");
                $sortie->setEtat("En cours");
                $sortie->setIdSortie("tek");
                $sortie->setInfosSortie("du game");
                $sortie->setLieu($lieu);
                $sortie->setNbInscriptionsMax("25");
                $sortie->setParticipant($participant);
                $sortie->setStatut($etat);
                $manager->persist($sortie);

//************************* 3E ENTREE **********************************************************

                //CAMPUS
                $campus = new Campus();
                $campus->setNom("Toulouse");
                $manager->persist($campus);

                //ETAT
                $etat = new Etat();
                $etat->setLibelle("tiede");
                $manager->persist($etat);

                //VILLE
                $ville = new Ville();
                $ville->setNom("Mazamet");
                $ville->setCodePostal("87000");
                $manager->persist($ville);

                //LIEU
                $lieu = new Lieu();
                $lieu->setNom("Chez Riton");
                $lieu->setRue("Rue des moineaux");
                $lieu->setVille($ville);
                $lieu->setLatitude("28.336");
                $lieu->setLongitude("99.874");
                $manager->persist($lieu);

                //PARTICIPANT
                $participant = new Participant();
                $participant->setNom("Sacrepeye");
                $participant->setCampus($campus);
                $participant->setAdministrateur("false");
                $participant->setPassword(password_hash('test', PASSWORD_BCRYPT));
                $participant->setTelephone("0235658987");
                $participant->setRoles(["ROLE_USER"]);
                $participant->setEmail("sacrepeye@sf2.fr");
                $participant->setPrenom("Henri");
                $participant->setIdentifiant("balrog");
                $participant->setActif("true");
                $manager->persist($participant);

                //SORTIE
                $sortie = new Sortie();
                $sortie->setNom("belote");
                $sortie->setCampus($campus);
                $sortie->setDateHeureDebut(new DateTime());
                $sortie->setDateLimiteInscription(new DateTime());
                $sortie->setDuree("5");
                $sortie->setEtat("En cours");
                $sortie->setIdSortie("bel");
                $sortie->setInfosSortie("encore du game");
                $sortie->setLieu($lieu);
                $sortie->setNbInscriptionsMax("25");
                $sortie->setParticipant($participant);
                $sortie->setStatut($etat);
                $manager->persist($sortie);

                $manager->flush();
            }
        }

