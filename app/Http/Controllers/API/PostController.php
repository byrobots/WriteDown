<?php

namespace App\Http\Controllers\API;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;

class PostController extends BaseController
{
    /**
     * Get an index of posts.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request  Not used here. Just placeholder so we can get to $args.
     * @param \Psr\Http\Message\ResponseInterface      $response As above.
     * @param array                                    $args     Modifiers for requesting posts. Think pagination.
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

        return $this->apiResponse->setData($posts['data'])->respond();
    }

    /**
     * Attempt to save a new post.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function store()
    {
        $input  = $this->request->getParsedBody();
        $result = $this->writedown->getService('api')->post()->create([
            'title'      => $input['title'],
            'publish_at' => !empty($input['publish_at']) ? new \DateTime($input['publish_at']) : null,
            'excerpt'    => !empty($input['excerpt'])    ? $input['excerpt']                   : null,
            'body'       => $input['body'],
        ]);

        $response = $this->apiResponse->setData($result['data']);
        if (!$result['success']) {
            $response->setSuccess(false)->setStatusCode(400);
        }

        return $response->respond();
    }

    /**
     * Get a single post.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request  Not used here. Just placeholder so we can get to $args.
     * @param \Psr\Http\Message\ResponseInterface      $response As above.
     * @param array                                    $args     Request arguments. Will contain the post ID.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function read(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {
        $result = $this->writedown
            ->getService('api')
            ->post()
            ->read($args['postID']);

        $response = $this->apiResponse->setData($result['data']);
        if (!$result['success']) {
            $response->setSuccess(false)->setStatusCode(400);
        }

        return $response->respond();
    }

    /**
     * Update a single post.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request  Not used here. Just placeholder so we can get to $args.
     * @param \Psr\Http\Message\ResponseInterface      $response As above.
     * @param array                                    $args     Request arguments. Will contain the post ID.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {
        $input  = $this->request->getParsedBody();
        $result = $this->writedown->getService('api')
            ->post()
            ->update($args['postID'], [
                'title'      => $input['title'],
                'publish_at' => !empty($input['publish_at']) ? new \DateTime($input['publish_at']) : null,
                'excerpt'    => !empty($input['excerpt'])    ? $input['excerpt']                   : null,
                'body'       => $input['body'],
            ]);

        $response = $this->apiResponse->setData($result['data']);
        if (!$result['success']) {
            $response->setSuccess(false)->setStatusCode(400);
        }

        return $response->respond();
    }

    /**
     * Delete a post.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request  Not used here. Just placeholder so we can get to $args.
     * @param \Psr\Http\Message\ResponseInterface      $response As above.
     * @param array                                    $args     Will contain the Post ID.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {
        $result = $this->writedown
            ->getService('api')
            ->post()
            ->delete($args['postID']);

        $response = $this->apiResponse->setData([]);
        if (!$result['success']) {
            $response->setSuccess(false)->setStatusCode(400);
        }

        return $response->respond();
    }
}
