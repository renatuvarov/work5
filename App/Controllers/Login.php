<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Validations\LoginValidator;
use Src\AbstractController;

/**
 *
 * Отображает страницу входа.
 *
 * Проверяет правильность введенных данных:
 * 1. Если данные верны, сохраняет пользователя в сессию и возвращает редирект на ЛК пользователя.
 * 2. Если данные не верны возвращает пользователю страницу с выводом ошибок.
 *
 * Class Login
 * @package App\Controllers
 */
class Login extends AbstractController
{
    public function __invoke()
    {
        if ($this->isAuthorized()) {
            $this->redirect('/home');
        }

        if ($this->request()->isPost()) {
            $validator = new LoginValidator();
            $validator->validate($input = $this->request()->post());

            if (!$validator->hasErrors()) {
                $user = User::findByLogin($input['login']);

                if ($this->correctInput($user, $input['password'])) {
                    $this->session()->set('userId', $user->id);
                    $this->redirect('/home');
                }

                $this->view()->setErrors(['login' => ['Неправильный логин или пароль.']]);
                $this->view()->setOld(['login' => $input['login']]);
            }
        }

        $this->render('login', [
            'title' => 'Вход',
        ]);
    }

    /**
     * Проверяет, был ли найден пользователь с введенным логином
     * и совпадают ли хэши паролей из базы и введенный пользователем.
     *
     * @param User|null $user
     * @param string $password
     * @return bool
     */
    private function correctInput(?User $user, string $password): bool
    {
        return !is_null($user) && password_verify($password, $user->password_hash);
    }
}