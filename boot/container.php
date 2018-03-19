<?php

/**
 * Get the application container.
 */
$container = $writedown->getContainer();

/**
 * Define core services.
 */
$container->add(
    'Psr\Http\Message\ResponseInterface',
    Zend\Diactoros\Response::class
);

$container->add('Psr\Http\Message\RequestInterface', function() {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$container->add(
    'Zend\Diactoros\Response\EmitterInterface',
    Zend\Diactoros\Response\SapiEmitter::class
);

$container->add('Doctrine\ORM\EntityManagerInterface', function() {
    $configBuilder = new WriteDown\Database\ConfigBuilder\Doctrine;
    $database      = new WriteDown\Database\Drivers\Doctrine($configBuilder->generate());
    return $database->getManager();
});

$container->add('WriteDown\API\ResponseBuilder', WriteDown\API\ResponseBuilder::class);

$container->add('WriteDown\Validator\Validator', WriteDown\Validator\Valitron::class);

$container->add('api', 'WriteDown\API\API')
    ->withArgument('Doctrine\ORM\EntityManagerInterface')
    ->withArgument('WriteDown\API\ResponseBuilder')
    ->withArgument('WriteDown\Validator\Validator');
