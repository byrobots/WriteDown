<?php

/**
 * Front facing posts.
 */
$writedown->getRouter()->get('/', 'PostController::index');
$writedown->getRouter()->get('/{page:number}', 'PostController::index');

$writedown->getRouter()->get('/{slug}', 'PostController::read');

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
$writedown->getRouter()->group('/api', function ($route) use ($apiCsrfMiddleware) {
    // For authenticating a user
    $route->post('/login', 'API\AuthController::validateLogin')
        ->middleware($apiCsrfMiddleware);
});

/**
 * Logged in administration routes.
 */
$writedown->getRouter()->group('/admin', function ($route) use ($csrfMiddleware) {
    // Log the user out
    $route->get('/logout', 'Admin\AuthController::logout');

    // Posts CRUD
    $route->get('/posts', 'Admin\PostController::index');
    $route->get('/posts/{page:number}', 'Admin\PostController::index');

    $route->get('/posts/new', 'Admin\PostController::create');
    $route->post('/posts', 'Admin\PostController::store')
        ->middleware($csrfMiddleware);

    $route->get('/posts/edit/{resourceID}', 'Admin\PostController::edit');
    $route->post('/posts/edit/{resourceID}', 'Admin\PostController::update')
        ->middleware($csrfMiddleware);

    $route->get('/posts/delete/{resourceID}', 'Admin\PostController::delete')
        ->middleware($csrfMiddleware);

    // Users CRUD
    $route->get('/users', 'Admin\UserController::index');
    $route->get('/users/{page:number}', 'Admin\UserController::index');

    $route->get('/users/new', 'Admin\UserController::create');
    $route->post('/users', 'Admin\UserController::store')
        ->middleware($csrfMiddleware);

    $route->get('/users/edit/{resourceID}', 'Admin\UserController::edit');
    $route->post('/users/edit/{resourceID}', 'Admin\UserController::update')
        ->middleware($csrfMiddleware);

    $route->get('/users/delete/{resourceID}', 'Admin\UserController::delete')
        ->middleware($csrfMiddleware);

    // Tag CRUD
    $route->get('/tags', 'Admin\TagController::index');
    $route->get('/tags/{page:number}', 'Admin\TagController::index');

    $route->get('/tags/new', 'Admin\TagController::create');
    $route->post('/tags', 'Admin\TagController::store')
          ->middleware($csrfMiddleware);

    $route->get('/tags/edit/{resourceID}', 'Admin\TagController::edit');
    $route->post('/tags/edit/{resourceID}', 'Admin\TagController::update')
          ->middleware($csrfMiddleware);

    $route->get('/tags/delete/{resourceID}', 'Admin\TagController::delete')
        ->middleware($csrfMiddleware);
})->middleware($authMiddleware);
