create database cms;

create table cms.`autor` (
	`id` bigint (20) auto_increment,
	`firstname` varchar (100) NOT NULL,
	`lastname` varchar (100) NOT NULL,
	PRIMARY KEY (id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 

create table cms.`article` (
	`id` bigint (20) auto_increment,
	`title` varchar (100) NOT NULL,
	`content` text,
	`publication_date` datetime NOT NULL,
	`autor_id` bigint (20) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (autor_id) REFERENCES cms.autor(id)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci; 
