SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `gb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `gb` ;

-- -----------------------------------------------------
-- Table `gb`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gb`.`users` (
  `id` INT NOT NULL ,
  `username` VARCHAR(60) NOT NULL ,
  `password` VARCHAR(60) NOT NULL ,
  `email` VARCHAR(150) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gb`.`product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gb`.`product` (
  `id` INT NOT NULL ,
  `title` VARCHAR(250) NOT NULL ,
  `description` TEXT NOT NULL ,
  `image` VARCHAR(150) NOT NULL ,
  `price` FLOAT NULL ,
  `available` TINYINT(1) NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `userData` (`user_id` ASC) ,
  CONSTRAINT `userData`
    FOREIGN KEY (`user_id` )
    REFERENCES `gb`.`users` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gb`.`messages`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gb`.`messages` (
  `id` INT NOT NULL ,
  `title` VARCHAR(250) NOT NULL ,
  `content` TEXT NOT NULL ,
  `name` VARCHAR(60) NULL ,
  `email` VARCHAR(150) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
