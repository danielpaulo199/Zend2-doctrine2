<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$paths = array("module/Application/src/Application/Entity");
$isDevMode = true;

$dbParams = array(
    'driver' => 'pdo_sqlite',
    'path'   => 'data/banco.sqlite',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$entityManager = EntityManager::create($dbParams, $config);

try {
    $schemaTool = new \Doctrine\ORM\Tools\SchemaTool($entityManager);
    $metadatas = $entityManager->getMetadataFactory()->getAllMetadata();

    // Gera o banco de dados e as tabelas
    if (!empty($metadatas)) {
        $schemaTool->createSchema($metadatas);
        echo "Banco de dados e tabelas criados com sucesso!";
    } else {
        echo "Nenhuma entidade encontrada para gerar as tabelas.";
    }
} catch (Exception $e) {
    echo "Erro ao criar o banco de dados: " . $e->getMessage();
}