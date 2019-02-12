<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\CopyBook;
use Faker;

class CopyBookFixtures extends Fixture implements DependentFixtureInterface
{
  public function load(ObjectManager $manager)
  {
    $faker = Faker\Factory::create('fr_FR');
    $books = $manager->getRepository('App:Book')->findAll();
    for ($z = 0; $z < (count($books) - 1); $z++) 
    {
      for ($i = 0; $i < 5; $i++)
      {
        $copyBook = new CopyBook();
        $copyBook->setCopyBookNumber($faker->numberBetween(1,10));
        $copyBook->setBook($books[$z]);
        $manager->persist($copyBook);
      }
    } 
    $manager->flush();
  } 

  public function getDependencies()
  {
    return array(
      BookFixtures::class,
    );
  }
}
