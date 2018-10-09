<?php

// Get WriteDown's container.
$container = $writedown->getContainer();

// Define additional services.
$container->addServiceProvider(\App\Providers\ControllerServiceProvider::class);
$container->add('view', new Twig_Environment(
    new Twig_Loader_Filesystem(__DIR__ . '/../app/Views'),
    []
));
