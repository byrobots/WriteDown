<?php

namespace App\Http\Providers;

use App\Http\Controllers\TestController;
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
        'TestController',
    ];

    /**
     * Register providers into the container.
     */
    public function register()
    {
        $this->getContainer()->inflector(ControllerInterface::class)
            ->invokeMethod('setRequest', ['Psr\Http\Message\RequestInterface'])
            ->invokeMethod('setResponse', ['Psr\Http\Message\ResponseInterface']);

        $this->getContainer()
            ->add('TestController', TestController::class);
    }
}
