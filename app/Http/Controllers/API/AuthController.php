<?php

namespace App\Http\Controllers\API;

class AuthController extends BaseController
{
    /**
     * Validate the login.
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function validateLogin()
    {
        $input = $this->request->getParsedBody();

        // Attempt to verify the submitted details. If anything is missing
        // substitute with an empty string, which will always fail.
        $user = $this->auth->verifyCredentials(
            isset($input['email'])    ? $input['email']    : '',
            isset($input['password']) ? $input['password'] : ''
        );

        // Sad trombone
        if (!$user) {
            return $this->response->respond('', false, 400);
        }

        // Generate and set the user's authentication token
        $token = $this->auth->generate();
        $this->api->user()->update($user->id, ['token' => $token]);
        $this->session->set('auth_token', $token);

        // Onwards to the admin area
        return $this->response->respond('');
    }
}
