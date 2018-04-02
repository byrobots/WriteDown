<?php

// Get the WriteDown object, load providers
$writedown = new WriteDown\WriteDown(new League\Container\Container);
require __DIR__ . '/container.php';

// Initialise some middleware
$csrfMiddleware = [new \WriteDown\HTTP\Middleware\CSRFMiddleware(
    $writedown->getContainer()->get('WriteDown\CSRF\CSRFInterface')
), 'validate'];

// Load routes
include __DIR__ . '/../app/Http/routes.php';

return $writedown;
