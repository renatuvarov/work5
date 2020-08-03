<?php

declare(strict_types=1);

namespace Src\Validations\Rules;

use Src\DbHandler;

/**
 * Указывает на то, что проверяемое значение не должно существовать в БД.
 *
 * Class Unique
 * @package Src\Validations\Rules
 */
class Unique extends AbstractRule
{
    public function __invoke()
    {
        $count = DbHandler::count(
            $this->requirements['table'],
            ['attribute' => $this->requirements['field'], 'value' => $this->value],
        );

        if ($count > 0) {
            return 'Такой пользователь уже существует.';
        }
    }
}