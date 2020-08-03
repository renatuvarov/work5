<?php

declare(strict_types=1);

namespace Src\Validations\Rules;

/**
 * Валидируемая строка не должна быть короче requirements['min'] символов.
 *
 * Class Min
 * @package Src\Validations\Rules
 */
class Min extends AbstractRule
{
    public function __invoke()
    {
        if (mb_strlen($this->value) < $this->requirements['min']) {
            return 'Минимальное количество символов - ' . $this->requirements['min'] . '.';
        }
    }
}