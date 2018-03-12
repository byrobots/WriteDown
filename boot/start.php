<?php

// Get the WriteDown object
$writedown = new WriteDown\WriteDown;

// Set-up bits and bobs
require_once __DIR__ . '/container.php';
require_once __DIR__ . '/routes.php';

return $writedown;
