<?php

namespace App\Http\Controllers\API;

class PostController extends BaseController
{
    /**
     * Attempt to save a new post.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function store()
    {
        $input  = $this->request->getParsedBody();
        $result = $this->writedown->getService('api')->post()->create([
            'body'       => $input['body'],
            'excerpt'    => !empty($input['excerpt'])    ? $input['excerpt']                   : null,
            'publish_at' => !empty($input['publish_at']) ? new \DateTime($input['publish_at']) : null,
            'title'      => $input['title'],
        ]);

        $response = $this->apiResponse->setData($result['data']);
        if (!$result['success']) {
            $response->setSuccess(false)->setStatusCode(400);
        }

        return $response->respond();
    }
}
