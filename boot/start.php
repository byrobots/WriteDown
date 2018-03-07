<?php

/**
 * Create the application container.
 */
$container = new League\Container\Container;
$container->add('app', WriteDown\WriteDown::class);

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

$container->add('router', new League\Route\RouteCollection);

/**
 * Jump back to processing the request.
 */
return $container;
