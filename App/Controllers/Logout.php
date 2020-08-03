<?php

declare(strict_types=1);

namespace App\Controllers;

use Src\AbstractController;

/**
 * Удаляет данные пользователя из сессии
 * и возращает редирект на страницу входа
 *
 * Class Logout
 * @package App\Controllers
 */
class Logout extends AbstractController
{
    public function __invoke()
    {
        if (!$this->isAuthorized()) {
            $this->redirect('/login');
        }

        $this->session()->unset('userId');
        $this->redirect('/login');
    }
}