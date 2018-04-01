<?php

// Get the WriteDown object, load providers
$writedown = new WriteDown\WriteDown(new League\Container\Container);
require __DIR__ . '/container.php';

// Load routes
include __DIR__ . '/../app/Http/routes.php';

return $writedown;
