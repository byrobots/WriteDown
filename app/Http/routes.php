<?php

$router = $writedown->getRouter();

// Admin login. The only admin route that doesn't require authentication.
$router->get('/admin/login', 'Admin\AuthController::loginForm');

/**
 * API Routes.
 *
 * These expose the HTTP API used for making asyncronous requests in the
 * frontend. Not to be confused with the API provided by the writedown-core
 * package.
 */
$router->post('/api/login', 'API\AuthController::validateLogin')
    ->middleware($apiCsrfMiddleware);

$router->group(
    '/api',
    function ($route) use ($apiCsrfMiddleware) {
        // Posts.
        $route->get('/posts', 'API\PostController::index');

        $route->post('/posts/store', 'API\PostController::store')
            ->middleware($apiCsrfMiddleware);

        $route->get('/posts/{postID}', 'API\PostController::read');

        $route->post('/posts/{postID}/delete', 'API\PostController::delete')
            ->middleware($apiCsrfMiddleware);

        // Slugs.
        $route->post('slugs/predicted', 'API\SlugController::predicted')
            ->middleware($apiCsrfMiddleware);
    }
)->middleware($authMiddleware);

/**
 * Logged in administration routes.
 */
$router->group('/admin', function ($route) use ($csrfMiddleware) {
    $route->get('/dashboard', 'Admin\DashboardController::index');

    // Posts.
    $route->get('/posts', 'Admin\PostController::index');
    $route->get('/posts/new', 'Admin\PostController::create');
    $route->get('/posts/{postID}/edit', 'Admin\PostController::edit');
})->middleware($authMiddleware);
