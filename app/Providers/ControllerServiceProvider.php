<?php

namespace App\Providers;

use App\Http\Controllers\Admin\AuthController;
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
    ];

    /**
     * Register providers into the container.
     */
    public function register()
    {
        $this->getContainer()->inflector(ControllerInterface::class)
            ->invokeMethod('setRequest', ['Psr\Http\Message\RequestInterface'])
            ->invokeMethod('setResponse', ['Psr\Http\Message\ResponseInterface'])
            ->invokeMethod('setSessions', ['WriteDown\Sessions\SessionInterface'])
            ->invokeMethod('setView', ['view'])
            ->invokeMethod('setCSRF', ['WriteDown\CSRF\CSRFInterface'])
            ->invokeMethod('setAuth', ['WriteDown\Auth\Interfaces\AuthInterface']);

        $this->getContainer()
            ->add('Admin\AuthController', AuthController::class);
    }
}
