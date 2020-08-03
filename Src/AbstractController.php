<?php

declare(strict_types=1);

namespace Src;

/**
 * Базовый класс контроллера.
 *
 * Class AbstractController
 * @package Src
 */
abstract class AbstractController
{
    /**
     * @var View
     */
    protected View $view;

    /**
     * @var Request
     */
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->view = new View();
    }

    /**
     * Проверяет, авторизован ли пользователь, запрашивая его идентификатор из сессии.
     *
     * @return bool
     */
    protected function isAuthorized(): bool
    {
        return $this->session()->has('userId');
    }

    /**
     * Редирект пользователя по указанному пути $path
     *
     * @param string $path
     */
    protected function redirect(string $path = '/'): void
    {
        header('Location: ' . $path);
    }

    /**
     * Возвращает текущий объект запроса.
     *
     * @return Request
     */
    public function request(): Request
    {
        return $this->request;
    }

    /**
     * Возвращает экземпляр \Src\View
     *
     * @return View
     */
    public function view(): View
    {
        return $this->view;
    }

    /**
     * Возвращает объект текущей сессии.
     *
     * @return Session
     */
    public function session(): Session
    {
        return $this->request->session();
    }

    /**
     * Рендер заданного $template с помощью View
     *
     * @param string $template
     * Шаблон для рендера
     *
     * @param array $data
     * Данные для рендера.
     */
    public function render(string $template, array $data): void
    {
        $this->view()->render($template, $data);
    }
}