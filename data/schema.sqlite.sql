CREATE TABLE user
(
    user_id       	INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    username      	VARCHAR(255) DEFAULT NULL UNIQUE,
    email         	VARCHAR(255) DEFAULT NULL UNIQUE,
    nick_name       VARCHAR(255) DEFAULT NULL UNIQUE,
    first_name      VARCHAR(255) DEFAULT NULL UNIQUE,
    last_name       VARCHAR(255) DEFAULT NULL UNIQUE,
    gender         	VARCHAR(255) DEFAULT NULL UNIQUE,
    birthdate       VARCHAR(255) DEFAULT NULL UNIQUE,
    phone_number    VARCHAR(255) DEFAULT NULL UNIQUE,
    address         VARCHAR(255) DEFAULT NULL UNIQUE,
    country         VARCHAR(255) DEFAULT NULL UNIQUE,
    region         	VARCHAR(255) DEFAULT NULL UNIQUE,
    city         	VARCHAR(255) DEFAULT NULL UNIQUE,
    zip         	VARCHAR(255) DEFAULT NULL UNIQUE,
    display_name  	VARCHAR(50) DEFAULT NULL,
    password      	VARCHAR(128) NOT NULL,
    state         	SMALLINT
);
