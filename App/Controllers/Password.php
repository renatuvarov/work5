<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Validations\ChangePasswordValidator;
use Src\AbstractController;

/**
 * Контроллер, отвечающий за отображение страницы смены пароля
 * и выводящий ошибки, в случае неверно введенных данных.
 *
 * Class Password
 * @package App\Controllers
 */
class Password extends AbstractController
{
    public function __invoke()
    {
        if (!$this->isAuthorized()) {
            $this->redirect('/login');
        }

        $user = User::findById($this->session()->get('userId'));

        if ($this->request()->isPost()) {
            $validator = new ChangePasswordValidator();
            $validator->validate($input = $this->request()->post());

            if (!$validator->hasErrors()) {
                $user->updatePassword(
                    $input['password'],
                );

                $this->redirect('/home');
            }

            $this->view()->setErrors($validator->getErrors());
        }

        $this->render('password', [
            'title' => 'Смена пароля',
        ]);
    }
}