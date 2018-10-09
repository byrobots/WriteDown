<?php

/**
 * Admin login routes.
 */
$writedown->getRouter()
    ->get('/admin/login', 'Admin\AuthController::loginForm');

/**
 * API Routes.
 *
 * These expose the HTTP API used for making asyncronous requests in the
 * frontend. Not to be confused with the API provided by the writedown-core
 * package.
 */
$writedown
    ->getRouter()
    ->group('/api', function ($route) use ($apiCsrfMiddleware) {
        // For authenticating a user
        $route->post('/login', 'API\AuthController::validateLogin')
            ->middleware($apiCsrfMiddleware);
    });

/**
 * Logged in administration routes.
 */
$writedown
    ->getRouter()
    ->group('/admin', function ($route) use ($csrfMiddleware) {
        //
    })->middleware($authMiddleware);
