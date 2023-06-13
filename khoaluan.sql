-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for khoaluan
CREATE DATABASE IF NOT EXISTS `khoaluan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `khoaluan`;

-- Dumping structure for table khoaluan.canbo
CREATE TABLE IF NOT EXISTS `canbo` (
  `id_canbo` int(11) NOT NULL AUTO_INCREMENT,
  `ma_canbo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_canbo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `ngaysinh` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai1` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachithuongtru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_donvi` int(11) NOT NULL,
  `id_trinhdo` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `id_phan_loai` int(11) NOT NULL,
  `ngay_vao_lam` date NOT NULL,
  PRIMARY KEY (`id_canbo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.canbo: ~4 rows (approximately)
INSERT INTO `canbo` (`id_canbo`, `ma_canbo`, `ten_canbo`, `gioitinh`, `ngaysinh`, `email`, `sodienthoai1`, `diachithuongtru`, `id_donvi`, `id_trinhdo`, `id_taikhoan`, `id_phan_loai`, `ngay_vao_lam`) VALUES
	(4, 'H4', 'Nguyễn Thi A', 0, '1999-04-23', 'nguyethia@gmail.com', '0385478541', 'Cần Thơ.', 0, 7, 0, 1, '0000-00-00'),
	(7, 'NVA', 'Nguyễn Văn A', 0, '1998-01-29', 'nguyenvana@gmail.com', '0368524257', 'Cái Răng', 0, 7, 0, 1, '2023-03-01'),
	(9, 'a', 'aaa', 0, '2023-06-06', 'aa@gmail.com', 'aaaaaaaaaa', 'aaaâ', 0, 7, 0, 1, '2023-06-06'),
	(11, 'a', 'a', 0, '1212-12-12', 'a@a', '11', 'Cần Thơ', 0, 7, 0, 1, '0000-00-00'),
	(12, 'HH', 'Huỳnh Huy', 1, '2000-05-02', 'anhhuyckth@gmail.com', '0358541247', 'Cần Thơ', 0, 7, 0, 1, '2023-01-01');

-- Dumping structure for table khoaluan.congviec
CREATE TABLE IF NOT EXISTS `congviec` (
  `ma_cv` int(11) NOT NULL AUTO_INCREMENT,
  `ten_cv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dieukien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quydoisotiet` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `ghichu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_cv`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.congviec: ~2 rows (approximately)
INSERT INTO `congviec` (`ma_cv`, `ten_cv`, `dieukien`, `quydoisotiet`, `soluong`, `ghichu`) VALUES
	(0, 'Tự luận', '1', 1, 1, 'ádá'),
	(5, 'Trắc Nghiệm', '1', 1, 1, '1');

-- Dumping structure for table khoaluan.donvi
CREATE TABLE IF NOT EXISTS `donvi` (
  `id_donvi` int(11) NOT NULL AUTO_INCREMENT,
  `ma_donvi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_donvi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_donvi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.donvi: ~1 rows (approximately)
INSERT INTO `donvi` (`id_donvi`, `ma_donvi`, `ten_donvi`, `mota`) VALUES
	(0, 'TDU', 'Tây Đô Univers', 'aaainnn'),
	(4, 'CTU', 'Cần Thơ University', 'Đại học Cần Thơ');

-- Dumping structure for table khoaluan.giangday
CREATE TABLE IF NOT EXISTS `giangday` (
  `ma_giangday` int(11) NOT NULL AUTO_INCREMENT,
  `sosv` int(10) NOT NULL,
  `sonhom` int(10) NOT NULL,
  `sotietmonhoc` int(10) NOT NULL,
  `sotietthucgiang` int(10) NOT NULL,
  `hesolop` int(10) NOT NULL,
  `hesotinchi` int(10) NOT NULL,
  `tenloai` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ma_giangday`),
  KEY `FK_giangday_loaigiangday` (`tenloai`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.giangday: ~2 rows (approximately)
INSERT INTO `giangday` (`ma_giangday`, `sosv`, `sonhom`, `sotietmonhoc`, `sotietthucgiang`, `hesolop`, `hesotinchi`, `tenloai`) VALUES
	(10, 2, 2, 2, 2, 2, 2, 'Lý Thuyết'),
	(12, 1, 1, 1, 11, 1, 11, 'Thực Hành, Thực Tập');

-- Dumping structure for table khoaluan.giangvien
CREATE TABLE IF NOT EXISTS `giangvien` (
  `id_giangvien` int(11) NOT NULL AUTO_INCREMENT,
  `ma_giangvien` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_giangvien` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `ngaysinh` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai1` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachithuongtru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_trinhdo` int(11) NOT NULL,
  `id_donvi` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  PRIMARY KEY (`id_giangvien`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.giangvien: ~4 rows (approximately)
INSERT INTO `giangvien` (`id_giangvien`, `ma_giangvien`, `ten_giangvien`, `gioitinh`, `ngaysinh`, `email`, `sodienthoai1`, `diachithuongtru`, `id_trinhdo`, `id_donvi`, `id_taikhoan`) VALUES
	(0, 'NTH01', 'Nguyễn Thị H', 0, '2023-03-17', 'nguyenthih@gmail.com', '0326597955', 'Cần Thơ', 0, 0, 0),
	(4, 'NTH01', 'Nguyễn Thị Hà', 0, '1212-12-12', 'anhhuyckth@gmail.com', '0325874596', 'sacscasac', 0, 0, 0),
	(5, 'NVH01', 'Nguyễn Văn Hai', 1, '1212-12-12', 'anhhuyckth@gmail.com', '131231', 'Kiên Giang', 0, 4, 0),
	(10, 'NTHT', 'Nguyễn Thị Huyền Trân', 0, '1998-02-25', 'nthtran@gmai.com', '038522457', 'Cầu Kè, Trà Vinh', 3, 4, 0);

-- Dumping structure for table khoaluan.indexcount
CREATE TABLE IF NOT EXISTS `indexcount` (
  `id_index` int(11) NOT NULL AUTO_INCREMENT,
  `ten_index` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ghi_chu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `so_ngay_hoat_dong` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_index`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.indexcount: ~2 rows (approximately)
INSERT INTO `indexcount` (`id_index`, `ten_index`, `ghi_chu`, `ngay_bat_dau`, `ngay_ket_thuc`, `so_ngay_hoat_dong`) VALUES
	(2, 'đợt 1', 'ccccc', '2023-04-04', '2023-05-06', 30),
	(7, 'đợt 2', 'â', '2023-05-07', '2023-06-11', 30);

-- Dumping structure for table khoaluan.khoahoc
CREATE TABLE IF NOT EXISTS `khoahoc` (
  `id_khoahoc` int(11) NOT NULL AUTO_INCREMENT,
  `ten_khoahoc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_khoahoc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.khoahoc: ~2 rows (approximately)
INSERT INTO `khoahoc` (`id_khoahoc`, `ten_khoahoc`, `mota`) VALUES
	(0, 'Lập Trình', 'codee'),
	(2, 'Quản Trị Kinh Doanh', 'QTKD');

-- Dumping structure for table khoaluan.kpi
CREATE TABLE IF NOT EXISTS `kpi` (
  `id_kpi` int(11) NOT NULL AUTO_INCREMENT,
  `id_nhom_kpi` int(11) NOT NULL DEFAULT 0,
  `ten_kpi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `don_vi_cb` float NOT NULL DEFAULT 0,
  `he_so_tc` float NOT NULL DEFAULT 0,
  `ghi_chu_kpi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kpi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.kpi: ~4 rows (approximately)
INSERT INTO `kpi` (`id_kpi`, `id_nhom_kpi`, `ten_kpi`, `don_vi_cb`, `he_so_tc`, `ghi_chu_kpi`) VALUES
	(3, 5, 'Hướng dẫn thực tập', 1, 2, 'aabbbcc'),
	(4, 6, 'Tự Luận', 1, 1, 'a'),
	(5, 6, 'Trắc Nghiệm', 1, 1, 'a'),
	(6, 7, 'Coi thi học kỳ', 1, 0.65, 'a'),
	(7, 8, 'Chấm bài', 1, 0.0625, 'a');

-- Dumping structure for table khoaluan.loaigiangday
CREATE TABLE IF NOT EXISTS `loaigiangday` (
  `ma_loaigiangday` int(11) NOT NULL AUTO_INCREMENT,
  `ten_loaigiangday` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_loaigiangday`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.loaigiangday: ~2 rows (approximately)
INSERT INTO `loaigiangday` (`ma_loaigiangday`, `ten_loaigiangday`) VALUES
	(1, 'Lý Thuyết'),
	(2, 'Thực Hành, Thực Tập');

-- Dumping structure for table khoaluan.lophoc
CREATE TABLE IF NOT EXISTS `lophoc` (
  `id_lophoc` int(11) NOT NULL AUTO_INCREMENT,
  `ten_lophoc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_khoahoc` int(11) NOT NULL,
  `id_nganhhoc` int(11) NOT NULL,
  PRIMARY KEY (`id_lophoc`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.lophoc: ~2 rows (approximately)
INSERT INTO `lophoc` (`id_lophoc`, `ten_lophoc`, `mota`, `id_khoahoc`, `id_nganhhoc`) VALUES
	(12, 'QTKD.', 'Quản Trị Kinh Doanh', 2, 4),
	(14, 'CNTT 14', 'Công nghệ thông tin 14', 0, 3);

-- Dumping structure for table khoaluan.luong
CREATE TABLE IF NOT EXISTS `luong` (
  `id_luong` int(11) NOT NULL AUTO_INCREMENT,
  `id_index` int(11) NOT NULL,
  `id_canbo` int(11) NOT NULL,
  `ten_canbo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `gioi_tinh` tinyint(4) NOT NULL DEFAULT 0,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `so_dien_thoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ngay_vao_lam` date NOT NULL,
  `phan_loai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `trinh_do` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `id_kpi` int(11) NOT NULL,
  `ten_kpi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `don_vi_cb` float NOT NULL DEFAULT 0,
  `he_so_thuc` float NOT NULL DEFAULT 0,
  `thanh_tien` float NOT NULL DEFAULT 0,
  `ghi_chu_luong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_ngay_vang` float NOT NULL,
  PRIMARY KEY (`id_luong`)
) ENGINE=InnoDB AUTO_INCREMENT=543 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.luong: ~50 rows (approximately)
INSERT INTO `luong` (`id_luong`, `id_index`, `id_canbo`, `ten_canbo`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `so_dien_thoai`, `ngay_vao_lam`, `phan_loai`, `trinh_do`, `id_kpi`, `ten_kpi`, `don_vi_cb`, `he_so_thuc`, `thanh_tien`, `ghi_chu_luong`, `so_ngay_vang`) VALUES
	(493, 2, 4, 'Nguyễn Thi A', 0, '1999-04-23', 'Cần Thơ.', '0385478541', '0000-00-00', 'Tốt', 'Tốt', 3, 'Hướng dẫn thực tập', 1, 2, 2, '', 0),
	(494, 2, 4, 'Nguyễn Thi A', 0, '1999-04-23', 'Cần Thơ.', '0385478541', '0000-00-00', 'Tốt', 'Tốt', 4, 'Tự Luận', 1, 1, 1, '', 0),
	(495, 2, 4, 'Nguyễn Thi A', 0, '1999-04-23', 'Cần Thơ.', '0385478541', '0000-00-00', 'Tốt', 'Tốt', 5, 'Trắc Nghiệm', 1, 1, 1, '', 0),
	(496, 2, 4, 'Nguyễn Thi A', 0, '1999-04-23', 'Cần Thơ.', '0385478541', '0000-00-00', 'Tốt', 'Tốt', 6, 'Coi thi học kỳ', 1, 0.65, 0.65, '', 0),
	(497, 2, 4, 'Nguyễn Thi A', 0, '1999-04-23', 'Cần Thơ.', '0385478541', '0000-00-00', 'Tốt', 'Tốt', 7, 'Chấm bài', 1, 0.0625, 0.0625, '', 0),
	(498, 2, 7, 'Nguyễn Văn A', 0, '1998-01-29', 'Cái Răng', '0368524257', '2023-03-01', 'Tốt', 'Tốt', 3, 'Hướng dẫn thực tập', 50000, 2, 100000, '', 0),
	(499, 2, 7, 'Nguyễn Văn A', 0, '1998-01-29', 'Cái Răng', '0368524257', '2023-03-01', 'Tốt', 'Tốt', 4, 'Tự Luận', 1, 1, 1, '', 0),
	(500, 2, 7, 'Nguyễn Văn A', 0, '1998-01-29', 'Cái Răng', '0368524257', '2023-03-01', 'Tốt', 'Tốt', 5, 'Trắc Nghiệm', 1, 1, 1, '', 0),
	(501, 2, 7, 'Nguyễn Văn A', 0, '1998-01-29', 'Cái Răng', '0368524257', '2023-03-01', 'Tốt', 'Tốt', 6, 'Coi thi học kỳ', 1, 0.65, 0.65, '', 0),
	(502, 2, 7, 'Nguyễn Văn A', 0, '1998-01-29', 'Cái Răng', '0368524257', '2023-03-01', 'Tốt', 'Tốt', 7, 'Chấm bài', 1, 0.0625, 0.0625, '', 0),
	(503, 2, 9, 'aaa', 0, '2023-06-06', 'aaaâ', 'aaaaaaaaaa', '2023-06-06', 'Tốt', 'Tốt', 3, 'Hướng dẫn thực tập', 1, 2, 0, '', -1),
	(504, 2, 9, 'aaa', 0, '2023-06-06', 'aaaâ', 'aaaaaaaaaa', '2023-06-06', 'Tốt', 'Tốt', 4, 'Tự Luận', 1, 1, 0, '', -1),
	(505, 2, 9, 'aaa', 0, '2023-06-06', 'aaaâ', 'aaaaaaaaaa', '2023-06-06', 'Tốt', 'Tốt', 5, 'Trắc Nghiệm', 1, 1, 0, '', -1),
	(506, 2, 9, 'aaa', 0, '2023-06-06', 'aaaâ', 'aaaaaaaaaa', '2023-06-06', 'Tốt', 'Tốt', 6, 'Coi thi học kỳ', 1, 0.65, 0, '', -1),
	(507, 2, 9, 'aaa', 0, '2023-06-06', 'aaaâ', 'aaaaaaaaaa', '2023-06-06', 'Tốt', 'Tốt', 7, 'Chấm bài', 1, 0.0625, 0, '', -1),
	(508, 2, 11, 'a', 0, '1212-12-12', 'Cần Thơ', '11', '0000-00-00', 'Tốt', 'Tốt', 3, 'Hướng dẫn thực tập', 1, 2, 0, '', -1),
	(509, 2, 11, 'a', 0, '1212-12-12', 'Cần Thơ', '11', '0000-00-00', 'Tốt', 'Tốt', 4, 'Tự Luận', 1, 1, 0, '', -1),
	(510, 2, 11, 'a', 0, '1212-12-12', 'Cần Thơ', '11', '0000-00-00', 'Tốt', 'Tốt', 5, 'Trắc Nghiệm', 1, 1, 0, '', -1),
	(511, 2, 11, 'a', 0, '1212-12-12', 'Cần Thơ', '11', '0000-00-00', 'Tốt', 'Tốt', 6, 'Coi thi học kỳ', 1, 0.65, 0, '', -1),
	(512, 2, 11, 'a', 0, '1212-12-12', 'Cần Thơ', '11', '0000-00-00', 'Tốt', 'Tốt', 7, 'Chấm bài', 1, 0.0625, 0, '', -1),
	(513, 2, 12, 'Huỳnh Huy', 1, '2000-05-02', 'Cần Thơ', '0358541247', '2023-01-01', 'Tốt', 'Tốt', 3, 'Hướng dẫn thực tập', 1, 2, 0, '', -1),
	(514, 2, 12, 'Huỳnh Huy', 1, '2000-05-02', 'Cần Thơ', '0358541247', '2023-01-01', 'Tốt', 'Tốt', 4, 'Tự Luận', 1, 1, 0, '', -1),
	(515, 2, 12, 'Huỳnh Huy', 1, '2000-05-02', 'Cần Thơ', '0358541247', '2023-01-01', 'Tốt', 'Tốt', 5, 'Trắc Nghiệm', 1, 1, 0, '', -1),
	(516, 2, 12, 'Huỳnh Huy', 1, '2000-05-02', 'Cần Thơ', '0358541247', '2023-01-01', 'Tốt', 'Tốt', 6, 'Coi thi học kỳ', 1, 0.65, 0, '', -1),
	(517, 2, 12, 'Huỳnh Huy', 1, '2000-05-02', 'Cần Thơ', '0358541247', '2023-01-01', 'Tốt', 'Tốt', 7, 'Chấm bài', 1, 0.0625, 0, '', -1),
	(518, 7, 4, 'Nguyễn Thi A', 0, '1999-04-23', 'Cần Thơ.', '0385478541', '0000-00-00', 'Tốt', 'Tốt', 3, 'Hướng dẫn thực tập', 1, 2, 0, '', -1),
	(519, 7, 4, 'Nguyễn Thi A', 0, '1999-04-23', 'Cần Thơ.', '0385478541', '0000-00-00', 'Tốt', 'Tốt', 4, 'Tự Luận', 1, 1, 0, '', -1),
	(520, 7, 4, 'Nguyễn Thi A', 0, '1999-04-23', 'Cần Thơ.', '0385478541', '0000-00-00', 'Tốt', 'Tốt', 5, 'Trắc Nghiệm', 1, 1, 0, '', -1),
	(521, 7, 4, 'Nguyễn Thi A', 0, '1999-04-23', 'Cần Thơ.', '0385478541', '0000-00-00', 'Tốt', 'Tốt', 6, 'Coi thi học kỳ', 1, 0.65, 0, '', -1),
	(522, 7, 4, 'Nguyễn Thi A', 0, '1999-04-23', 'Cần Thơ.', '0385478541', '0000-00-00', 'Tốt', 'Tốt', 7, 'Chấm bài', 1, 0.0625, 0, '', -1),
	(523, 7, 7, 'Nguyễn Văn A', 0, '1998-01-29', 'Cái Răng', '0368524257', '2023-03-01', 'Tốt', 'Tốt', 3, 'Hướng dẫn thực tập', 1, 2, 0, '', -1),
	(524, 7, 7, 'Nguyễn Văn A', 0, '1998-01-29', 'Cái Răng', '0368524257', '2023-03-01', 'Tốt', 'Tốt', 4, 'Tự Luận', 1, 1, 0, '', -1),
	(525, 7, 7, 'Nguyễn Văn A', 0, '1998-01-29', 'Cái Răng', '0368524257', '2023-03-01', 'Tốt', 'Tốt', 5, 'Trắc Nghiệm', 1, 1, 0, '', -1),
	(526, 7, 7, 'Nguyễn Văn A', 0, '1998-01-29', 'Cái Răng', '0368524257', '2023-03-01', 'Tốt', 'Tốt', 6, 'Coi thi học kỳ', 1, 0.65, 0, '', -1),
	(527, 7, 7, 'Nguyễn Văn A', 0, '1998-01-29', 'Cái Răng', '0368524257', '2023-03-01', 'Tốt', 'Tốt', 7, 'Chấm bài', 1, 0.0625, 0, '', -1),
	(528, 7, 9, 'aaa', 0, '2023-06-06', 'aaaâ', 'aaaaaaaaaa', '2023-06-06', 'Tốt', 'Tốt', 3, 'Hướng dẫn thực tập', 1, 2, 0, '', -1),
	(529, 7, 9, 'aaa', 0, '2023-06-06', 'aaaâ', 'aaaaaaaaaa', '2023-06-06', 'Tốt', 'Tốt', 4, 'Tự Luận', 1, 1, 0, '', -1),
	(530, 7, 9, 'aaa', 0, '2023-06-06', 'aaaâ', 'aaaaaaaaaa', '2023-06-06', 'Tốt', 'Tốt', 5, 'Trắc Nghiệm', 1, 1, 0, '', -1),
	(531, 7, 9, 'aaa', 0, '2023-06-06', 'aaaâ', 'aaaaaaaaaa', '2023-06-06', 'Tốt', 'Tốt', 6, 'Coi thi học kỳ', 1, 0.65, 0, '', -1),
	(532, 7, 9, 'aaa', 0, '2023-06-06', 'aaaâ', 'aaaaaaaaaa', '2023-06-06', 'Tốt', 'Tốt', 7, 'Chấm bài', 1, 0.0625, 0, '', -1),
	(533, 7, 11, 'a', 0, '1212-12-12', 'Cần Thơ', '11', '0000-00-00', 'Tốt', 'Tốt', 3, 'Hướng dẫn thực tập', 1, 2, 0, '', -1),
	(534, 7, 11, 'a', 0, '1212-12-12', 'Cần Thơ', '11', '0000-00-00', 'Tốt', 'Tốt', 4, 'Tự Luận', 1, 1, 0, '', -1),
	(535, 7, 11, 'a', 0, '1212-12-12', 'Cần Thơ', '11', '0000-00-00', 'Tốt', 'Tốt', 5, 'Trắc Nghiệm', 1, 1, 0, '', -1),
	(536, 7, 11, 'a', 0, '1212-12-12', 'Cần Thơ', '11', '0000-00-00', 'Tốt', 'Tốt', 6, 'Coi thi học kỳ', 1, 0.65, 0, '', -1),
	(537, 7, 11, 'a', 0, '1212-12-12', 'Cần Thơ', '11', '0000-00-00', 'Tốt', 'Tốt', 7, 'Chấm bài', 1, 0.0625, 0, '', -1),
	(538, 7, 12, 'Huỳnh Huy', 1, '2000-05-02', 'Cần Thơ', '0358541247', '2023-01-01', 'Tốt', 'Tốt', 3, 'Hướng dẫn thực tập', 1, 2, 0, '', -1),
	(539, 7, 12, 'Huỳnh Huy', 1, '2000-05-02', 'Cần Thơ', '0358541247', '2023-01-01', 'Tốt', 'Tốt', 4, 'Tự Luận', 1, 1, 0, '', -1),
	(540, 7, 12, 'Huỳnh Huy', 1, '2000-05-02', 'Cần Thơ', '0358541247', '2023-01-01', 'Tốt', 'Tốt', 5, 'Trắc Nghiệm', 1, 1, 0, '', -1),
	(541, 7, 12, 'Huỳnh Huy', 1, '2000-05-02', 'Cần Thơ', '0358541247', '2023-01-01', 'Tốt', 'Tốt', 6, 'Coi thi học kỳ', 1, 0.65, 0, '', -1),
	(542, 7, 12, 'Huỳnh Huy', 1, '2000-05-02', 'Cần Thơ', '0358541247', '2023-01-01', 'Tốt', 'Tốt', 7, 'Chấm bài', 1, 0.0625, 0, '', -1);

-- Dumping structure for table khoaluan.nganhhoc
CREATE TABLE IF NOT EXISTS `nganhhoc` (
  `id_nganhhoc` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nganhhoc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_nganhhoc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.nganhhoc: ~1 rows (approximately)
INSERT INTO `nganhhoc` (`id_nganhhoc`, `ten_nganhhoc`, `mota`) VALUES
	(3, 'CNTT14', 'công nghệ thông tin 14'),
	(4, 'Quản Trị Kinh Doanh', 'QTKD');

-- Dumping structure for table khoaluan.nghiencuukhahoc
CREATE TABLE IF NOT EXISTS `nghiencuukhahoc` (
  `ma_nckh` int(11) NOT NULL AUTO_INCREMENT,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `theloai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sogio` int(11) NOT NULL,
  PRIMARY KEY (`ma_nckh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.nghiencuukhahoc: ~0 rows (approximately)

-- Dumping structure for table khoaluan.nhanvien
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `id_nhanvien` int(11) NOT NULL AUTO_INCREMENT,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0,
  `id_canbo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nhanvien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.nhanvien: ~0 rows (approximately)

-- Dumping structure for table khoaluan.nhomcongviec
CREATE TABLE IF NOT EXISTS `nhomcongviec` (
  `ma_nhomcv` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nhomcv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_cv` int(11) NOT NULL,
  PRIMARY KEY (`ma_nhomcv`),
  KEY `ma_cv` (`ma_cv`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.nhomcongviec: ~2 rows (approximately)
INSERT INTO `nhomcongviec` (`ma_nhomcv`, `ten_nhomcv`, `ma_cv`) VALUES
	(28, 'Hướng dẫn thực tập', 0),
	(29, 'Hướng dẫn thực tập', 5),
	(30, 'aaa', 7);

-- Dumping structure for table khoaluan.nhomkpi
CREATE TABLE IF NOT EXISTS `nhomkpi` (
  `id_nhom_kpi` int(11) NOT NULL AUTO_INCREMENT,
  `ten_nhom_kpi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_nhom_kpi`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.nhomkpi: ~4 rows (approximately)
INSERT INTO `nhomkpi` (`id_nhom_kpi`, `ten_nhom_kpi`, `ghi_chu`) VALUES
	(5, 'Hướng dẫn thực tập', 'aaabbb'),
	(6, 'Ra đề', 'aaa'),
	(7, 'Coi thi', 'aaa'),
	(8, 'Chấm bài', 'aaaa');

-- Dumping structure for table khoaluan.phanloai
CREATE TABLE IF NOT EXISTS `phanloai` (
  `id_phan_loai` int(11) NOT NULL AUTO_INCREMENT,
  `ten_phan_loai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_phan_loai`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.phanloai: ~0 rows (approximately)
INSERT INTO `phanloai` (`id_phan_loai`, `ten_phan_loai`, `ghi_chu`) VALUES
	(1, 'Tốt', 'aâ');

-- Dumping structure for table khoaluan.phannhom
CREATE TABLE IF NOT EXISTS `phannhom` (
  `id_phannhom` int(11) NOT NULL AUTO_INCREMENT,
  `ten_phannhom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_phannhom`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.phannhom: ~1 rows (approximately)
INSERT INTO `phannhom` (`id_phannhom`, `ten_phannhom`, `mota`) VALUES
	(1, 'Nhóm 1', '1');

-- Dumping structure for table khoaluan.phanquyen
CREATE TABLE IF NOT EXISTS `phanquyen` (
  `id_phanquyen` int(11) NOT NULL AUTO_INCREMENT,
  `ten_phanquyen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_phanquyen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.phanquyen: ~1 rows (approximately)
INSERT INTO `phanquyen` (`id_phanquyen`, `ten_phanquyen`, `mota`) VALUES
	(1, 'Admin', 'ad');

-- Dumping structure for table khoaluan.sinhvien
CREATE TABLE IF NOT EXISTS `sinhvien` (
  `id_sinhvien` int(11) NOT NULL AUTO_INCREMENT,
  `ma_sinhvien` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_sinhvien` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `ngaysinh` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachithuongtru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai1` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lophoc` int(11) NOT NULL,
  PRIMARY KEY (`id_sinhvien`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.sinhvien: ~4 rows (approximately)
INSERT INTO `sinhvien` (`id_sinhvien`, `ma_sinhvien`, `ten_sinhvien`, `gioitinh`, `ngaysinh`, `email`, `diachithuongtru`, `sodienthoai1`, `id_lophoc`) VALUES
	(0, 'MS01', 'Huỳnh Trường Huy', 1, '2023-03-05', 'huyckth@gmail.com', 'Cần Thơ', '0325874596', 14),
	(3, 'MS02', 'Trần Thanh Niềm', 1, '2001-06-08', 'tranthanhniem@gmail.com', 'Sóc Trăngg', '0325874587', 12),
	(4, 'SV01', 'Cam Tô Dương Hoà', 1, '2001-05-16', 'ctdhoa@gmail.com', '14', '0358562547', 14),
	(6, 'a', 'l', 1, '2444-04-12', 'k@qa', 'd', 'a', 12);

-- Dumping structure for table khoaluan.taikhoan
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT,
  `ten_taikhoan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_canbo` int(11) NOT NULL,
  `ability` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_taikhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.taikhoan: ~0 rows (approximately)
INSERT INTO `taikhoan` (`id_taikhoan`, `ten_taikhoan`, `matkhau`, `id_canbo`, `ability`) VALUES
	(1, 'admin', '123456', 4, 0);

-- Dumping structure for table khoaluan.trinhdo
CREATE TABLE IF NOT EXISTS `trinhdo` (
  `id_trinhdo` int(11) NOT NULL AUTO_INCREMENT,
  `ma_trinhdo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_trinhdo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_trinhdo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.trinhdo: ~2 rows (approximately)
INSERT INTO `trinhdo` (`id_trinhdo`, `ma_trinhdo`, `ten_trinhdo`, `mota`) VALUES
	(6, 'K01', 'Kém', 'aaa'),
	(7, 'T01', 'Tốt', 'Trình độ tốt');

-- Dumping structure for table khoaluan.user
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydangky` date NOT NULL DEFAULT current_timestamp(),
  `ability` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.user: ~1 rows (approximately)
INSERT INTO `user` (`iduser`, `username`, `password`, `hoten`, `gioitinh`, `ngaysinh`, `diachi`, `dienthoai`, `ngaydangky`, `ability`, `active`) VALUES
	(12, 'admin', '999999', 'Huỳnh Trường Huy', 1, '2001-06-24', 'Trà Vinh', '0389874326', '2023-06-05', 0, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
