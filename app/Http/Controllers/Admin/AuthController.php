<?php

namespace App\Http\Controllers\Admin;

use WriteDown\Http\Controllers\Controller;

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
}
