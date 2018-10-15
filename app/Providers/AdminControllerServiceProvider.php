<?php

namespace App\Providers;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use League\Container\ServiceProvider\AbstractServiceProvider;

class AdminControllerServiceProvider extends AbstractServiceProvider
{
    /**
     * Services provided by the service provider.
     *
     * @var array
     */
    protected $provides = [
        'Admin\AuthController',
        'Admin\DashboardController',
        'Admin\PostController',
    ];

    /**
     * Register providers into the container.
     */
    public function register()
    {
        $this->getContainer()
            ->add('Admin\AuthController', AuthController::class)
            ->withArgument('view');

        $this->getContainer()
            ->add('Admin\DashboardController', DashboardController::class)
            ->withArgument('view');

        $this->getContainer()
            ->add('Admin\PostController', PostController::class)
            ->withArgument('view');
    }
}
