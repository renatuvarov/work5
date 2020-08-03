<?php

declare(strict_types=1);

namespace App\Validations;

use Src\AbstractValidator;
use Src\Validations\Rules\Exists;
use Src\Validations\Rules\Required;

/**
 * Валидация для страницы с авторизацией.
 *
 * Class LoginValidator
 * @package App\Validations
 */
class LoginValidator extends AbstractValidator
{
    protected array $rules = [
        'login' => [
            Required::class => [],
            Exists::class => ['table' => 'users', 'field' => 'login']
        ],
        'password' => [
            Required::class => [],
        ],
    ];
}