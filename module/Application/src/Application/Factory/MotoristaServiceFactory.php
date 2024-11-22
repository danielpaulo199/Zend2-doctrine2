<?php

namespace Application\Factory;

use Psr\Container\ContainerInterface;
use Application\Service\MotoristaService;

class MotoristaServiceFactory
{
    public function __invoke(ContainerInterface $DIcontainer)
    {
        $entityManager = EntityManagerFactory::factory();
        return new MotoristaService($entityManager);
    }
}