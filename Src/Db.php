<?php

declare(strict_types=1);

namespace Src;

use PDO;

/**
 * Содержит текущее подключение к базе данных с помощью PDO.
 *
 * Class Db
 * @package Src
 */
class Db
{
    private static ?self $instance = null;

    private PDO $pdo;

    private function __construct()
    {
        $config = require_once __DIR__ . '/../config/db.php';

        $this->pdo = new PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'],
            $config['password'],
        );
    }

    public static function getInstance(): self
    {
        if (is_null(static::$instance)) {
            return static::$instance = new self;
        }

        return static::$instance;
    }

    /**
     * Возвращает текущее подключение.
     *
     * @return PDO
     */
    public function pdo(): PDO
    {
        return $this->pdo;
    }
}