CREATE TABLE `test01`.`users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    `login` VARCHAR(50) NOT NULL ,
    `email` VARCHAR(255) NOT NULL ,
    `name` VARCHAR(255) NOT NULL ,
    `surname` VARCHAR(255) NOT NULL ,
    `patronymic` VARCHAR(255) NOT NULL ,
    `password_hash` VARCHAR(255) NOT NULL ,
    PRIMARY KEY (`id`),
    UNIQUE (`login`),
    UNIQUE (`email`)
) ENGINE = InnoDB;