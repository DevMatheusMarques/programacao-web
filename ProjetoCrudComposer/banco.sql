-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Categoria` (
                                                  `id` INT NOT NULL,
                                                  `descricao` VARCHAR(150) NOT NULL,
    PRIMARY KEY (`id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`produto` (
                                                `id` INT NOT NULL,
                                                `nome` VARCHAR(150) NOT NULL,
    `valor` DECIMAL(8,2) NOT NULL,
    `Categoria_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_produto_Categoria_idx` (`Categoria_id` ASC),
    CONSTRAINT `fk_produto_Categoria`
    FOREIGN KEY (`Categoria_id`)
    REFERENCES `mydb`.`Categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
