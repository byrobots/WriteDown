<?php

namespace App\Http\Controllers\API;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class TagController extends BaseController
{
    /**
     * Attempt to save a new tag.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function store()
    {
        $input  = $this->request->getParsedBody();
        $result = $this->writedown->getService('api')->tag()->create([
            'name' => $input['name'],
        ]);

        $response = $this->apiResponse->setData($result['data']);
        if (!$result['success']) {
            $response->setSuccess(false)->setStatusCode(400);
        }

        return $response->respond();
    }
}
