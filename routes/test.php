<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$writedown->getRouter()->map('GET', '/', function(ServerRequestInterface $request, ResponseInterface $response) {
    $response->getBody()->write('HELLO WORLD');
    return $response;
});
