<?php

namespace App\Http\Controllers\API;

class SlugController extends BaseController
{
    /**
     * Takes a title for a post and calculates the predicted slug for it. Does
     * not reserve the slug.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function predicted()
    {
        $input = $this->request->getParsedBody();
        $slug  = $this->writedown
            ->getService('slugger')
            ->generateSlug($input['title']);

        return $this->apiResponse->setData($slug)->respond();
    }
}
