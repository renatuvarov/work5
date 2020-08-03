<?php

declare(strict_types=1);

namespace Src\Validations\Rules;

/**
 * Правило для валидации e-mail адреса.
 *
 * Class Email
 * @package Src\Validations\Rules
 */
class Email extends AbstractRule
{
    public function __invoke()
    {
        if (filter_var($this->value, FILTER_VALIDATE_EMAIL) === false) {
            return 'Некорректный e-mail адрес.';
        }
    }
}