<?php

namespace Application\Factory;

use Psr\Container\ContainerInterface;
use Application\Service\VeiculoService;
use Application\Controller\VeiculoController;

class VeiculoControllerFactory
{
    public function __invoke(ContainerInterface $DIcontainer)
    {
        $parentLocator = $DIcontainer->getServiceLocator();
        $vehicleService = $parentLocator->get(VeiculoService::class);
        return new VeiculoController($vehicleService);
    }
}