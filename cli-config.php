<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once 'boot/start.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = $writedown->getContainer()->get('db');

return ConsoleRunner::createHelperSet($entityManager);
