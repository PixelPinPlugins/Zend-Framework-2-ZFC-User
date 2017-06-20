CREATE TABLE `user`
(
    `user_id`       INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username`      VARCHAR(255) DEFAULT NULL UNIQUE,
    `email`         VARCHAR(255) DEFAULT NULL UNIQUE,
    `display_name`  VARCHAR(255) DEFAULT NULL,
    `nick_name`     VARCHAR(255) DEFAULT NULL,
    `first_name`  	VARCHAR(255) DEFAULT NULL,
    `last_name`   	VARCHAR(255) DEFAULT NULL,
    `gender`		VARCHAR(255) DEFAULT NULL,
    `birthdate`		VARCHAR(255) DEFAULT NULL,
    `phone_number`	VARCHAR(255) DEFAULT NULL,
    `address`		VARCHAR(255) DEFAULT NULL,
    `country`		VARCHAR(255) DEFAULT NULL,
    `region`		VARCHAR(255) DEFAULT NULL,
    `city`			VARCHAR(255) DEFAULT NULL,
    `zip`			VARCHAR(255) DEFAULT NULL,
    `password`      VARCHAR(128) NOT NULL,
    `state`         SMALLINT UNSIGNED
) ENGINE=InnoDB CHARSET="utf8";
