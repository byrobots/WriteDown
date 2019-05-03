<?php

namespace App\Http\Controllers;

use ByRobots\WriteDown\Http\Controllers\Controller;
use Zend\Diactoros\Response\HtmlResponse;
use Twig_Environment;

class BaseController extends Controller
{
    /**
     * @var \Twig_Environment
     */
    protected $view;

    /**
     * Set-up.
     *
     * @param \Twig_Environment $view
     *
     * @return void
     */
    public function __construct(Twig_Environment $view)
    {
        $this->view = $view;
        $this->setWriteDown(writedown());

        // Make sure a CSRF token is always available
        $this->writedown->getService('csrf')->generate();
    }

    /**
     * Render a template and return a response.
     *
     * @param string $template
     * @param array  $parameters
     * @param int    $statusCode Optional. Defaults to 200 (i.e. OK).
     * @param array  $headers    Optional. HTTP headers to be sent with the response.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function respond($template, array $parameters = [], $statusCode = 200, array $headers = [])
    {
        $response = new HtmlResponse(
            $this->view->render($template, $parameters),
            $statusCode
        );

        return $response;
    }

    /**
     * Is the user authenticated?
     *
     * @return bool
     */
    protected function isAuthenticated()
    {
        $session = $this->writedown->getService('session');
        if (
            $session->get('auth_token') and
            $this->writedown->getService('auth')->verifyToken($session->get('auth_token'))
        ) {
            return true;
        }

        return false;
    }
}
