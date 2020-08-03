<?php

declare(strict_types=1);

namespace Src;

/**
 * Class Session
 * @package Src
 */
class Session
{
    /**
     * Экземпляр класса сессии.
     *
     * @var $this |null
     */
    private static ?self $instance = null;

    /**
     * Возвращает экземпляр сессии или создает, если его нет.
     * @return static
     */
    public static function getInstance(): self
    {
        if (is_null(static::$instance)) {
            return static::$instance = new self;
        }

        return static::$instance;
    }

    /**
     * Стартует сессию и создает ее экземпляр.
     *
     * @return  void
     */
    public static function start(): void
    {
        session_start();
        static::getInstance();
    }

    /**
     * Получить значение из сессии по ключу.
     *
     * @param string $key
     * Ключ, по которму храниться значение.
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $_SESSION[$key];
    }

    /**
     * Сохраняет в сессию значение по ключу.
     *
     * @param string $key
     * Ключ, по которму сохраняется значение.
     *
     * @param $value
     * Сохраняемое значение.
     *
     * @return void
     */
    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Удалить значение из сессии по ключу.
     *
     * @param string $key
     * Ключ удаляемого значения.
     */
    public function unset(string $key): void
    {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Проверяет, имеется ли в сессии значение по заданному ключу.
     *
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }
}