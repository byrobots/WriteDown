<?php

// Include WriteDown's dependencies
require_once __DIR__ . '/../vendor/autoload.php';

// Load the environment variables
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// Give WriteDown it's morning Espresso
$writedown = require_once __DIR__ . '/../boot/start.php';

// And we're off
$writedown->init();
