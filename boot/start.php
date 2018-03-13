<?php

// Get the WriteDown object
$writedown = new WriteDown\WriteDown;

// Set-up bits and bobs
require __DIR__ . '/container.php';
require __DIR__ . '/routes.php';

return $writedown;
