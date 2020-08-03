<?php

declare(strict_types=1);

namespace Src\Validations\Rules;

/**
 * Длина валидируемой строки не должна превыщать длину requirements['max'].
 *
 * Class Max
 * @package Src\Validations\Rules
 */
class Max extends AbstractRule
{
    public function __invoke()
    {
        if (mb_strlen($this->value) > $this->requirements['max']) {
            return 'Mаксимальное количество символов - ' . $this->requirements['max'] . '.';
        }
    }
}