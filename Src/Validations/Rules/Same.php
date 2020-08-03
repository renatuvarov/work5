<?php

declare(strict_types=1);

namespace Src\Validations\Rules;

/**
 * Указывает на то, что проверяемое значение должно быть равно второму значению с постфиксом.
 * @see \Src\AbstractValidator
 *
 * Class Same
 * @package Src\Validations\Rules
 */
class Same extends AbstractRule
{
    public function __invoke()
    {
        if ($this->value[0] !== $this->value[1]) {
            return 'Значения должны совпадать.';
        }
    }
}