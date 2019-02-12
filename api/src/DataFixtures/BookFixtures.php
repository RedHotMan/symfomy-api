<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Book;
use Faker;

class BookFixtures extends Fixture implements DependentFixtureInterface
{
  public function load(ObjectManager $manager)
  {
      $faker = Faker\Factory::create('fr_FR');
      $authors = $manager->getRepository('App:Author')->findAll();
      for ($i = 0; $i < 30; $i++) {
        $book = new Book();
        $book->setReference($faker->word);
        $book->setDescription($faker->text);
        $book->setAuthor($authors[rand (0, count($authors)-1)]);
        $book->setName($faker->word);
        $book->setPublicationDate($faker->dateTime('now',null));
        $manager->persist($book);
      }
      $manager->flush();
  }

  public function getDependencies()
    {
        return array(
            AuthorFixtures::class,
        );
    }
}