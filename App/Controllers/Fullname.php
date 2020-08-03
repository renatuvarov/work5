<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Validations\ChangeFullnameValidator;
use Src\AbstractController;

/**
 * Контроллер отвечающий за смену ФИО пользователя.
 *
 * Class Fullname
 * @package App\Controllers
 */
class Fullname extends AbstractController
{
    public function __invoke()
    {
        if (!$this->isAuthorized()) {
            $this->redirect('/login');
        }

        $user = User::findById($this->session()->get('userId'));

        if ($this->request()->isPost()) {
            $validator = new ChangeFullnameValidator();
            $validator->validate($input = $this->request()->post());

            if (!$validator->hasErrors()) {
                $user->updateFullName(
                    $input['name'],
                    $input['surname'],
                    $input['patronymic'],
                );

                $this->redirect('/home');
            }

            $this->view()->setErrors($validator->getErrors());
            $this->view()->setOld($input);
        }

        $this->render('fullname', [
            'title' => 'Смена ФИО',
            'user' => $user,
        ]);
    }
}