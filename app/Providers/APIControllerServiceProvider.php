<?php

namespace App\Providers;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController;
use League\Container\ServiceProvider\AbstractServiceProvider;

class APIControllerServiceProvider extends AbstractServiceProvider
{
    /**
     * Services provided by the service provider.
     *
     * @var array
     */
    protected $provides = [
        'API\AuthController',
        'API\PostController',
    ];

    /**
     * Register providers into the container.
     */
    public function register()
    {
        $this->getContainer()
            ->add('API\AuthController', AuthController::class);

        $this->getContainer()
            ->add('API\PostController', PostController::class);
    }
}
