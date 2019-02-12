<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Borrower;
use Faker;

class BorrowerFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    $faker = Faker\Factory::create('fr_FR');
    for ($i = 0; $i < 10; $i++)
    {
      $borrower = new Borrower();
      $borrower->setLastname($faker->lastname);
      $borrower->setFirstname($faker->firstname);
      $borrower->setPhone($faker->phoneNumber);
      $borrower->setEmail($faker->email);
      $borrower->setAddress($faker->address);
      $manager->persist($borrower);
    }

    $manager->flush();
  }
}
