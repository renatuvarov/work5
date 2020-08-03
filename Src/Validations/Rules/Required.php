<?php

declare(strict_types=1);

namespace Src\Validations\Rules;

/**
 * Указывает на то, что проверяемое значение является обязательным.
 *
 * Class Required
 * @package Src\Validations\Rules
 */
class Required extends AbstractRule
{
    public function __invoke()
    {
        if (empty($this->value)) {
            return 'Заполните это поле.';
        }
    }
}