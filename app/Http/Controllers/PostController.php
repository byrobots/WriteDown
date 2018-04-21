<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use WriteDown\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * The blog roll.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param array                                    $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $posts = $this->api->post()->index([
            'pagination' => [
                'current_page' => array_key_exists('page', $args) ? $args['page'] : 1,
                'per_page'     => env('MAX_ITEMS', 10),
            ],
        ]);

        return $this->view->render($this->response, 'post/index.php', [
            'posts' => $posts,
        ]);
    }

    /**
     * An individual blog post.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface      $response
     * @param array                                    $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function read(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $post = $this->api->post()->bySlug($args['slug']);

        if (!$post['success']) {
            http_response_code(404);
            exit;
        }

        $post['data']->body = $this->markdown->markdownToHtml($post['data']->body);
        return $this->view->render($this->response, 'post/read.php', [
            'post' => $post,
        ]);
    }
}
