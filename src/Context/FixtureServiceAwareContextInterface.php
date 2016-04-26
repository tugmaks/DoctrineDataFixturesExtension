<?php

namespace BehatExtension\DoctrineDataFixturesExtension\Context;

use BehatExtension\DoctrineDataFixturesExtension\Service\FixtureService;

/**
 * Interface FixtureServiceAwareContextInterface
 *
 * @package BehatExtension\DoctrineDataFixturesExtension\Context
 */
interface FixtureServiceAwareContextInterface
{
    /**
     * Set the FixtureService
     *
     * @param FixtureService $service
     * @return mixed
     */
    public function setFixtureService(FixtureService $service);
}
