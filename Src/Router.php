<?php

declare(strict_types=1);

namespace Src;

use Exception;

/**
 * Класс маршрутизации.
 *
 * Class Router
 * @package Src
 */
class Router
{
    /**
     * @var array
     * Массив параметров добавляемого маршрута.
     */
    private array $routesList = [];

    /**
     * Добавляет новый маршрут к массиву $routesList.
     *
     * @param string $pattern
     * Regexp-паттерн, используемый для проверки $_SERVER['REQUEST_URI']
     *
     * @param string $controllerName
     * Имя контроллера, для обработки запроса.
     */
    public function add(string $pattern, string $controllerName): void
    {
        $this->routesList[] = [
            'pattern' => $pattern,
            'controllerName' => $controllerName,
        ];
    }

    /**
     * Прозводит поиск маршрута, совпадающего с $_SERVER['REQUEST_URI']
     *
     * @param string $uri
     * Строка запроса $_SERVER['REQUEST_URI']
     *
     * @return array
     * Массив с параметрами совпавшего маршрута.
     *
     * @throws Exception
     * Кидает исключение, если маршут не найден.
     */
    public function match(string $uri): array
    {
        foreach ($this->routesList as $route) {
            if (preg_match('~' . $route['pattern'] . '~', $uri, $matches)) {
                return [
                    'controllerName' => $route['controllerName'],
                    'params' => array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY),
                ];
            }
        }

        throw new Exception('Page not found.', 404);
    }
}