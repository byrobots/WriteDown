<?php

// Include WriteDown's dependencies
require_once __DIR__ . '/../vendor/autoload.php';

// Get the WriteDown object
$writedown = new WriteDown\WriteDown;

// Give WriteDown it's morning Espresso
require_once __DIR__ . '/../boot/start.php';

// And we're off
$writedown->init();
