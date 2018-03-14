<?php

// Get the WriteDown object
$writedown = new WriteDown\WriteDown(new League\Container\Container);

// Set-up bits and bobs
require __DIR__ . '/container.php';
require __DIR__ . '/routes.php';

return $writedown;
