<?php

declare(strict_types=1);

namespace App\Validations;

use Src\AbstractValidator;
use Src\Validations\Rules\Max;
use Src\Validations\Rules\Min;
use Src\Validations\Rules\Required;
use Src\Validations\Rules\Same;


/**
 * Валидация для смены пароля.
 *
 * Class ChangePasswordValidator
 * @package App\Validations
 */
class ChangePasswordValidator extends AbstractValidator
{
    protected array $rules = [
        'password' => [
            Required::class => [],
            Min::class => ['min' => 8],
            Max::class => ['max' => 255],
        ],
        'password_confirm' => [
            Required::class => [],
            Same::class => [],
            Min::class => ['min' => 8],
            Max::class => ['max' => 255],
        ],
    ];
}