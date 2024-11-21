<?php

namespace Application\Factory;

use Doctrine\ORM\{EntityManager, EntityManagerInterface, ORMException, Tools\Setup};

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws ORMException
     */
    public static function factory(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration([
            $rootDir . '/src'],
            true
        );

        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../data/banco.sqlite'
        ];

        return EntityManager::create($connection, $config);
    }
}
