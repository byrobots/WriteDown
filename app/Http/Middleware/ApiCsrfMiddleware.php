<?php

namespace App\HTTP\Middleware;

use App\Library\APIResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use ByRobots\WriteDown\CSRF\CSRFInterface;

/**
 * API specific CSRF middleware.
 */
class ApiCsrfMiddleware
{
    /**
     * @var \ByRobots\WriteDown\CSRF\CSRFInterface
     */
    private $csrf;

    /**
     * @var \App\Library\APIResponse;
     */
    private $response;

    /**
     * Get our act together.
     *
     * @param \ByRobots\WriteDown\CSRF\CSRFInterface $csrf
     *
     * @return void
     */
    public function __construct(CSRFInterface $csrf)
    {
        $this->csrf     = $csrf;
        $this->response = new APIResponse;
    }

    /**
     * Validate the CSRF token of the request.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param callable                                 $next
     *
     * @return mixed
     * @throws \Exception
     */
    public function validate(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        switch ($request->getMethod()) {
            case 'POST':
                $token = isset($request->getParsedBody()['csrf']) ?
                    $request->getParsedBody()['csrf'] : '';
                break;
            case 'GET':
                $token = isset($request->getQueryParams()['csrf']) ?
                    $request->getQueryParams()['csrf'] : '';
                break;
            default:
                return $this->response->respond('', false, 400);;
        }

        if (!$this->csrf->isValid($token)) {
            writeLog()
                ->warning(json_encode($request->getParsedBody()));

            return $this->response->respond('', false, 400);
        }

        return $next($request, $response);
    }
}
