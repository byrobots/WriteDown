<?php

namespace App\Providers;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
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
        'Admin\PostController',
        'Admin\TagController',
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
            ->add('Admin\PostController', PostController::class)
            ->withArgument('view');

        $this->getContainer()
            ->add('Admin\TagController', TagController::class)
            ->withArgument('view');
    }
}
