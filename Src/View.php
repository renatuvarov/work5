<?php

declare(strict_types=1);

namespace Src;

/**
 * Класс рендеринга шаблонов.
 * Содержит переменные, ошибки, массив значений предыдущего ввода
 * необходимые для отображения пользователю.
 *
 * Class View
 * @package Src
 */
class View
{
    /**
     * Путь к общему шаблону.
     */
    private const LAYOUT = __DIR__ . '/../views/layouts/default.php';

    /**
     * Путь к папке с видами.
     */
    private const TEMPLATE_DIR = __DIR__ . '/../views/';

    /**
     * @var array
     * Переменные, необходимые для рендера шаблона.
     */
    private array $data = [];

    /**
     * @var array
     * Массив ошибок валидации.
     */
    private array $errors = [];

    /**
     * @var array
     * Массив значений из предыдущего ввода.
     */
    private array $oldInput = [];

    /**
     * @param array $data
     * Добавляет значения в массив с данными.
     */
    private function setData(array $data): void
    {
        $this->data = array_merge_recursive($this->data, $data);
    }

    /**
     * Предварительный рендер частей шаблона, получаемый из буфера.
     *
     * @param string $template
     * Путь к шаблону.
     *
     * @param array $data
     * Массив значений для рендеринга.
     *
     * @return string
     * Сгенерированный вид.
     */
    private function preRender(string $template, array $data): string
    {
        extract($this->data);
        ob_start();
        include_once self::TEMPLATE_DIR . $template . '.php';
        return ob_get_clean();
    }

    /**
     * Выводит пользователю окончательно сгенерированный вид.
     *
     * @param string $template
     * Путь к шаблону.
     *
     * @param array $data
     * Массив значений для рендеринга.
     */
    public function render(string $template, array $data): void
    {
        $this->setData($data);
        $fragment = $this->preRender($template, $this->data);
        include_once self::LAYOUT;
    }

    /**
     * Проверяет, имеются ли ошибки для отображения пользователю.
     *
     * @param string $key
     * Ключ, по которому храниться массив с ошибками.
     *
     * @return bool
     */
    private function hasError(string $key): bool
    {
        return !empty($this->errors[$key]);
    }

    /**
     * Возвращает первую ошибку из массива по заданному ключу.
     *
     * @param string $key
     * Ключ, по которому храниться массив с ошибками.
     *
     * @return string
     * Возвращаемое сообщение об ошибке.
     */
    private function firstError(string $key): string
    {
        return $this->errors[$key][0];
    }

    /**
     * Задать массив с ошибками.
     *
     * @param array $errors
     * Массив с ошибками для сохранения в $errors
     */
    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Сохранить массив с предюдущим вводом пользователя.
     *
     * @param array $old
     * Массив, содержащий предыдущий ввод пользователя.
     */
    public function setOld(array $old): void
    {
        $this->oldInput = $old;
    }

    /**
     * Получить значение из предыдущего ввода по заданному ключу.
     *
     * @param string $key
     * Ключ, по которму необходимо получить значение из предыдущего ввода.
     *
     * @param string $default
     * Значение по умолчанию, которое будет возращено, если по ключу ничего не найдено.
     *
     * @return string
     * Возвращаемое значение.
     */
    public function old(string $key, string $default = ''): string
    {
        return $this->oldInput[$key] ?? $default;
    }
}