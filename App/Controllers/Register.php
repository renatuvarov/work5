<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use Src\AbstractController;
use App\Validations\RegisterValidator;

/**
 * Контроллер, отвечающий за отображение страницы регистрации
 * и вывод ошибок, в случае неверно введенных данных.
 *
 * Class Register
 * @package App\Controllers
 */
class Register extends AbstractController
{
    public function __invoke()
    {
        if ($this->isAuthorized()) {
            $this->redirect('/home');
        }

        if ($this->request()->isPost()) {
            $validator = new RegisterValidator();
            $validator->validate($input = $this->request()->post());

            if (!$validator->hasErrors()) {
                $user = User::create(
                    $input['login'],
                    $input['email'],
                    $input['name'],
                    $input['surname'],
                    $input['patronymic'],
                    $input['password'],
                );

                $this->session()->set('userId', $user->id);
                $this->redirect('/home');
            }

            $this->view()->setErrors($validator->getErrors());
            $this->view()->setOld($input);
        }

        $this->render('register', [
            'title' => 'Регистрация',
        ]);
    }
}