<?php

// Get the WriteDown object
$writedown = new WriteDown\WriteDown(new League\Container\Container);

// Set-up bits and bobs
require __DIR__ . '/container.php';

// Load all route files.
foreach (glob(__DIR__ . '/../routes/*.php') as $filename) {
    include $filename;
}

return $writedown;
