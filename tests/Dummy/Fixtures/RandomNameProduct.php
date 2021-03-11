<?php

declare(strict_types=1);


namespace BehatExtension\DoctrineDataFixturesExtension\Tests\Dummy\Fixtures;

use BehatExtension\DoctrineDataFixturesExtension\Tests\DemoBundle\Entity\Product;
use BehatExtension\DoctrineDataFixturesExtension\Tests\DemoBundle\Entity\ProductManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RandomNameProduct extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Product(
          (string)random_int(1,999999),
          'Random?'
        );
        $manager->persist($product);
        $manager->flush();
    }
}
