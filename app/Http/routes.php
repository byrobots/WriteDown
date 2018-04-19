<?php

/**
 * Admin login routes.
 */
$writedown->getRouter()
    ->get('/admin/login', 'Admin\AuthController::loginForm');

$writedown->getRouter()
    ->post('/admin/login', 'Admin\AuthController::validateLogin')
    ->middleware($csrfMiddleware);

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

    $route->get('/posts/delete/{resourceID}', 'Admin\PostController::delete');

    // Users CRUD
    $route->get('/users', 'Admin\UserController::index');
    $route->get('/users/{page:number}', 'Admin\UserController::index');

    $route->get('/users/new', 'Admin\UserController::create');
    $route->post('/users', 'Admin\UserController::store')
        ->middleware($csrfMiddleware);

    $route->get('/users/edit/{resourceID}', 'Admin\UserController::edit');
    $route->post('/users/edit/{resourceID}', 'Admin\UserController::update')
        ->middleware($csrfMiddleware);

    $route->get('/users/delete/{resourceID}', 'Admin\UserController::delete');
})->middleware($authMiddleware);
