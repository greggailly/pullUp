<?php

namespace App\DataFixtures;

use App\Entity\Policy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $policy = new Policy();
        $policy->setLabel("Default Policy")
               ->setUpdate("0.0.*")
               ->setUpdateOffset("10m");

        $manager->persist($policy);

        $manager->flush();
    }
}
