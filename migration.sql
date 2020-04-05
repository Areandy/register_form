DROP DATABASE IF EXISTS my_db;
CREATE DATABASE my_db;
USE my_db;

/*
**	I dont use UNIQUE indexes becuase
**	UNIQUE constraint have identical
**	functionality.
*/
CREATE TABLE users (
	id int NOT NULL AUTO_INCREMENT,
	username varchar(50) NOT NULL,
	email varchar(70) NOT NULL,
	pass varchar(200) NOT NULL,
	fname varchar(50),
	lname varchar(50),
	age int,
	bio varchar(500),
	pic varchar(500) DEFAULT '/assets/img/nopic.png',
	PRIMARY KEY (id),
	UNIQUE (id),
	UNIQUE (username),
	UNIQUE (email)
);

