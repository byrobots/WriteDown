<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require __DIR__ . '/boot/start.php';
return ConsoleRunner::createHelperSet($writedown->database());
