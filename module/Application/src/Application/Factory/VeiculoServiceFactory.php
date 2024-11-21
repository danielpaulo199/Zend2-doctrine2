<?php

namespace Application\Factory;

use Psr\Container\ContainerInterface;
use Application\Service\VeiculoService;

class VeiculoServiceFactory
{
    public function __invoke(ContainerInterface $DIcontainer)
    {
        $entityManager = EntityManagerFactory::factory();
        return new VeiculoService($entityManager);
    }
}