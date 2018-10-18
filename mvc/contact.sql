CREATE DATABASE CONTACT;

USE CONTACT;

CREATE TABLE contact(
	Numero int(4) auto_increment primary key,
	Nom varchar(50) not null,
	Prenom varchar(50) not null,
	Email varchar(50) not null ,
	Commentaire varchar(100) not null 
)