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
  `id_phan_loai` int(11) NOT NULL,
  `ngay_vao_lam` date NOT NULL,
  PRIMARY KEY (`id_canbo`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.canbo: ~3 rows (approximately)
INSERT INTO `canbo` (`id_canbo`, `ma_canbo`, `ten_canbo`, `gioitinh`, `ngaysinh`, `email`, `sodienthoai1`, `diachithuongtru`, `id_donvi`, `id_trinhdo`, `id_phan_loai`, `ngay_vao_lam`) VALUES
	(15, 'NVA', 'Nguyễn Văn A', 1, '1990-05-15', 'nguyenvana@gmail.com', '0325874596', 'Thường Thạnh - Cái Răng - Cần Thơ', 1, 7, 1, '2023-01-01'),
	(16, 'TTM', 'Trương Thị Mai', 0, '1991-08-02', 'truongthimai@gmail.com', '0325874587', 'Hựu Thành - Trà Ôn - Vĩnh Long', 2, 7, 1, '0000-00-00'),
	(17, 'NQT', 'Nguyễn Quốc Trung', 0, '1990-09-24', 'nguyenquoctrung@gmail.com', '0389254875', 'Vĩnh Long', 5, 7, 1, '0000-00-00');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.donvi: ~5 rows (approximately)
INSERT INTO `donvi` (`id_donvi`, `ma_donvi`, `ten_donvi`, `mota`) VALUES
	(1, 'kktcn', 'Khoa KTCN', ''),
	(2, 'kqtkd', 'Khoa QTKD', ''),
	(5, 'kduoc', 'Khoa Dược', '.'),
	(6, 'kluat', 'Khoa Bộ Môn Luật', ''),
	(7, 'kdl', 'Khoa Du Lịch', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.indexcount: ~4 rows (approximately)
INSERT INTO `indexcount` (`id_index`, `ten_index`, `ghi_chu`, `ngay_bat_dau`, `ngay_ket_thuc`, `so_ngay_hoat_dong`) VALUES
	(2, 'Đợt 1', '', '2023-04-04', '2023-05-06', 30),
	(7, 'Đợt 2', '', '2023-05-07', '2023-06-11', 30),
	(9, 'Đợt 3', '', '2023-06-01', '2023-07-01', 30);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.kpi: ~31 rows (approximately)
INSERT INTO `kpi` (`id_kpi`, `id_nhom_kpi`, `ten_kpi`, `don_vi_cb`, `he_so_tc`, `ghi_chu_kpi`) VALUES
	(3, 5, 'Hướng dẫn thực tập', 0, 2, ''),
	(4, 5, 'Tự Luận', 0, 1, ''),
	(5, 5, 'Trắc Nghiệm', 0, 1, ''),
	(6, 5, 'Coi thi học kỳ', 0, 0.65, ''),
	(7, 5, 'Chấm bài', 0, 0.0625, ''),
	(8, 10, 'Hướng dẫn bài tập lớn', 0, 1, '3 sinh viên'),
	(9, 11, 'Chấm 1', 0, 3, '3 sinh viên'),
	(10, 11, 'Chấm 2', 0, 1, '3 Sinh Viên'),
	(11, 12, 'Chấm 1', 0, 5, '3 Sinh viên'),
	(12, 12, 'Chấm 2', 0, 1, '3 Sinh viên'),
	(13, 13, 'Chấm 1', 0, 4, '1 Sinh viên'),
	(14, 13, 'Chấm 2', 0, 1.5, '1 Sinh viên'),
	(15, 14, 'Chấm 1', 0, 4, '1 Sinh viên'),
	(16, 14, 'Chấm 2', 0, 1, '1 Sinh viên'),
	(17, 15, 'Hướng dẫn chấm', 0, 12, '1 Sinh viên'),
	(18, 15, 'Phản biện', 0, 3, '1 Sinh viên'),
	(19, 25, 'Chủ tịch hội đồng', 0, 1.5, '1 Sinh viên'),
	(20, 25, 'Thư ký hội đồng', 0, 1, '1 Sinh viên'),
	(21, 16, 'Chấm 1', 0, 6, '1 Sinh viên'),
	(22, 16, 'Chấm 2', 0, 1.5, '1 Sinh viên'),
	(23, 17, 'Quản lý phòng thí nghiệm', 0, 40, '1 Năm'),
	(24, 18, 'Công tác dự giờ', 0, 1, '1 lần'),
	(25, 19, 'Tham gia hội giảng', 0, 1, '1 lần'),
	(26, 20, 'Công tác tuyển sinh', 0, 2.5, '1 ngày'),
	(27, 21, 'Tổ trưởng', 0, 24, '1 Năm'),
	(28, 21, 'Thành viên', 0, 18, '1 năm'),
	(29, 22, 'Chủ tịch', 0, 20, '1 năm'),
	(30, 22, 'Phó Chủ tịch', 0, 15, '1 năm'),
	(31, 22, 'Thư ký', 0, 15, '1 năm'),
	(32, 22, 'Thành viên', 0, 10, '1 năm'),
	(33, 23, 'Đóng góp vào công tác kiểm định', 0, 1, '1 năm');

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
	(12, 'QTKD', 'Quản Trị Kinh Doanh', 0, 3),
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
) ENGINE=InnoDB AUTO_INCREMENT=1349 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.luong: ~93 rows (approximately)
INSERT INTO `luong` (`id_luong`, `id_index`, `id_canbo`, `ten_canbo`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `so_dien_thoai`, `ngay_vao_lam`, `phan_loai`, `trinh_do`, `id_kpi`, `ten_kpi`, `don_vi_cb`, `he_so_thuc`, `thanh_tien`, `ghi_chu_luong`, `so_ngay_vang`) VALUES
	(1194, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 3, 'Hướng dẫn thực tập', 1212, 2, 2424, '', 0),
	(1195, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 4, 'Tự Luận', 0, 1, 0, '', 0),
	(1196, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 5, 'Trắc Nghiệm', 0, 1, 0, '', 0),
	(1197, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 6, 'Coi thi học kỳ', 0, 0.65, 0, '', 0),
	(1198, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 7, 'Chấm bài', 0, 0.0625, 0, '', 0),
	(1199, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 8, 'Hướng dẫn bài tập lớn', 0, 1, 0, '', 0),
	(1200, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 9, 'Chấm 1', 0, 3, 0, '', 0),
	(1201, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 10, 'Chấm 2', 0, 1, 0, '', 0),
	(1202, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 11, 'Chấm 1', 0, 5, 0, '', 0),
	(1203, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 12, 'Chấm 2', 0, 1, 0, '', 0),
	(1204, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 13, 'Chấm 1', 0, 4, 0, '', 0),
	(1205, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 14, 'Chấm 2', 0, 1.5, 0, '', 0),
	(1206, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 15, 'Chấm 1', 0, 4, 0, '', 0),
	(1207, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 16, 'Chấm 2', 0, 1, 0, '', 0),
	(1208, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 17, 'Hướng dẫn chấm', 0, 12, 0, '', 0),
	(1209, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 18, 'Phản biện', 0, 3, 0, '', 0),
	(1210, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 19, 'Chủ tịch hội đồng', 0, 1.5, 0, '', 0),
	(1211, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 20, 'Thư ký hội đồng', 0, 1, 0, '', 0),
	(1212, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 21, 'Chấm 1', 0, 6, 0, '', 0),
	(1213, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 22, 'Chấm 2', 0, 1.5, 0, '', 0),
	(1214, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 23, 'Quản lý phòng thí nghiệm', 0, 40, 0, '', 0),
	(1215, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 24, 'Công tác dự giờ', 0, 1, 0, '', 0),
	(1216, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 25, 'Tham gia hội giảng', 0, 1, 0, '', 0),
	(1217, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 26, 'Công tác tuyển sinh', 0, 2.5, 0, '', 0),
	(1218, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 27, 'Tổ trưởng', 0, 24, 0, '', 0),
	(1219, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 28, 'Thành viên', 0, 18, 0, '', 0),
	(1220, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 29, 'Chủ tịch', 0, 20, 0, '', 0),
	(1221, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 30, 'Phó Chủ tịch', 0, 15, 0, '', 0),
	(1222, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 31, 'Thư ký', 0, 15, 0, '', 0),
	(1223, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 32, 'Thành viên', 0, 10, 0, '', 0),
	(1224, 7, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 33, 'Đóng góp vào công tác kiểm định', 0, 1, 0, '', 0),
	(1287, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 3, 'Hướng dẫn thực tập', 569, 2, 1138, '', 0),
	(1288, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 4, 'Tự Luận', 0, 1, 0, '', 0),
	(1289, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 5, 'Trắc Nghiệm', 0, 1, 0, '', 0),
	(1290, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 6, 'Coi thi học kỳ', 0, 0.65, 0, '', 0),
	(1291, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 7, 'Chấm bài', 0, 0.0625, 0, '', 0),
	(1292, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 8, 'Hướng dẫn bài tập lớn', 0, 1, 0, '', 0),
	(1293, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 9, 'Chấm 1', 0, 3, 0, '', 0),
	(1294, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 10, 'Chấm 2', 0, 1, 0, '', 0),
	(1295, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 11, 'Chấm 1', 0, 5, 0, '', 0),
	(1296, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 12, 'Chấm 2', 0, 1, 0, '', 0),
	(1297, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 13, 'Chấm 1', 0, 4, 0, '', 0),
	(1298, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 14, 'Chấm 2', 0, 1.5, 0, '', 0),
	(1299, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 15, 'Chấm 1', 0, 4, 0, '', 0),
	(1300, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 16, 'Chấm 2', 0, 1, 0, '', 0),
	(1301, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 17, 'Hướng dẫn chấm', 0, 12, 0, '', 0),
	(1302, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 18, 'Phản biện', 0, 3, 0, '', 0),
	(1303, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 19, 'Chủ tịch hội đồng', 0, 1.5, 0, '', 0),
	(1304, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 20, 'Thư ký hội đồng', 0, 1, 0, '', 0),
	(1305, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 21, 'Chấm 1', 0, 6, 0, '', 0),
	(1306, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 22, 'Chấm 2', 0, 1.5, 0, '', 0),
	(1307, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 23, 'Quản lý phòng thí nghiệm', 0, 40, 0, '', 0),
	(1308, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 24, 'Công tác dự giờ', 0, 1, 0, '', 0),
	(1309, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 25, 'Tham gia hội giảng', 0, 1, 0, '', 0),
	(1310, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 26, 'Công tác tuyển sinh', 0, 2.5, 0, '', 0),
	(1311, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 27, 'Tổ trưởng', 0, 24, 0, '', 0),
	(1312, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 28, 'Thành viên', 0, 18, 0, '', 0),
	(1313, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 29, 'Chủ tịch', 0, 20, 0, '', 0),
	(1314, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 30, 'Phó Chủ tịch', 0, 15, 0, '', 0),
	(1315, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 31, 'Thư ký', 0, 15, 0, '', 0),
	(1316, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 32, 'Thành viên', 0, 10, 0, '', 0),
	(1317, 2, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 33, 'Đóng góp vào công tác kiểm định', 0, 1, 0, '', 0),
	(1318, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 3, 'Hướng dẫn thực tập', 0, 2, 0, '', -1),
	(1319, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 4, 'Tự Luận', 0, 1, 0, '', -1),
	(1320, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 5, 'Trắc Nghiệm', 0, 1, 0, '', -1),
	(1321, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 6, 'Coi thi học kỳ', 0, 0.65, 0, '', -1),
	(1322, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 7, 'Chấm bài', 0, 0.0625, 0, '', -1),
	(1323, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 8, 'Hướng dẫn bài tập lớn', 0, 1, 0, '', -1),
	(1324, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 9, 'Chấm 1', 0, 3, 0, '', -1),
	(1325, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 10, 'Chấm 2', 0, 1, 0, '', -1),
	(1326, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 11, 'Chấm 1', 0, 5, 0, '', -1),
	(1327, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 12, 'Chấm 2', 0, 1, 0, '', -1),
	(1328, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 13, 'Chấm 1', 0, 4, 0, '', -1),
	(1329, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 14, 'Chấm 2', 0, 1.5, 0, '', -1),
	(1330, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 15, 'Chấm 1', 0, 4, 0, '', -1),
	(1331, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 16, 'Chấm 2', 0, 1, 0, '', -1),
	(1332, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 17, 'Hướng dẫn chấm', 0, 12, 0, '', -1),
	(1333, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 18, 'Phản biện', 0, 3, 0, '', -1),
	(1334, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 19, 'Chủ tịch hội đồng', 0, 1.5, 0, '', -1),
	(1335, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 20, 'Thư ký hội đồng', 0, 1, 0, '', -1),
	(1336, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 21, 'Chấm 1', 0, 6, 0, '', -1),
	(1337, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 22, 'Chấm 2', 0, 1.5, 0, '', -1),
	(1338, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 23, 'Quản lý phòng thí nghiệm', 0, 40, 0, '', -1),
	(1339, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 24, 'Công tác dự giờ', 0, 1, 0, '', -1),
	(1340, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 25, 'Tham gia hội giảng', 0, 1, 0, '', -1),
	(1341, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 26, 'Công tác tuyển sinh', 0, 2.5, 0, '', -1),
	(1342, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 27, 'Tổ trưởng', 0, 24, 0, '', -1),
	(1343, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 28, 'Thành viên', 0, 18, 0, '', -1),
	(1344, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 29, 'Chủ tịch', 0, 20, 0, '', -1),
	(1345, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 30, 'Phó Chủ tịch', 0, 15, 0, '', -1),
	(1346, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 31, 'Thư ký', 0, 15, 0, '', -1),
	(1347, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 32, 'Thành viên', 0, 10, 0, '', -1),
	(1348, 9, 15, 'Nguyễn Văn A', 1, '1990-05-15', 'Thường Thạnh - Cái Răng - Cần Thơ', '0325874596', '2023-01-01', 'Tốt', 'Thạc Sĩ', 33, 'Đóng góp vào công tác kiểm định', 0, 1, 0, '', -1);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.nhomkpi: ~19 rows (approximately)
INSERT INTO `nhomkpi` (`id_nhom_kpi`, `ten_nhom_kpi`, `ghi_chu`) VALUES
	(5, 'Hướng dẫn thực tập', ''),
	(6, 'Ra đề', ''),
	(7, 'Coi thi', ''),
	(8, 'Chấm bài', ''),
	(10, 'Hướng dẫn bài tập lớn', ''),
	(11, 'Đồ án môn học', ''),
	(12, 'Chuyên đề năm 3', ''),
	(13, 'Niên luận', ''),
	(14, 'Thực tập tốt nghiệp', ''),
	(15, 'Đồ án, khoá luận đại học', ''),
	(16, 'Hướng dẫn chấm tiểu luận', ''),
	(17, 'Quản lý phòng thí nghiệm', ''),
	(18, 'Công tác dự giờ', ''),
	(19, 'Tham gia hội giảng', ''),
	(20, 'Công tác tuyển sinh', ''),
	(21, 'Tham gia Tổ đảm bảo chất lượng Khoa/ Bộ Môn', ''),
	(22, 'Tham gia Hội đồng đảm bảo chất Lượng của Trường', ''),
	(23, 'Tham gia công tác kiểm định khoa (trước và sau khi chương trình đào tạo được công nhận)', ''),
	(24, 'Cố vấn học tập', ''),
	(25, 'Hội đồng đồ án, khoá luận đại học', '');

-- Dumping structure for table khoaluan.phanloai
CREATE TABLE IF NOT EXISTS `phanloai` (
  `id_phan_loai` int(11) NOT NULL AUTO_INCREMENT,
  `ten_phan_loai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_phan_loai`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.phanloai: ~1 rows (approximately)
INSERT INTO `phanloai` (`id_phan_loai`, `ten_phan_loai`, `ghi_chu`) VALUES
	(1, 'Tốt', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.phanquyen: ~5 rows (approximately)
INSERT INTO `phanquyen` (`id_phanquyen`, `ten_phanquyen`, `mota`) VALUES
	(0, 'Cán bộ Khoa KTCN', ''),
	(1, 'Cán bộ Khoa KTCN', ''),
	(2, 'Cán bộ Khoa KTCN', ''),
	(3, 'Cán bộ Khoa QTKD', ''),
	(4, 'Cán bộ Khoa Dược', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.taikhoan: ~2 rows (approximately)
INSERT INTO `taikhoan` (`id_taikhoan`, `ten_taikhoan`, `matkhau`, `id_canbo`, `ability`) VALUES
	(6, 'nguyenvana', '123456', 15, 0),
	(7, 'truongthimai', '123456', 16, 0);

-- Dumping structure for table khoaluan.trinhdo
CREATE TABLE IF NOT EXISTS `trinhdo` (
  `id_trinhdo` int(11) NOT NULL AUTO_INCREMENT,
  `ma_trinhdo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_trinhdo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_trinhdo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.trinhdo: ~3 rows (approximately)
INSERT INTO `trinhdo` (`id_trinhdo`, `ma_trinhdo`, `ten_trinhdo`, `mota`) VALUES
	(7, 'TS', 'Thạc Sĩ', ''),
	(8, 'GS', 'Giáo Sư', '.'),
	(9, 'PGS', 'Phó Giáo Sư', '.');

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
  `id_phanquyen` tinyint(1) NOT NULL,
  `id_donvi` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table khoaluan.user: ~4 rows (approximately)
INSERT INTO `user` (`iduser`, `username`, `password`, `hoten`, `gioitinh`, `ngaysinh`, `diachi`, `dienthoai`, `ngaydangky`, `id_phanquyen`, `id_donvi`, `active`) VALUES
	(12, 'admin', '999999', 'Huỳnh Trường Huy', 1, '2001-06-24', 'Trà Vinh', '0389874326', '2023-06-05', 0, 0, 0),
	(15, 'canbokhoa1', '123456', 'Cán bộ Khoa 1', 1, '1990-11-25', 'Cần Thơ', '0389874326', '2023-06-19', 1, 1, 0),
	(16, 'canbokhoa2', '123456', 'Cán bộ Khoa 2', 1, '0000-00-00', 'NULL', '0', '2023-06-19', 2, 1, 0),
	(17, 'canbokhoaqtkd', '123456', 'Cán Bộ QTKD', 1, '0000-00-00', 'NULL', '0', '2023-06-19', 1, 2, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
