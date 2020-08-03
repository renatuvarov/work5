<?php

declare(strict_types=1);

namespace Src\Validations\Rules;

/**
 * Базовый класс правил валидации.
 *
 * Class AbstractRule
 * @package Src\Validations\Rules
 */
abstract class AbstractRule
{
    /**
     * Валидируемое значение.
     *
     * @var mixed
     */
    protected $value;

    /**
     * Параметры для данного правила валидации.
     *
     * @var array
     */
    protected array $requirements;

    public function __construct($value, array $requirements)
    {
        $this->value = $value;
        $this->requirements = $requirements;
    }
}