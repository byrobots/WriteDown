<?php

// Include WriteDown's dependencies
require_once __DIR__ . '/../vendor/autoload.php';

// Set WriteDown's path
putenv('ROOT_PATH=' . realpath(__DIR__ . '/..'));

// Load the environment variables
// When testing environment variables are specified in phpunit.xml.
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// Get the WriteDown object, load providers
$writedown = new ByRobots\WriteDown\WriteDown(new League\Container\Container);
require __DIR__ . '/container.php';

// Initialise some middleware
$csrfMiddleware = [new \ByRobots\WriteDown\HTTP\Middleware\CSRFMiddleware($writedown->csrf()), 'validate'];
$authMiddleware = [new \ByRobots\WriteDown\HTTP\Middleware\AuthenticatedMiddleware(
    $writedown->auth(),
    $writedown->session()
), 'validate'];

// Load routes
include __DIR__ . '/../app/Http/routes.php';

// Continue on our way
return $writedown;
