<?php

namespace BehatExtension\DoctrineDataFixturesExtension\Context;

use BehatExtension\DoctrineDataFixturesExtension\Service\FixtureService;

/**
 * Class ReferenceDictionary
 *
 * @package BehatExtension\DoctrineDataFixturesExtension\Context
 */
trait ReferenceDictionary
{
    /**
     * @var FixtureService
     */
    private $fixtureService;

    /**
     * Sets the Reference Repository
     *
     * @param FixtureService $service
     */
    public function setFixtureService(FixtureService $service)
    {
        $this->fixtureService = $service;
    }

    /**
     * Returns the Reference Repository
     *
     * @return FixtureService
     */
    public function getFixtureService()
    {
        return $this->fixtureService;
    }

    /**
     * Takes a reference string and returns the entity created in fixtures
     *
     * @param string $reference
     * @return object
     */
    public function getReference($reference)
    {
        return $this->fixtureService->getReferenceRepository()->getReference($reference);
    }

    /**
     * Checks if the reference is known to the Repository
     *
     * @param string $reference
     * @return object
     */
    public function hasReference($reference)
    {
        return $this->fixtureService->getReferenceRepository()->hasReference($reference);
    }
}
