# create table 

CREATE TABLE `login_system1`.`users` ( `id` INT NOT NULL AUTO_INCREMENT ,  `username` VARCHAR(250) NOT NULL ,  `email` VARCHAR(250) NOT NULL ,  `password` VARCHAR(250) NOT NULL ,  `cpassword` VARCHAR(250) NOT NULL ,  `token` VARCHAR(250) NOT NULL ,  `created_at` TIMESTAMP NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;