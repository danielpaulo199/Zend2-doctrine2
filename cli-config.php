<?php

use Application\Factory\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
// require_once 'bootstrap.php';
require_once __DIR__ . '/init_autoloader.php';

$entityManager = EntityManagerFactory::factory();

return ConsoleRunner::createHelperSet($entityManager);

// execute no terminal os comandos vendor\bin\doctrine.bat
// vendor\bin\doctrine list
// vendor\bin\doctrine.bat orm:info
// vendor\bin\doctrine.bat orm:mapping:describe Curso
// entityName Curso
// CRIAR TABELAS MAPEADAS DAS CLASSES
// vendor\bin\doctrine.bat orm:schema-tool:create
