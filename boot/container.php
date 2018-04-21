<?php

// Get WriteDown's container
$container = $writedown->getContainer();

// Define additional services
$container->addServiceProvider(App\Providers\ControllerServiceProvider::class);
$container->add('view', new \Slim\Views\PhpRenderer('../app/Views'));
