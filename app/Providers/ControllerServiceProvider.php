<?php

namespace App\Providers;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ControllerServiceProvider extends AbstractServiceProvider
{
    /**
     * Services provided by the service provider.
     *
     * @var array
     */
    protected $provides = [
        'Admin\AuthController',
        'API\AuthController',
    ];

    /**
     * Register providers into the container.
     */
    public function register()
    {
        // Admin routes.
        $this->getContainer()
            ->add('Admin\AuthController', AuthController::class)
            ->withArgument('view');

        // API endpoints.
        $this->getContainer()
            ->add('API\AuthController', \App\Http\Controllers\API\AuthController::class);
    }
}
