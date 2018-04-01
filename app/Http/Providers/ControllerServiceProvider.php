<?php

namespace App\Http\Providers;

use App\Http\Controllers\Admin\AuthController;
use League\Container\ServiceProvider\AbstractServiceProvider;
use WriteDown\Http\ControllerInterface;

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
            ->invokeMethod('setCSRF', ['WriteDown\CSRF\CSRFInterface']);

        $this->getContainer()
            ->add('Admin\AuthController', AuthController::class);
    }
}
