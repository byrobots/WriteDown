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
    private $apiResponse;

    /**
     * Get our act together.
     *
     * @param \ByRobots\WriteDown\CSRF\CSRFInterface $csrf
     *
     * @return void
     */
    public function __construct(CSRFInterface $csrf)
    {
        $this->csrf        = $csrf;
        $this->apiResponse = new APIResponse;
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
                $body = $request->getParsedBody();
                break;
            case 'GET':
                $body = $request->getQueryParams();
                break;
            default:
                return $this
                    ->apiResponse
                    ->setSuccess(false)
                    ->setStatusCode(400)
                    ->setData('Invalid request.')
                    ->respond();
        }

        $token = isset($body['csrf']) ? $body['csrf'] : '';
        if (!$this->csrf->isValid($token)) {
            return $this
                ->apiResponse
                ->setSuccess(false)
                ->setStatusCode(400)
                ->setData('Bad CSRF.')
                ->respond();
        }

        return $next($request, $response);
    }
}
