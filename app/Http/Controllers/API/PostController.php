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
        $data     = $this->request->getParsedBody();
        $result   = $this->api->post()->create($data);
        $response = $this->apiResponse->setData($data->data);

        if (!$result['success']) {
            $response->setSuccess(false)->setStatusCode(400);
        }

        return $response->respond();
    }
}
