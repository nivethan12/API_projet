<?php

namespace App\DataFixtures;

use App\Entity\Film;
use App\Entity\Platform;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 5; $i++) {
            $platform = new Platform();
            $platform->setName($faker->word);
            $manager->persist($platform);
        }

        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword($faker->password);
            $manager->persist($user);
        }

        for ($i = 0; $i < 20; $i++) {
            $film = new Film();
            $film->setTitle($faker->words(3, true));
        }

        $manager->flush();
    }
}
