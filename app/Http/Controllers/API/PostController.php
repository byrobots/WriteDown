<?php

namespace App\Http\Controllers\API;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PostController extends BaseController
{
    /**
     * Retrieve all posts.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param array                                    $args Modifiers for requesting posts. Think pagination.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {
        $posts = $this->api->post()->index([
            'where'      => [],
            'pagination' => [
                'current_page' => array_key_exists('page', $args) ? $args['page'] : 1,
                'per_page'     => env('MAX_ITEMS', 10),
            ],
        ]);

        // TODO: Add meta data to response
        return $this->apiResponse->respond($posts['data']);
    }
}
