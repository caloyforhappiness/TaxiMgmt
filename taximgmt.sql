-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema taxidb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema taxidb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `taxidb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `taxidb` ;

-- -----------------------------------------------------
-- Table `taxidb`.`tblCarBrand`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblCarBrand` (
  `strCarBrandId` VARCHAR(255) NOT NULL,
  `strCarBrandName` VARCHAR(255) NOT NULL,
  `strCarBrandDesc` TEXT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`strCarBrandId`),
  UNIQUE INDEX `strCarBrandName_UNIQUE` (`strCarBrandName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblBoundary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblBoundary` (
  `strBoundaryId` VARCHAR(255) NOT NULL,
  `strBoundaryName` VARCHAR(255) NOT NULL,
  `strBoundaryDesc` TEXT NULL,
  `dblBoundaryAmt` DOUBLE NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`strBoundaryId`),
  UNIQUE INDEX `strBoundaryName_UNIQUE` (`strBoundaryName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblBreakBoundary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblBreakBoundary` (
  `strBreakBoundaryId` VARCHAR(255) NOT NULL,
  `strBreakBoundaryName` VARCHAR(255) NOT NULL,
  `dblBreakBoundaryAmt` DOUBLE NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `strBoundaryId` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`strBreakBoundaryId`, `strBoundaryId`),
  UNIQUE INDEX `strBreakBoundaaryName_UNIQUE` (`strBreakBoundaryName` ASC),
  INDEX `fk_tblBreakBoundary_tblBoundary_idx` (`strBoundaryId` ASC),
  CONSTRAINT `fk_tblBreakBoundary_tblBoundary`
    FOREIGN KEY (`strBoundaryId`)
    REFERENCES `taxidb`.`tblBoundary` (`strBoundaryId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tbTaxiOwned`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tbTaxiOwned` (
  `strTaxiOwnedId` VARCHAR(255) NOT NULL,
  `strTaxiOwnedMName` VARCHAR(255) NULL,
  `strTaxiOwnedPNum` VARCHAR(255) NOT NULL,
  `strTaxiOwnedDesc` TEXT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `strCarBrandId` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`strTaxiOwnedId`, `strCarBrandId`),
  UNIQUE INDEX `strTaxiOwnedPNum_UNIQUE` (`strTaxiOwnedPNum` ASC),
  INDEX `fk_tbTaxiOwned_tblCarBrand1_idx` (`strCarBrandId` ASC),
  CONSTRAINT `fk_tbTaxiOwned_tblCarBrand1`
    FOREIGN KEY (`strCarBrandId`)
    REFERENCES `taxidb`.`tblCarBrand` (`strCarBrandId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblShiftTemplate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblShiftTemplate` (
  `strShiftTemplateId` VARCHAR(255) NOT NULL,
  `strShiftTemplateName` VARCHAR(255) NOT NULL,
  `strShiftTemplateDays` VARCHAR(255) NOT NULL,
  `tmShiftTemplateIn` TIME NOT NULL,
  `tblShiftTemplateOut` TIME NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`strShiftTemplateId`),
  UNIQUE INDEX `strShiftTemplateName_UNIQUE` (`strShiftTemplateName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblDriverType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblDriverType` (
  `strDriverTypeId` VARCHAR(255) NOT NULL,
  `strDriverTypeName` VARCHAR(255) NOT NULL,
  `strDriverTypeDesc` TEXT NULL,
  `intDriverTypeAllowedAssign` TINYINT(1) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`strDriverTypeId`),
  UNIQUE INDEX `strDriverTypeName_UNIQUE` (`strDriverTypeName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblDriver`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblDriver` (
  `strDriverId` VARCHAR(255) NOT NULL,
  `strDriverLName` VARCHAR(255) NOT NULL,
  `strDriverFName` VARCHAR(255) NOT NULL,
  `strDriverMName` VARCHAR(255) NULL,
  `strDriverAddBrgy` VARCHAR(255) NOT NULL,
  `strDriverAddSt` VARCHAR(255) NOT NULL,
  `strDriverAddCity` VARCHAR(255) NOT NULL,
  `strDriverLicNo` VARCHAR(255) NOT NULL,
  `strDriverContNo` VARCHAR(255) NOT NULL,
  `strDriverEmail` VARCHAR(255) NOT NULL,
  `strDriverSSSNo` VARCHAR(255) NOT NULL,
  `strDriverBday` DATE NOT NULL,
  `strDriverQRCodeId` VARCHAR(255) NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `strBoundaryId` VARCHAR(255) NOT NULL,
  `strDriverTypeId` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`strDriverId`, `strBoundaryId`, `strDriverTypeId`),
  UNIQUE INDEX `strDriverLicNo_UNIQUE` (`strDriverLicNo` ASC),
  UNIQUE INDEX `strDriverContNo_UNIQUE` (`strDriverContNo` ASC),
  UNIQUE INDEX `strDriverEmail_UNIQUE` (`strDriverEmail` ASC),
  UNIQUE INDEX `stDriverSSSNo_UNIQUE` (`strDriverSSSNo` ASC),
  INDEX `fk_tblDriver_tblBoundary1_idx` (`strBoundaryId` ASC),
  INDEX `fk_tblDriver_tblDriverType1_idx` (`strDriverTypeId` ASC),
  UNIQUE INDEX `strDriverQRCodeId_UNIQUE` (`strDriverQRCodeId` ASC),
  CONSTRAINT `fk_tblDriver_tblBoundary1`
    FOREIGN KEY (`strBoundaryId`)
    REFERENCES `taxidb`.`tblBoundary` (`strBoundaryId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblDriver_tblDriverType1`
    FOREIGN KEY (`strDriverTypeId`)
    REFERENCES `taxidb`.`tblDriverType` (`strDriverTypeId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblDriverTaxi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblDriverTaxi` (
  `tblDriverTaxistrDriverId` VARCHAR(255) NOT NULL,
  `tblDriverTaxiOwnedId` VARCHAR(255) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`tblDriverTaxistrDriverId`, `tblDriverTaxiOwnedId`),
  INDEX `fk_tblDriver_has_tbTaxiOwned_tbTaxiOwned1_idx` (`tblDriverTaxiOwnedId` ASC),
  INDEX `fk_tblDriver_has_tbTaxiOwned_tblDriver1_idx` (`tblDriverTaxistrDriverId` ASC),
  CONSTRAINT `fk_tblDriver_has_tbTaxiOwned_tblDriver1`
    FOREIGN KEY (`tblDriverTaxistrDriverId`)
    REFERENCES `taxidb`.`tblDriver` (`strDriverId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblDriver_has_tbTaxiOwned_tbTaxiOwned1`
    FOREIGN KEY (`tblDriverTaxiOwnedId`)
    REFERENCES `taxidb`.`tbTaxiOwned` (`strTaxiOwnedId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblDriverShift`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblDriverShift` (
  `strDriverShiftId` VARCHAR(255) NOT NULL,
  `tblDriverShiftDriverId` VARCHAR(255) NOT NULL,
  `tblDriverShiftTemplateId` VARCHAR(255) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `tblDriv` VARCHAR(45) NULL,
  PRIMARY KEY (`strDriverShiftId`, `tblDriverShiftDriverId`, `tblDriverShiftTemplateId`),
  INDEX `fk_tblDriver_has_tblShiftTemplate_tblShiftTemplate1_idx` (`tblDriverShiftTemplateId` ASC),
  INDEX `fk_tblDriver_has_tblShiftTemplate_tblDriver1_idx` (`tblDriverShiftDriverId` ASC),
  CONSTRAINT `fk_tblDriver_has_tblShiftTemplate_tblDriver1`
    FOREIGN KEY (`tblDriverShiftDriverId`)
    REFERENCES `taxidb`.`tblDriver` (`strDriverId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblDriver_has_tblShiftTemplate_tblShiftTemplate1`
    FOREIGN KEY (`tblDriverShiftTemplateId`)
    REFERENCES `taxidb`.`tblShiftTemplate` (`strShiftTemplateId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblFeeCharges`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblFeeCharges` (
  `strFeeChargesId` VARCHAR(255) NOT NULL,
  `strFeeChargesName` VARCHAR(255) NOT NULL,
  `strFeeChargesDesc` TEXT NULL,
  `dblFeeChargesAmt` DOUBLE NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`strFeeChargesId`),
  UNIQUE INDEX `strFeeChargesName_UNIQUE` (`strFeeChargesName` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblCompany`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblCompany` (
  `strCompanyId` VARCHAR(255) NOT NULL,
  `strCompanyName` VARCHAR(255) NOT NULL,
  `strCompanyAddress` VARCHAR(255) NOT NULL,
  `strCompanyContNo` VARCHAR(255) NOT NULL,
  `strCompanyLogo` TEXT NULL,
  `strCompanyEmail` VARCHAR(255) NOT NULL,
  `tmCompanyWHFrom` TIME NOT NULL,
  `tmCompanyWHTo` TIME NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`strCompanyId`),
  UNIQUE INDEX `strCompanyName_UNIQUE` (`strCompanyName` ASC),
  UNIQUE INDEX `strCompanyContNo_UNIQUE` (`strCompanyContNo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblTimeIn`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblTimeIn` (
  `strTimeInId` VARCHAR(255) NOT NULL,
  `datTimeIn` DATE NOT NULL,
  `tmTimeIn` TIME NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `strDriverShiftId` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`strTimeInId`, `strDriverShiftId`),
  INDEX `fk_tblTimeIn_tblDriverShift1_idx` (`strDriverShiftId` ASC),
  CONSTRAINT `fk_tblTimeIn_tblDriverShift1`
    FOREIGN KEY (`strDriverShiftId`)
    REFERENCES `taxidb`.`tblDriverShift` (`strDriverShiftId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblAttendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblAttendance` (
  `strAttendanceId` VARCHAR(255) NOT NULL,
  `strDriverId` VARCHAR(255) NOT NULL,
  `datAttendanceDate` VARCHAR(45) NOT NULL,
  `dblBoundaryGiven` DOUBLE NOT NULL,
  `strAttendanceRemarks` TEXT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `strFeeChargesId` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`strAttendanceId`, `strDriverId`, `strFeeChargesId`),
  INDEX `fk_tblTimeIn_has_tblDriver_tblDriver1_idx` (`strDriverId` ASC),
  INDEX `fk_tblAttendance_tblFeeCharges1_idx` (`strFeeChargesId` ASC),
  CONSTRAINT `fk_tblTimeIn_has_tblDriver_tblDriver1`
    FOREIGN KEY (`strDriverId`)
    REFERENCES `taxidb`.`tblDriver` (`strDriverId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblAttendance_tblFeeCharges1`
    FOREIGN KEY (`strFeeChargesId`)
    REFERENCES `taxidb`.`tblFeeCharges` (`strFeeChargesId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblTimeAttendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblTimeAttendance` (
  `strAttendanceId` VARCHAR(255) NOT NULL,
  `strTimeInId` VARCHAR(255) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`strAttendanceId`, `strTimeInId`),
  INDEX `fk_tblTimeIn_has_tblAttendance_tblAttendance1_idx` (`strAttendanceId` ASC),
  INDEX `fk_tblTimeIn_has_tblAttendance_tblTimeIn1_idx` (`strTimeInId` ASC),
  CONSTRAINT `fk_tblTimeIn_has_tblAttendance_tblTimeIn1`
    FOREIGN KEY (`strTimeInId`)
    REFERENCES `taxidb`.`tblTimeIn` (`strTimeInId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblTimeIn_has_tblAttendance_tblAttendance1`
    FOREIGN KEY (`strAttendanceId`)
    REFERENCES `taxidb`.`tblAttendance` (`strAttendanceId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `taxidb`.`tblFund`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `taxidb`.`tblFund` (
  `strFundId` VARCHAR(255) NOT NULL,
  `dblFundAmount` DOUBLE NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `strAttendanceId` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`strFundId`, `strAttendanceId`),
  INDEX `fk_tblFund_tblAttendance1_idx` (`strAttendanceId` ASC),
  CONSTRAINT `fk_tblFund_tblAttendance1`
    FOREIGN KEY (`strAttendanceId`)
    REFERENCES `taxidb`.`tblAttendance` (`strAttendanceId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
