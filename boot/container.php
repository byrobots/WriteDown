<?php

/**
 * Get the application container.
 */
$container = $writedown->getContainer();

/**
 * Define core services.
 */
$container->add('response', Zend\Diactoros\Response::class);

$container->add('request', function() {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$container->add('emitter', Zend\Diactoros\Response\SapiEmitter::class);
