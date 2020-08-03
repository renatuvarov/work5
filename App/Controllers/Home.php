<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Src\AbstractController;

/**
 *
 * Контроллер для отображения личного кабинета пользователя.
 *
 * Class Home
 * @package App\Controllers
 */
class Home extends AbstractController
{
    public function __invoke()
    {
        if (!$this->isAuthorized()) {
            $this->redirect('/login');
        }

        $id = $this->session()->get('userId');
        $user = User::findById($id);

        $this->render('home', [
            'title' => 'Home',
            'user' => $user,
        ]);
    }
}