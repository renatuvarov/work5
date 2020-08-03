<?php

declare(strict_types=1);

namespace App\Validations;

use Src\AbstractValidator;
use Src\Validations\Rules\Email;
use Src\Validations\Rules\Max;
use Src\Validations\Rules\Min;
use Src\Validations\Rules\Required;
use Src\Validations\Rules\Same;
use Src\Validations\Rules\Unique;

/**
 * Валидация для страницы регистрации.
 *
 * Class RegisterValidator
 * @package App\Validations
 */
class RegisterValidator extends AbstractValidator
{
    protected array $rules = [
        'login' => [
            Required::class => [],
            Unique::class => ['table' => 'users', 'field' => 'login'],
            Min::class => ['min' => 2],
            Max::class => ['max' => 255],
        ],
        'email' => [
            Required::class => [],
            Unique::class => ['table' => 'users', 'field' => 'email'],
            Email::class => [],
            Max::class => ['max' => 255],
        ],
        'name' => [
            Required::class => [],
            Min::class => ['min' => 2],
            Max::class => ['max' => 255],
        ],
        'surname' => [
            Required::class => [],
            Min::class => ['min' => 2],
            Max::class => ['max' => 255],
        ],
        'patronymic' => [
            Required::class => [],
            Min::class => ['min' => 2],
            Max::class => ['max' => 255],
        ],
        'password' => [
            Required::class => [],
            Min::class => ['min' => 8],
            Max::class => ['max' => 255],
        ],
        'password_confirm' => [
            Required::class => [],
            Same::class => ['field' => 'password'],
            Min::class => ['min' => 8],
            Max::class => ['max' => 255],
        ],
    ];
}