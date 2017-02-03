REATE DATABASE `rahiyan_noor`;
CREATE TABLE `rahiyan_noor`.`ammaliyat` ( `ammaliyat_id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `commander_name` VARCHAR(50) NULL , `detail` TEXT NULL , PRIMARY KEY (`ammaliyat_id`), UNIQUE (`name`)) ENGINE = InnoDB;
