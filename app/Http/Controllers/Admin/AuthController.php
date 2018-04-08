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
            'csrf' => $this->csrf->get(),
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
        $user = $this->auth->verifyCredentials(
            $this->request->getParsedBody()['email'],
            $this->request->getParsedBody()['password']
        );

        if (!$user) {
            $this->sessions->setFlash('error', 'Can not login.');
            return new RedirectResponse('/admin/login');
        }

        $token = $this->auth->generate();
        $this->api->user()->update($user->id, ['token' => $token]);
        $this->sessions->set('auth_token', $token);
        die('Logged in.');
    }
}
