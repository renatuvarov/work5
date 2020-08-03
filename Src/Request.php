<?php

declare(strict_types=1);

namespace Src;

/**
 * Класс HTTP-запроса.
 *
 * Class Request
 * @package Src
 */
class Request
{
    /**
     * Экземпляр класса
     *
     * @var $this|null
     */
    private static ?self $instance = null;

    /**
     * @var string
     * $_SERVER['REQUEST_URI']
     */
    private string $uri;

    /**
     * @var array
     * Суперглобальный массив $_GET.
     */
    private array $get;

    /**
     * @var array
     * Суперглобальный массив $_POST.
     */
    private array $post;

    /**
     * @var string
     * $_SERVER['REQUEST_METHOD']
     */
    private string $method;

    /**
     * @var Session
     * Эземпляр текущей сессии.
     */
    private Session $session;

    private function __construct(
        array $get,
        array $post,
        string $uri,
        string $method
    )
    {
        $this->get = $get;
        $this->post = $post;
        $this->uri = $uri;
        $this->method = $method;
        $this->session = Session::getInstance();
    }

    /**
     * @return Request|static|null
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            return static::$instance = new self(
                self::trimValues($_GET),
                self::trimValues($_POST),
                $_SERVER['REQUEST_URI'],
                $_SERVER['REQUEST_METHOD'],
            );
        }

        return static::$instance;
    }

    /**
     * @return string
     */
    public function uri(): string
    {
        return $this->uri;
    }

    /**
     * @return array
     */
    public function query(): array
    {
        return $this->get;
    }

    /**
     * Возвращает клон текущего экземпляра запроса.
     *
     * @param array $params
     * Дополнительные параметры get-запроса.
     *
     * @return $this
     * Клон текущего экземпляра запроса.
     */
    public function withQuery(array $params): self
    {
        $new = clone $this;
        $new->get = array_merge_recursive($this->get, $params);
        return $new;
    }

    /**
     * @return array
     */
    public function post(): array
    {
        return $this->post;
    }

    /**
     * Проверяет, был ли запрос сделан с помощью метода GET.
     *
     * @return bool
     */
    public function isGet(): bool
    {
        return $this->method === 'GET';
    }

    /**
     * Проверяет, был ли запрос сделан с помощью метода POST.
     *
     * @return bool
     */
    public function isPost(): bool
    {
        return $this->method === 'POST';
    }

    /**
     * Возвращает экземпляр текущей сессии.
     *
     * @return Session
     * Экземпляр текущей сессии.
     */
    public function session(): Session
    {
        return $this->session;
    }

    /**
     * Удалить пробелы по краям переменных запроса.
     *
     * @param array $values
     * Принимаемые значения.
     *
     * @return array
     * Значения без пробелов по краям строк.
     */
    private static function trimValues(array $values): array
    {
        $trimmed = [];

        foreach ($values as $key => $value) {
            $trimmed[$key] = trim($value);
        }

        return $trimmed;
    }
}