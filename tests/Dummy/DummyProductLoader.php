<?php

declare(strict_types=1);

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2016-2018 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace BehatExtension\DoctrineDataFixturesExtension\Tests\Dummy;

use BehatExtension\DoctrineDataFixturesExtension\Tests\DemoBundle\Entity\Product;
use BehatExtension\DoctrineDataFixturesExtension\Tests\DemoBundle\Entity\ProductManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DummyProductLoader extends Fixture implements ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        /** @var ProductManager $service */
        $service = $this->container->get(ProductManager::class);

        array_map(function (array $item) use ($service) {
            $product = new Product(
                $item['name'],
                $item['description']
            );
            $service->create($product);
        }, $this->getData());
    }

    private function getData(): array
    {
        return [
            [
                'name'        => 'Product #11',
                'description' => 'This is the product number 11',
            ],
            [
                'name'        => 'Product #12',
                'description' => 'This is the product number 12',
            ],
        ];
    }
}
