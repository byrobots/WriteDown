<?php

// Include WriteDown's dependencies
require_once __DIR__ . '/../vendor/autoload.php';

// Load the environment variables
// When testing environment variables are specified in phpunit.xml.
if (getenv('ENVIRONMENT') !== 'testing') {
    $dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
    $dotenv->load();
}

// Get the WriteDown object, load providers
$writedown = new WriteDown\WriteDown(new League\Container\Container);
require __DIR__ . '/container.php';

// Initialise some middleware
$csrfMiddleware = [new \WriteDown\HTTP\Middleware\CSRFMiddleware($writedown->csrf()), 'validate'];
$authMiddleware = [new \WriteDown\HTTP\Middleware\AuthenticatedMiddleware(
    $writedown->auth(),
    $writedown->session()
), 'validate'];

// Load routes
include __DIR__ . '/../app/Http/routes.php';

// Continue on our way
return $writedown;
