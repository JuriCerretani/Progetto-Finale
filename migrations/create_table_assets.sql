CREATE TABLE `cripto`.`assets`
(
`id` INT(255) NOT NULL AUTO_INCREMENT ,
`email` VARCHAR(255) NOT NULL ,
`crypto_name` VARCHAR(255) NOT NULL ,
`symbol` VARCHAR(30) NOT NULL,
`usd` INT(255) NOT NULL ,
`price` INT(255) NOT NULL,
`value` FLOAT NOT NULL,
PRIMARY KEY (`id`)
)
ENGINE = InnoDB;
