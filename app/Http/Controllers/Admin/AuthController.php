<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Zend\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController
{
    /**
     * Show the login form.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function loginForm()
    {
        return $this->respond('admin/auth/login.twig', [
            'csrf'  => $this->csrf->get(),
            'error' => $this->session->getFlash('error'),
        ]);
    }

    /**
     * Validate the login.
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function validateLogin()
    {
        // Attempt to verify the submitted details
        $user = $this->auth->verifyCredentials(
            $this->request->getParsedBody()['email'],
            $this->request->getParsedBody()['password']
        );

        // Sad trombone
        if (!$user) {
            $this->session->setFlash('error', 'Can not login.');
            return new RedirectResponse('/admin/login');
        }

        // Generate and set the user's authentication token
        $token = $this->auth->generate();
        $this->api->user()->update($user->id, ['token' => $token]);
        $this->session->set('auth_token', $token);

        // Onwards to the admin area
        return new RedirectResponse('/admin/posts');
    }

    /**
     * Log the user out.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function logout()
    {
        $user = $this->loggedInAs();
        $this->api->user()->update($user->id, ['token' => null]);
        $this->session->destroy();

        return new RedirectResponse('/');
    }
}
