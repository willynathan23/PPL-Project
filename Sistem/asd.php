-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema PPL-PROJECT
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `PPL-PROJECT` ;

-- -----------------------------------------------------
-- Schema PPL-PROJECT
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PPL-PROJECT` DEFAULT CHARACTER SET utf8 ;
USE `PPL-PROJECT` ;

-- -----------------------------------------------------
-- Table `PPL-PROJECT`.`adminTU`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PPL-PROJECT`.`adminTU` (
  `id_admin` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_admin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PPL-PROJECT`.`matkul`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PPL-PROJECT`.`matkul` (
  `kode_matkul` VARCHAR(100) NOT NULL,
  `nama_matkul` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`kode_matkul`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PPL-PROJECT`.`ruangan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PPL-PROJECT`.`ruangan` (
  `kode_ruangan` VARCHAR(100) NOT NULL,
  `nama_ruangan` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`kode_ruangan`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PPL-PROJECT`.`dosen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PPL-PROJECT`.`dosen` (
  `nrp` INT NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`nrp`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PPL-PROJECT`.`semester`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PPL-PROJECT`.`semester` (
  `periode` VARCHAR(100) NOT NULL,
  `jumlah_semester` VARCHAR(45) NULL,
  PRIMARY KEY (`periode`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PPL-PROJECT`.`jadwal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PPL-PROJECT`.`jadwal` (
  `kelas` VARCHAR(100) NOT NULL,
  `matkul_kode_matkul` VARCHAR(100) NOT NULL,
  `dosen_nrp_dosen` INT NOT NULL,
  `semester_periode` VARCHAR(100) NOT NULL,
  `ruangan_kode_ruangan` VARCHAR(100) NOT NULL,
  `tipe` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`kelas`, `matkul_kode_matkul`, `dosen_nrp_dosen`, `semester_periode`, `ruangan_kode_ruangan`),
  INDEX `fk_Jadwal_Matkul_idx` (`matkul_kode_matkul` ASC) ,
  INDEX `fk_Jadwal_Ruangan1_idx` (`ruangan_kode_ruangan` ASC) ,
  INDEX `fk_Jadwal_Dosen1_idx` (`dosen_nrp_dosen` ASC) ,
  INDEX `fk_Jadwal_Semester1_idx` (`semester_periode` ASC) ,
  CONSTRAINT `fk_Jadwal_Matkul`
    FOREIGN KEY (`matkul_kode_matkul`)
    REFERENCES `PPL-PROJECT`.`matkul` (`kode_matkul`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jadwal_Ruangan1`
    FOREIGN KEY (`ruangan_kode_ruangan`)
    REFERENCES `PPL-PROJECT`.`ruangan` (`kode_ruangan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jadwal_Dosen1`
    FOREIGN KEY (`dosen_nrp_dosen`)
    REFERENCES `PPL-PROJECT`.`dosen` (`nrp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jadwal_Semester1`
    FOREIGN KEY (`semester_periode`)
    REFERENCES `PPL-PROJECT`.`semester` (`periode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PPL-PROJECT`.`mahasiswa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PPL-PROJECT`.`mahasiswa` (
  `nrp` INT NOT NULL,
  `nama_mhs` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`nrp`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PPL-PROJECT`.`detail_jadwal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PPL-PROJECT`.`detail_jadwal` (
  `jumlah_pertemuan` INT NOT NULL,
  `jadwal_kelas` VARCHAR(100) NOT NULL,
  `jadwal_matkul_kode_matkul` VARCHAR(100) NOT NULL,
  `jadwal_dosen_nrp_dosen` INT NOT NULL,
  `jadwal_semester_periode` VARCHAR(100) NOT NULL,
  `jadwal_ruangan_kode_ruangan` VARCHAR(100) NOT NULL,
  `tgl_pertemuan` DATE NOT NULL,
  `waktu_mulai` VARCHAR(60) NOT NULL,
  `waktu_selesai` VARCHAR(60) NOT NULL,
  `materi` VARCHAR(255) NOT NULL,
  `gambar` VARCHAR(120) NULL,
  PRIMARY KEY (`jumlah_pertemuan`, `jadwal_kelas`, `jadwal_matkul_kode_matkul`, `jadwal_dosen_nrp_dosen`, `jadwal_semester_periode`, `jadwal_ruangan_kode_ruangan`),
  INDEX `fk_detail_jadwal_jadwal1_idx` (`jadwal_kelas` ASC, `jadwal_matkul_kode_matkul` ASC, `jadwal_dosen_nrp_dosen` ASC, `jadwal_semester_periode` ASC, `jadwal_ruangan_kode_ruangan` ASC) ,
  CONSTRAINT `fk_detail_jadwal_jadwal1`
    FOREIGN KEY (`jadwal_kelas` , `jadwal_matkul_kode_matkul` , `jadwal_dosen_nrp_dosen` , `jadwal_semester_periode` , `jadwal_ruangan_kode_ruangan`)
    REFERENCES `PPL-PROJECT`.`jadwal` (`kelas` , `matkul_kode_matkul` , `dosen_nrp_dosen` , `semester_periode` , `ruangan_kode_ruangan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PPL-PROJECT`.`asisten`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PPL-PROJECT`.`asisten` (
  `pertemuan` VARCHAR(45) NOT NULL,
  `jadwal_kelas` VARCHAR(100) NOT NULL,
  `jadwal_matkul_kode_matkul` VARCHAR(100) NOT NULL,
  `jadwal_dosen_nrp_dosen` INT NOT NULL,
  `jadwal_semester_periode` VARCHAR(100) NOT NULL,
  `mahasiswa_nrp` INT NOT NULL,
  `total_jam` INT NOT NULL,
  `tgl_pertemuan` DATE NOT NULL,
  PRIMARY KEY (`pertemuan`, `jadwal_kelas`, `jadwal_matkul_kode_matkul`, `jadwal_dosen_nrp_dosen`, `jadwal_semester_periode`, `mahasiswa_nrp`),
  INDEX `fk_jadwal_has_mahasiswa_mahasiswa1_idx` (`mahasiswa_nrp` ASC) ,
  INDEX `fk_jadwal_has_mahasiswa_jadwal1_idx` (`jadwal_kelas` ASC, `jadwal_matkul_kode_matkul` ASC, `jadwal_dosen_nrp_dosen` ASC, `jadwal_semester_periode` ASC) ,
  CONSTRAINT `fk_jadwal_has_mahasiswa_jadwal1`
    FOREIGN KEY (`jadwal_kelas` , `jadwal_matkul_kode_matkul` , `jadwal_dosen_nrp_dosen` , `jadwal_semester_periode`)
    REFERENCES `PPL-PROJECT`.`jadwal` (`kelas` , `matkul_kode_matkul` , `dosen_nrp_dosen` , `semester_periode`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jadwal_has_mahasiswa_mahasiswa1`
    FOREIGN KEY (`mahasiswa_nrp`)
    REFERENCES `PPL-PROJECT`.`mahasiswa` (`nrp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `PPL-PROJECT`.`adminTU`
-- -----------------------------------------------------
START TRANSACTION;
USE `PPL-PROJECT`;
INSERT INTO `PPL-PROJECT`.`adminTU` (`id_admin`, `password`) VALUES ('admin', '827ccb0eea8a706c4c34a16891f84e7b');

COMMIT;


-- -----------------------------------------------------
-- Data for table `PPL-PROJECT`.`matkul`
-- -----------------------------------------------------
START TRANSACTION;
USE `PPL-PROJECT`;
INSERT INTO `PPL-PROJECT`.`matkul` (`kode_matkul`, `nama_matkul`) VALUES ('IN254', 'Proyek Perangkat Lunak');
INSERT INTO `PPL-PROJECT`.`matkul` (`kode_matkul`, `nama_matkul`) VALUES ('IN220', 'Dasar Pemrograman');

COMMIT;


-- -----------------------------------------------------
-- Data for table `PPL-PROJECT`.`ruangan`
-- -----------------------------------------------------
START TRANSACTION;
USE `PPL-PROJECT`;
INSERT INTO `PPL-PROJECT`.`ruangan` (`kode_ruangan`, `nama_ruangan`) VALUES ('Adv 3', 'Lab Adv 3');
INSERT INTO `PPL-PROJECT`.`ruangan` (`kode_ruangan`, `nama_ruangan`) VALUES ('Adv 4', 'Lab Adv 4');

COMMIT;


-- -----------------------------------------------------
-- Data for table `PPL-PROJECT`.`dosen`
-- -----------------------------------------------------
START TRANSACTION;
USE `PPL-PROJECT`;
INSERT INTO `PPL-PROJECT`.`dosen` (`nrp`, `nama`, `password`) VALUES (720307, 'Robby Tan', '827ccb0eea8a706c4c34a16891f84e7b');
INSERT INTO `PPL-PROJECT`.`dosen` (`nrp`, `nama`, `password`) VALUES (720004, 'Ir Teddy Marcus', '827ccb0eea8a706c4c34a16891f84e7b');

COMMIT;


-- -----------------------------------------------------
-- Data for table `PPL-PROJECT`.`semester`
-- -----------------------------------------------------
START TRANSACTION;
USE `PPL-PROJECT`;
INSERT INTO `PPL-PROJECT`.`semester` (`periode`, `jumlah_semester`) VALUES ('2022 Ganjil', '');
INSERT INTO `PPL-PROJECT`.`semester` (`periode`, `jumlah_semester`) VALUES ('2023 Genap', NULL);
INSERT INTO `PPL-PROJECT`.`semester` (`periode`, `jumlah_semester`) VALUES ('2023 Ganjil', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `PPL-PROJECT`.`jadwal`
-- -----------------------------------------------------
START TRANSACTION;
USE `PPL-PROJECT`;
INSERT INTO `PPL-PROJECT`.`jadwal` (`kelas`, `matkul_kode_matkul`, `dosen_nrp_dosen`, `semester_periode`, `ruangan_kode_ruangan`, `tipe`) VALUES ('A', 'IN254', 720307, '2022 Ganjil', 'Adv 3', 'Teori');
INSERT INTO `PPL-PROJECT`.`jadwal` (`kelas`, `matkul_kode_matkul`, `dosen_nrp_dosen`, `semester_periode`, `ruangan_kode_ruangan`, `tipe`) VALUES ('B', 'IN254', 720307, '2022 Ganjil', 'Adv 3', 'Teori');

COMMIT;


-- -----------------------------------------------------
-- Data for table `PPL-PROJECT`.`mahasiswa`
-- -----------------------------------------------------
START TRANSACTION;
USE `PPL-PROJECT`;
INSERT INTO `PPL-PROJECT`.`mahasiswa` (`nrp`, `nama_mhs`) VALUES (2072018, 'Desika Candra');
INSERT INTO `PPL-PROJECT`.`mahasiswa` (`nrp`, `nama_mhs`) VALUES (2072037, 'Willy Nathanael');
INSERT INTO `PPL-PROJECT`.`mahasiswa` (`nrp`, `nama_mhs`) VALUES (2072014, 'Joepds');
INSERT INTO `PPL-PROJECT`.`mahasiswa` (`nrp`, `nama_mhs`) VALUES (2072032, 'Devin');

COMMIT;


-- -----------------------------------------------------
-- Data for table `PPL-PROJECT`.`detail_jadwal`
-- -----------------------------------------------------
START TRANSACTION;
USE `PPL-PROJECT`;
INSERT INTO `PPL-PROJECT`.`detail_jadwal` (`jumlah_pertemuan`, `jadwal_kelas`, `jadwal_matkul_kode_matkul`, `jadwal_dosen_nrp_dosen`, `jadwal_semester_periode`, `jadwal_ruangan_kode_ruangan`, `tgl_pertemuan`, `waktu_mulai`, `waktu_selesai`, `materi`, `gambar`) VALUES (1, 'A', 'IN254', 720307, '2022 Ganjil', 'Adv 3', '2022-10-20', '15:00', '17:00', 'Materi ', NULL);
INSERT INTO `PPL-PROJECT`.`detail_jadwal` (`jumlah_pertemuan`, `jadwal_kelas`, `jadwal_matkul_kode_matkul`, `jadwal_dosen_nrp_dosen`, `jadwal_semester_periode`, `jadwal_ruangan_kode_ruangan`, `tgl_pertemuan`, `waktu_mulai`, `waktu_selesai`, `materi`, `gambar`) VALUES (1, 'B', 'IN254', 720307, '2022 Ganjil', 'Adv 3', '2022-10-23', '13.00', '15.00', 'Materi', NULL);
INSERT INTO `PPL-PROJECT`.`detail_jadwal` (`jumlah_pertemuan`, `jadwal_kelas`, `jadwal_matkul_kode_matkul`, `jadwal_dosen_nrp_dosen`, `jadwal_semester_periode`, `jadwal_ruangan_kode_ruangan`, `tgl_pertemuan`, `waktu_mulai`, `waktu_selesai`, `materi`, `gambar`) VALUES (2, 'A', 'IN254', 720307, '2022 Ganjil', 'Adv 3', '2022-10-27', '15.00', '17.00', 'Materi', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `PPL-PROJECT`.`asisten`
-- -----------------------------------------------------
START TRANSACTION;
USE `PPL-PROJECT`;
INSERT INTO `PPL-PROJECT`.`asisten` (`pertemuan`, `jadwal_kelas`, `jadwal_matkul_kode_matkul`, `jadwal_dosen_nrp_dosen`, `jadwal_semester_periode`, `mahasiswa_nrp`, `total_jam`, `tgl_pertemuan`) VALUES ('1', 'A', 'IN254', 720307, '2022 Ganjil', 2072018, 2, '2022-10-20');

COMMIT;

