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

namespace BehatExtension\DoctrineDataFixturesExtension\Tests\DemoBundle\Features\Context;

use Behat\Behat\Context\Context;
use BehatExtension\DoctrineDataFixturesExtension\Tests\DemoBundle\Entity\ProductManager;
use Symfony\Component\HttpKernel\KernelInterface;

class FixtureContext implements Context
{
    /** @var KernelInterface */
    private $kernel;

    /**
     * @var null|array
     */
    private $lines;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @When I list lines in the entity table
     */
    public function iListLinesInTheEntityTable()
    {
        $this->lines = $this->kernel->getContainer()->get(ProductManager::class)->all();
    }

    /**
     * @Then I should see :count records
     */
    public function iShouldSeeRecords(int $count)
    {
        if (null === $this->lines || empty($this->lines)) {
            throw new \RuntimeException('There is no record.');
        }
        if (count($this->lines) !== $count) {
            throw new \RuntimeException(sprintf('%d records expected. Found %d.', $count, count($this->lines)));
        }
    }
}
