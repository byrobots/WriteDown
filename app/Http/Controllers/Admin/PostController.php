<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PostController extends BaseController
{
    /**
     * Display the post index.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request  Not used here. Just placeholder so we can get to $args.
     * @param \Psr\Http\Message\ResponseInterface      $response As above.
     * @param array                                    $args     Will contain pagination details.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {
        $posts = $this->writedown->getService('api')->post()->index([
            'where'      => [],
            'pagination' => [
                'current_page' => array_key_exists('page', $args) ? $args['page'] : 1,
                'per_page'     => env('MAX_ITEMS', 10),
            ],
        ]);

        return $this->respond('admin/post/index.twig', [
            'csrf'  => $this->writedown->getService('csrf')->get(),
            'posts' => $posts,
        ]);
    }

    /**
     * Show the new post page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create()
    {
        $csrf = $this->writedown->getService('csrf')->get();
        $tags = $this->writedown->getService('api')->tag()->index([
            'pagination' => [],
        ]);

        return $this->respond('admin/post/create.twig', [
            'csrf' => $csrf,
            'tags' => $tags,
        ]);
    }

    /**
     * Show the edit post page.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request  Not used here. Just placeholder so we can get to $args.
     * @param \Psr\Http\Message\ResponseInterface      $response As above.
     * @param array                                    $args     Will contain the Post ID.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function edit(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {
        $csrf = $this->writedown->getService('csrf')->get();
        $post = $this->writedown->getService('api')->post()->read($args['postID']);
        return $this->respond('admin/post/edit.twig', [
            'csrf' => $csrf,
            'post' => $post,
        ]);
    }
}
