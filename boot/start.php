<?php

// Include WriteDown's dependencies
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/global.php';

// Set WriteDown's path
putenv('ROOT_PATH=' . realpath(__DIR__ . '/../'));

// Load the environment variables.
// When testing environment variables are specified in phpunit.xml.
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// Get the WriteDown object and load providers.
$writedown = writedown();
require __DIR__ . '/container.php';

// Initialise some middleware.
$apiCsrfMiddleware = [
    new \App\HTTP\Middleware\ApiCsrfMiddleware($writedown->getService('csrf')),
    'validate',
];

$csrfMiddleware = [
    new \ByRobots\WriteDown\HTTP\Middleware\CSRFMiddleware($writedown->getService('csrf')),
    'validate',
];

$authMiddleware = [
    new \ByRobots\WriteDown\HTTP\Middleware\AuthenticatedMiddleware(
        $writedown->getService('auth'),
        $writedown->getService('session')
    ),
    'validate',
];

// Load routes and crack on.
include __DIR__ . '/../app/Http/routes.php';
return $writedown;
