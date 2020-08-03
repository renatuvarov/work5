<?php

declare(strict_types=1);

namespace Src\Validations\Rules;

use Src\DbHandler;

/**
 * Правило, указывающее, что валидируемое значение должно присутствовать в БД.
 *
 * Таблица, в которой будет производиться поиск.
 * $requirements['table']
 *
 * Аттрибут, значение которого должно совпадать с валидируемым значением.
 * $requirements['field']
 *
 * Class Exists
 * @package Src\Validations\Rules
 *
 */
class Exists extends AbstractRule
{
    public function __invoke()
    {
        $count = DbHandler::count(
            $this->requirements['table'],
            ['attribute' => $this->requirements['field'], 'value' => $this->value],
        );

        if ($count === 0) {
            return 'Пользователь не найден.';
        }
    }
}