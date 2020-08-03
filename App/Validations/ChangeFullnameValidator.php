<?php

declare(strict_types=1);

namespace App\Validations;

use Src\AbstractValidator;
use Src\Validations\Rules\Max;
use Src\Validations\Rules\Min;
use Src\Validations\Rules\Required;

/**
 * Валидация для смены ФИО пользователя.
 *
 * Class ChangeFullnameValidator
 * @package App\Validations
 */
class ChangeFullnameValidator extends AbstractValidator
{
    protected array $rules = [
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
    ];
}