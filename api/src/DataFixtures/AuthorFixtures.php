<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Author;
use Faker;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 30; $i++) {
            $author = new Author();
            $author->setLastname($faker->lastname);
            $author->setFirstname($faker->firstname);
            $author->setAge($faker->numberBetween(20,80));
            $manager->persist($author);
        }

        $manager->flush();
    }
}
