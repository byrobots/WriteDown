<?php

// Get WriteDown's container.
$container = $writedown->getContainer();

// Define additional services.
$container->addServiceProvider(\App\Providers\AdminControllerServiceProvider::class);
$container->addServiceProvider(\App\Providers\APIControllerServiceProvider::class);

// Set-up Twig
$twig = new Twig_Environment(new Twig_Loader_Filesystem(__DIR__ . '/../app/Views'), []);
$container->add('view', $twig);
