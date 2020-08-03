<?php

declare(strict_types=1);

namespace Src;

use PDO;

/**
 * Класс для работы с запросами базы данных.
 *
 * Class DbHandler
 * @package Src
 */
class DbHandler
{
    /**
     * Возвращает количество найденных записей.
     *
     * @param string $table
     * Таблица в которой будет производиться поиск.
     *
     * @param array $field
     * Аттрибут, по которому будет производиться поиск.
     *
     * @return int
     * Количество найденных записей.
     */
    public static function count(string $table, array $field): int
    {
        $sql = 'SELECT COUNT(' . $field['attribute'] . ') c FROM ' . $table;
        $sql .= $field['value'] ? ' WHERE ' . $field['attribute'] . ' = :' . $field['attribute'] : '';

        $stmt = Db::getInstance()->pdo()->prepare($sql);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $stmt->execute($field['value'] ? [
            ':' . $field['attribute'] => $field['value'],
        ] : []);

        return (int) $stmt->fetch()['c'];
    }
}