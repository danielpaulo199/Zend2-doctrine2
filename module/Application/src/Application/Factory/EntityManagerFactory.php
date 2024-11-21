<?php

namespace Application\Factory;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

class EntityManagerFactory
{
    public static function factory()
    {
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/db.sqlite',
        );

        return EntityManager::create($conn, $config);
    }
}