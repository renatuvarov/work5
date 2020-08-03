-- 1 вывести список email'лов, встречающихся более чем у одного пользователя
SELECT `email`, COUNT(`email`) AS `c`
FROM `users`
GROUP BY `email`
HAVING `c` > 1;

-- 2 вывести список логинов пользователей, которые не сделали ни одного заказа
SELECT `u`.`login`
FROM `users` AS `u`
WHERE `u`.`id` NOT IN (
    SELECT DISTINCT `o`.`user_id` FROM `orders` AS `o`
);

-- 3 вывести список логинов пользователей, которые сделали более двух заказов
SELECT `u`.`login`
FROM `users` AS `u`
INNER JOIN `orders` AS `o`
ON `u`.`id` = `o`.`user_id`
GROUP BY `u`.`login`
HAVING COUNT(`u`.`login`) > 2;