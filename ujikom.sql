-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table galeri.album
DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `AlbumId` int NOT NULL AUTO_INCREMENT,
  `NamaAlbum` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Deskripsi` text COLLATE utf8mb4_general_ci,
  `TanggalDibuat` date DEFAULT NULL,
  `UserId` int DEFAULT NULL,
  PRIMARY KEY (`AlbumId`),
  KEY `UserId` (`UserId`),
  CONSTRAINT `album_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table galeri.album: ~1 rows (approximately)
INSERT INTO `album` (`AlbumId`, `NamaAlbum`, `Deskripsi`, `TanggalDibuat`, `UserId`) VALUES
	(9, 'tes', '321', '2024-08-22', 46);

-- Dumping structure for table galeri.foto
DROP TABLE IF EXISTS `foto`;
CREATE TABLE IF NOT EXISTS `foto` (
  `FotoId` int NOT NULL AUTO_INCREMENT,
  `JudulFoto` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DeskripsiFoto` text COLLATE utf8mb4_general_ci,
  `TanggalUnggah` date DEFAULT NULL,
  `LokasiFile` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `AlbumId` int DEFAULT NULL,
  `UserId` int DEFAULT NULL,
  PRIMARY KEY (`FotoId`),
  KEY `AlbumId` (`AlbumId`),
  KEY `UserId` (`UserId`),
  CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`AlbumId`) REFERENCES `album` (`AlbumId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table galeri.foto: ~0 rows (approximately)
INSERT INTO `foto` (`FotoId`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumId`, `UserId`) VALUES
	(11, 'Oshi ku', 'oke', '2024-08-22', 'Lana.jpeg', 9, 46);

-- Dumping structure for table galeri.komentarfoto
DROP TABLE IF EXISTS `komentarfoto`;
CREATE TABLE IF NOT EXISTS `komentarfoto` (
  `KomentarId` int NOT NULL AUTO_INCREMENT,
  `FotoId` int DEFAULT NULL,
  `UserId` int DEFAULT NULL,
  `IsiKomentar` text COLLATE utf8mb4_general_ci,
  `TanggalKomentar` date DEFAULT NULL,
  PRIMARY KEY (`KomentarId`),
  KEY `UserId` (`UserId`),
  KEY `FotoId` (`FotoId`),
  CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`FotoId`) REFERENCES `foto` (`FotoId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table galeri.komentarfoto: ~0 rows (approximately)

-- Dumping structure for table galeri.likefoto
DROP TABLE IF EXISTS `likefoto`;
CREATE TABLE IF NOT EXISTS `likefoto` (
  `LikeId` int NOT NULL AUTO_INCREMENT,
  `FotoId` int DEFAULT NULL,
  `UserId` int DEFAULT NULL,
  `TanggalLike` date DEFAULT NULL,
  PRIMARY KEY (`LikeId`),
  KEY `UserId` (`UserId`),
  KEY `FotoId` (`FotoId`),
  CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`FotoId`) REFERENCES `foto` (`FotoId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table galeri.likefoto: ~0 rows (approximately)

-- Dumping structure for table galeri.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NamaLengkap` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Alamat` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table galeri.user: ~4 rows (approximately)
INSERT INTO `user` (`UserId`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
	(43, 'Anda', '$2y$10$g0/IAfYD8vx2H4qKsYfiZORI5IlAXO7KAyeDY3rjDqhmQ/DiU3Itu', 'Anda.com', 'Fergie', 'Jl.1'),
	(44, 'woy', '$2y$10$nkfLxIrXlQuTr5qmkJzIuuL1LGAD5DdzkTrnx8LFGECfDIPzRwIPC', 'woy.com', 'Fergie', 'Jl.1'),
	(45, 'Nanangwoy', '$2y$10$NhWKuD6hpNxp3pmcwid2LOg7EMC0JFHD7DS0ZPO.ELo2yH9OeGu9a', 'Nanangggg.com', 'Fergie', 'Jl.1'),
	(46, 'Fergie', '$2y$10$BvRweKkJ3khAU9mnZB.Z7.qsCO.xKKPMq9Hb/Cg1tYjRxzsHmTvAm', 'ferg.com', 'Fergie', 'Jl.1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
