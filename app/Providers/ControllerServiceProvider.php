<?php

namespace App\Providers;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use League\Container\ServiceProvider\AbstractServiceProvider;
use WriteDown\Http\Interfaces\ControllerInterface;

class ControllerServiceProvider extends AbstractServiceProvider
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
        'Admin\UserController',
    ];

    /**
     * Register providers into the container.
     */
    public function register()
    {
        // Set various dependencies all controllers have
        $this->getContainer()->inflector(ControllerInterface::class)
            ->invokeMethod('setRequest',  ['Psr\Http\Message\RequestInterface'])
            ->invokeMethod('setResponse', ['Psr\Http\Message\ResponseInterface'])
            ->invokeMethod('setSessions', ['WriteDown\Sessions\SessionInterface'])
            ->invokeMethod('setAPI',      ['WriteDown\API\Interfaces\APIInterface'])
            ->invokeMethod('setView',     ['view']) // TODO: Interface
            ->invokeMethod('setCSRF',     ['WriteDown\CSRF\CSRFInterface'])
            ->invokeMethod('setAuth',     ['WriteDown\Auth\Interfaces\AuthInterface']);

        // Now define the controllers themselves.
        // First up, the admin area.
        $this->getContainer()
            ->add('Admin\AuthController', AuthController::class);

        $this->getContainer()
            ->add('Admin\DashboardController', DashboardController::class);

        $this->getContainer()
            ->add('Admin\PostController', PostController::class);

        $this->getContainer()
            ->add('Admin\UserController', UserController::class);
    }
}
