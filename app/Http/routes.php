<?php

$router = $writedown->getRouter();

// Admin login.
$router->get('/admin/login', 'Admin\AuthController::loginForm');

// Admin root. Re-directs the user based on whether or not they're logged in.
$router->get('/admin', 'Admin\RootController::onYourWay');

/**
 * API Routes.
 *
 * These expose the HTTP API used for making asyncronous requests in the
 * frontend. Not to be confused with the API provided by the writedown-core
 * package.
 */
$router->post('/api/login', 'API\AuthController::validateLogin')
    ->middleware($apiCsrfMiddleware);

$router->group('/api', function ($route) use ($apiCsrfMiddleware) {
    // Posts.
    $route->get('/posts', 'API\PostController::index');

    $route->post('/posts/store', 'API\PostController::store')
        ->middleware($apiCsrfMiddleware);

    $route->get('/posts/{postID}', 'API\PostController::read');

    $route->post('/posts/{postID}/update', 'API\PostController::update')
        ->middleware($apiCsrfMiddleware);

    $route->post('/posts/{postID}/delete', 'API\PostController::delete')
        ->middleware($apiCsrfMiddleware);

    // Slugs.
    $route->post('slugs/predicted', 'API\SlugController::predicted')
        ->middleware($apiCsrfMiddleware);

    // Tags.
    $route->post('/tags/store', 'API\TagController::store')
        ->middleware($apiCsrfMiddleware);

    $route->post('/tags/{tagID}/delete', 'API\TagController::delete')
        ->middleware($apiCsrfMiddleware);
})->middleware($authMiddleware);

/**
 * Logged in administration routes.
 */
$router->group('/admin', function ($route) {
    $route->get('/logout', 'Admin\AuthController::logout');

    // Posts.
    $route->get('/posts', 'Admin\PostController::index');
    $route->get('/posts/new', 'Admin\PostController::create');
    $route->get('/posts/{postID}/edit', 'Admin\PostController::edit');

    // Tags.
    $route->get('/tags', 'Admin\TagController::index');
})->middleware($authMiddleware);
