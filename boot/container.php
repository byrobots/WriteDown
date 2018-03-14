<?php

/**
 * Get the application container.
 */
$container = $writedown->getContainer();

/**
 * Define core services.
 */
$container->add('response', Zend\Diactoros\Response::class);

$container->add('request', function () {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$container->add('emitter', Zend\Diactoros\Response\SapiEmitter::class);

$container->add('database', function () {
    $configBuilder = new WriteDown\Database\ConfigBuilder\Doctrine;
    $database      = new WriteDown\Database\Drivers\Doctrine($configBuilder->generate());
    return $database->getManager();
});

$container->add('api', 'WriteDown\API\API')->withArgument('database');
