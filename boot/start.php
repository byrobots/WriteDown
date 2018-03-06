<?php

/**
 * Create the application container.
 */
$writedown = new WriteDown\WriteDown(
    new League\Container\Container
);

/**
 * Define core services.
 */
$writedown->container()->share('response', Zend\Diactoros\Response::class);

$writedown->container()->share('request', function () {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$writedown->container()->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);

$writedown->container()->share('router', new League\Route\RouteCollection);

/**
 * Jump back to processing the request.
 */
return $writedown;
