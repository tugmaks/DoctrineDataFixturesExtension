<?php
namespace BehatExtension\DoctrineDataFixturesExtension\Bundle\CompilerPass;

use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class DoctrineFixturesLoaderPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if($container->has('doctrine.fixtures.loader')) {
            $container->setAlias('doctrine.fixtures.loader.alias', new Alias('doctrine.fixtures.loader', true));
        }
    }
}
