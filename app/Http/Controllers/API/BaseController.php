<?php

namespace App\Http\Controllers\API;

use ByRobots\WriteDown\Http\Controllers\Controller;
use Zend\Diactoros\Response\JsonResponse;

class BaseController extends Controller
{
    /**
     * Render a template and return a response.
     *
     * @param mixed $payload
     * @param bool  $success
     * @param int   $statusCode
     * @param array $headers
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function respond($payload, $success = true, $statusCode = 200, array $headers = [])
    {
        $data          = new \stdClass;
        $data->success = $success;
        $data->data    = $payload;

        return new JsonResponse($data, $statusCode, $headers);
    }
}
