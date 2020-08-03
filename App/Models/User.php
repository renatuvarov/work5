<?php

declare(strict_types=1);

namespace App\Models;

use PDO;
use Src\Db;

/**
 * Модель Active Record, для работы с таблицей пользователей.
 *
 * Class User
 * @package App\Models
 */
class User
{
    private const TABLE_NAME = 'users';

    /**
     * @var int|null
     */
    public ?int $id;

    /**
     * @var string|null
     */
    public ?string $login;

    /**
     * @var string|null
     */
    public ?string $email;

    /**
     * @var string|null
     */
    public ?string $name;

    /**
     * @var string|null
     */
    public ?string $surname;

    /**
     * @var string|null
     */
    public ?string $patronymic;

    /**
     * @var string|null
     */
    public ?string $password_hash;

    /**
     * Получить экземпляр пользователя по заданному id.
     *
     * @param int $id
     * @return static|null
     */
    public static function findById(int $id): ?self
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' WHERE id = :id';

        $stmt = Db::getInstance()->pdo()->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch();
    }

    /**
     * Получить экземпляр пользователя по заданному логину.
     *
     * @param string $login
     * @return static|null
     */
    public static function findByLogin(string $login): ?self
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' WHERE login = :login';

        $stmt = Db::getInstance()->pdo()->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $stmt->execute([':login' => $login]);

        return $stmt->fetch();
    }

    /**
     * Создает экземпляр пользователя и сохраняет его в базу данных.
     *
     * @param string $login
     * @param string $email
     * @param string $name
     * @param string $surname
     * @param string $patronymic
     * @param string $password
     * @return static
     */
    public static function create(string $login, string $email, string $name, string $surname, string $patronymic, string $password): self
    {
        $user = new self;

        $sql = 'INSERT INTO '
            . self::TABLE_NAME
            . ' (login, email, name, surname, patronymic, password_hash) '
            . ' VALUES (:login, :email, :name, :surname, :patronymic, :password_hash)';

        $pdo = Db::getInstance()->pdo();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':login' => $user->login = $login,
            ':email' => $user->email = $email,
            ':name' => $user->name = $name,
            ':surname' => $user->surname = $surname,
            ':patronymic' => $user->patronymic = $patronymic,
            ':password_hash' => $user->password_hash = password_hash($password, PASSWORD_DEFAULT),
        ]);

        $user->id = (int) $pdo->lastInsertId();

        return $user;
    }


    /**
     * Задает новые ФИО и сохраняет изменения в базе.
     *
     * @param string $name
     * @param string $surname
     * @param string $patronymic
     * @return bool
     */
    public function updateFullName(string $name, string $surname, string $patronymic): bool
    {
        $sql = 'UPDATE '
            . self::TABLE_NAME
            . ' SET name = :name, surname = :surname, patronymic = :patronymic';

        $stmt = Db::getInstance()->pdo()->prepare($sql);

        return $stmt->execute([
            ':name' => $this->name = $name,
            ':surname' => $this->surname = $surname,
            ':patronymic' => $this->patronymic = $patronymic,
        ]);
    }

    /**
     * Задает новый пароль и сохраняет его в базе.
     *
     * @param string $password
     * @return bool
     */
    public function updatePassword(string $password): bool
    {
        $sql = 'UPDATE ' . self::TABLE_NAME . ' SET password_hash = :password_hash';

        $stmt = Db::getInstance()->pdo()->prepare($sql);

        return $stmt->execute([
            ':password_hash' => $this->password_hash = password_hash($password, PASSWORD_DEFAULT),
        ]);
    }
}
