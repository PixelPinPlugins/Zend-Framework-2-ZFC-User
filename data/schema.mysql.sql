CREATE TABLE `user`
(
    `user_id`       INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username`      VARCHAR(255) DEFAULT NULL UNIQUE,
    `email`         VARCHAR(255) DEFAULT NULL UNIQUE,
    `display_name`  VARCHAR(50) DEFAULT NULL,
    `nick_name`     VARCHAR(50) DEFAULT NULL,
    `first_name`  	VARCHAR(50) DEFAULT NULL,
    `last_name`   	VARCHAR(50) DEFAULT NULL,
    `gender`		VARCHAR(50) DEFAULT NULL,
    `birthdate`		VARCHAR(50) DEFAULT NULL,
    `phone_number`	VARCHAR(50) DEFAULT NULL,
    `address`		VARCHAR(50) DEFAULT NULL,
    `country`		VARCHAR(50) DEFAULT NULL,
    `region`		VARCHAR(50) DEFAULT NULL,
    `city`			VARCHAR(50) DEFAULT NULL,
    `zip`			VARCHAR(50) DEFAULT NULL,
    `password`      VARCHAR(128) NOT NULL,
    `state`         SMALLINT UNSIGNED
) ENGINE=InnoDB CHARSET="utf8";
