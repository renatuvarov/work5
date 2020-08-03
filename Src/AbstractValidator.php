<?php

declare(strict_types=1);

namespace Src;

use Src\Validations\Rules\Same;

/**
 * Базовый класс валидации.
 *
 * Class AbstractValidator
 * @package Src
 */
abstract class AbstractValidator
{
    /**
     * @var array
     * Массив правил валидации.
     */
    protected array $rules = [];

    /**
     * @var array
     * Массив ошибок валидации.
     */
    protected array $errors = [];

    /**
     * @var string
     * Значение полей fieldname и fieldname_postfix должны совпадать
     * при проверке в правиле \Src\Validations\Rules\Same
     *
     * @see Same
     */
    protected string $confirmPostfix = '_confirm';

    /**
     * Производит валидацию и при наличии ошибок сохраняет их в массив $errors.
     *
     * @param array $input
     * Массив значений, которые будут проверены при валидации.
     * Наименование ключей массива должно совпадать с ключами, указанными в массиве $rules.
     */
    public function validate(array $input): void
    {
        foreach ($this->rules as $ruleKey => $ruleSet) {
            foreach ($ruleSet as $rule => $requirements) {
                $value = $input[$ruleKey] ?? null;

                if ($rule === Same::class) {
                    $firstValue = $input[str_replace($this->confirmPostfix, '', $ruleKey)];
                    $value = [$firstValue, $value];
                }

                $ruleInstance = new $rule($value, $requirements);

                if (!empty($error = $ruleInstance())) {
                    $this->setError($ruleKey, $error);
                }
            }
        }
    }

    /**
     * Проверяет наличие ошибок в массиве $errors.
     *
     * @return bool
     */
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    /**
     * Возаращает все ошибки валидации.
     *
     * @return array
     * Массив с ошибками.
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Добавить ошибку в массив $errors.
     *
     * @param string $key
     * Ключ, указывающий на массив, в который будет добавлено сообщение об ошибке.
     *
     * @param mixed $message
     * Сообщение об ошибке.
     */
    public function setError(string $key, $message): void
    {
        $this->errors[$key][] = $message;
    }
}