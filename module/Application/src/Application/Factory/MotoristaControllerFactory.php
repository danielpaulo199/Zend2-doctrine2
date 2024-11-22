<?php

namespace Application\Factory;

use Psr\Container\ContainerInterface;
use Application\Service\VeiculoService;
use Application\Service\MotoristaService;
use Application\Controller\VeiculoController;

class MotoristaControllerFactory
{
    public function __invoke(ContainerInterface $DIcontainer)
    {
        $parentLocator = $DIcontainer->getServiceLocator();
        $motoristaService = $parentLocator->get(MotoristaService::class);
        $veiculoService = $parentLocator->get(VeiculoService::class);
        return new VeiculoController($motoristaService,$veiculoService);
    }
}