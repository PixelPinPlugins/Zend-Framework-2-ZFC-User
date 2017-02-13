CREATE TABLE public.user
(                                                                                                                                                                                                                                                                              
  	user_id			serial NOT NULL,
	username		character varying(255) DEFAULT NULL UNIQUE,
	email			character varying(255) DEFAULT NULL UNIQUE,
	display_name	character varying(50) DEFAULT NULL,
	nick_name		character varying(255) DEFAULT NULL UNIQUE,
	first_name		character varying(255) DEFAULT NULL UNIQUE,
	last_name		character varying(255) DEFAULT NULL UNIQUE,
	gender			character varying(255) DEFAULT NULL UNIQUE,
	birthdate		character varying(255) DEFAULT NULL UNIQUE,
	phone_number	character varying(255) DEFAULT NULL UNIQUE,
	address			character varying(255) DEFAULT NULL UNIQUE,
	country			character varying(255) DEFAULT NULL UNIQUE,
	region			character varying(255) DEFAULT NULL UNIQUE,
	city			character varying(255) DEFAULT NULL UNIQUE,
	zip				character varying(255) DEFAULT NULL UNIQUE,
	password		character varying(128) NOT NULL,
	state			smallint,

CONSTRAINT user_pkey 		PRIMARY KEY (user_id),
CONSTRAINT user_username_key 	UNIQUE (username),
CONSTRAINT user_email_key 	UNIQUE (email)
);
