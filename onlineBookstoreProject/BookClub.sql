-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema BookClub
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema BookClub
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BookClub` DEFAULT CHARACTER SET utf8 ;
USE `BookClub` ;

-- -----------------------------------------------------
-- Table `BookClub`.`Members`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BookClub`.`Members` (
  `memberID` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(20) NULL COMMENT 'La',
  `lastname` VARCHAR(45) NULL,
  PRIMARY KEY (`memberID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BookClub`.`MemberCredentials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BookClub`.`MemberCredentials` (
  `email` VARCHAR(64) NOT NULL,
  `password` VARCHAR(50) NULL,
  `Members_memberID` INT NOT NULL,
  PRIMARY KEY (`email`, `Members_memberID`),
  INDEX `fk_MemberCredentials_Members_idx` (`Members_memberID` ASC) VISIBLE,
  CONSTRAINT `fk_MemberCredentials_Members`
    FOREIGN KEY (`Members_memberID`)
    REFERENCES `BookClub`.`Members` (`memberID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BookClub`.`Books`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BookClub`.`Books` (
  `bookID` INT NOT NULL AUTO_INCREMENT,
  `bookTitle` VARCHAR(128) NULL,
  `authorFirstname` VARCHAR(20) NULL,
  `authorLastname` VARCHAR(45) NULL,
  `publishedYear` INT NULL,
  `Members_memberID` INT NOT NULL,
  `bookBorrowed` TINYINT NULL,
  `bookCoverImage` VARCHAR(64) NULL,
  PRIMARY KEY (`bookID`, `Members_memberID`),
  INDEX `fk_Books_Members1_idx` (`Members_memberID` ASC) VISIBLE,
  CONSTRAINT `fk_Books_Members1`
    FOREIGN KEY (`Members_memberID`)
    REFERENCES `BookClub`.`Members` (`memberID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BookClub`.`BooksBorrowed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BookClub`.`BooksBorrowed` (
  `borrowID` INT NOT NULL AUTO_INCREMENT,
  `borrowedDate` DATE NULL,
  `returnedDate` DATE NULL,
  `borrowedDays` INT NULL,
  `Books_bookID` INT NULL,
  PRIMARY KEY (`borrowID`),
  INDEX `fk_BooksBorrowed_Books_idx_idx` (`Books_bookID` ASC) VISIBLE,
  CONSTRAINT `fk_BooksBorrowed_Books_idx`
    FOREIGN KEY (`Books_bookID`)
    REFERENCES `BookClub`.`Books` (`bookID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BookClub`.`BookReviews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `BookClub`.`BookReviews` (
  `reviewID` INT NOT NULL AUTO_INCREMENT,
  `reviewComments` VARCHAR(1024) NULL,
  `commentDateTime` DATETIME NULL,
  `Books_bookID` INT NULL,
  `Members_memberID` INT NULL,
  PRIMARY KEY (`reviewID`),
  INDEX `fk_BookReviews_Books_idx_idx` (`Books_bookID` ASC) VISIBLE,
  INDEX `fk_BookReviews_Member_idx_idx` (`Members_memberID` ASC) VISIBLE,
  CONSTRAINT `fk_BookReviews_Books_idx`
    FOREIGN KEY (`Books_bookID`)
    REFERENCES `BookClub`.`Books` (`bookID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_BookReviews_Member_idx`
    FOREIGN KEY (`Members_memberID`)
    REFERENCES `BookClub`.`Members` (`memberID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
