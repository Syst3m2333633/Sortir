<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use App\Entity\Sortie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $campus = new Campus();
        $campus->setNom("Un campus de test");
        $manager->persist($campus);

        $sortie = new Sortie();
        $sortie->setCampus($campus);

        $manager->flush();
    }
}
