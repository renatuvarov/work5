CREATE TABLE `test02`.`users` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `login` VARCHAR(55) NOT NULL ,
    `email` VARCHAR(55) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `test02`.`orders` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
    `user_id` INT(11) UNSIGNED NOT NULL ,
    `price` INT(11) NOT NULL ,
    PRIMARY KEY (`id`),
    FOREIGN KEY (user_id) REFERENCES `users`(`id`)
) ENGINE = InnoDB;