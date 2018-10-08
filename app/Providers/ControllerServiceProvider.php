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
        'Admin\PostController',
        'Admin\TagController',
        'Admin\UserController',
        'API\AuthController',
        'PostController',
    ];

    /**
     * Register providers into the container.
     */
    public function register()
    {
        // First up, the admin area.
        $this->getContainer()
            ->add('Admin\AuthController', AuthController::class)
            ->withArgument('view');

        $this->getContainer()
            ->add('Admin\PostController', PostController::class)
            ->withArgument('view');

        $this->getContainer()
             ->add('Admin\TagController', TagController::class)
             ->withArgument('view');

        $this->getContainer()
            ->add('Admin\UserController', UserController::class)
            ->withArgument('view');

        // The API.
        $this->getContainer()
            ->add('API\AuthController', \App\Http\Controllers\API\AuthController::class);

        // Now the frontend
        $this->getContainer()
            ->add('PostController', \App\Http\Controllers\PostController::class)
            ->withArgument('view');
    }
}
