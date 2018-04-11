<?php

namespace App\Http\Controllers\Admin;

use WriteDown\Http\Controllers\Controller;
use Zend\Diactoros\Response\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function loginForm()
    {
        return $this->view->render($this->response, 'admin/auth/login.php', [
            'csrf'  => $this->csrf->get(),
            'error' => $this->sessions->getFlash('error'), // TODO: Not working, either not being set or not making it this far.
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
            $this->sessions->setFlash('error', 'Can not login.');
            return new RedirectResponse('/admin/login');
        }

        // Generate and set the user's authentication token
        $token = $this->auth->generate();
        $this->api->user()->update($user->id, ['token' => $token]);
        $this->sessions->set('auth_token', $token);

        // Onwards to the admin area
        return new RedirectResponse('/admin');
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
        $this->sessions->set('auth_token', null);

        return new RedirectResponse('/');
    }
}
