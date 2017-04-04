-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2017 at 01:01 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qltrungtamamnhac`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `IDBaiVIet` int(11) NOT NULL,
  `IDNhanVien` int(11) NOT NULL,
  `TenBaiViet` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `TheALT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDung` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `NgayViet` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `capdo`
--

CREATE TABLE `capdo` (
  `IDCapDo` int(11) NOT NULL,
  `TenCapDo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaCapDo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `capdo`
--

INSERT INTO `capdo` (`IDCapDo`, `TenCapDo`, `MoTaCapDo`) VALUES
(0, 'Dễ', NULL),
(1, 'Trung bình', NULL),
(2, 'Khó', NULL),
(3, 'Chuyên nghiệp', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_pdk_lh`
--

CREATE TABLE `chitiet_pdk_lh` (
  `IDChiTiet_PDK_LH` int(11) NOT NULL,
  `IDPhieu` int(11) NOT NULL,
  `IDLopHoc` int(11) NOT NULL,
  `NgayBatDauKhoaHoc` datetime DEFAULT NULL,
  `NgayKetThucKhoaHoc` datetime DEFAULT NULL,
  `TrangThaiHoc` char(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiet_pdk_lh`
--

INSERT INTO `chitiet_pdk_lh` (`IDChiTiet_PDK_LH`, `IDPhieu`, `IDLopHoc`, `NgayBatDauKhoaHoc`, `NgayKetThucKhoaHoc`, `TrangThaiHoc`) VALUES
(1, 7, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true'),
(2, 7, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true'),
(3, 7, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true'),
(4, 7, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true'),
(6, 11, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true'),
(7, 6, 32, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true'),
(8, 7, 27, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true'),
(9, 7, 27, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'false'),
(10, 7, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true'),
(11, 7, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true'),
(12, 6, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true'),
(13, 7, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `IDChucVu` int(11) NOT NULL,
  `TenChucVu` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `MoTaChucVu` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`IDChucVu`, `TenChucVu`, `MoTaChucVu`) VALUES
(1, 'Bảo Vệ', ' Nhân viên bảo vệ'),
(2, 'Trưởng Phòng', 'Nhân viên cấp cao'),
(3, 'Kế toán', ' Nhân viên kế toán'),
(4, 'Cộng tác viên', ' Nhân viên cộng tác');

-- --------------------------------------------------------

--
-- Table structure for table `cosovatchat`
--

CREATE TABLE `cosovatchat` (
  `IDCSVC` int(11) NOT NULL,
  `IDLoai` int(11) NOT NULL,
  `TenVatChat` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `GiaMua` int(11) DEFAULT NULL,
  `DiaChiMua` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cosovatchat`
--

INSERT INTO `cosovatchat` (`IDCSVC`, `IDLoai`, `TenVatChat`, `GiaMua`, `DiaChiMua`) VALUES
(1, 1, 'Đàn guitar', NULL, NULL),
(2, 1, 'Đàn bà', 10000000, 'Bình Thạnh'),
(3, 1, 'Đàn ông', 10000000, 'Thủ Đức'),
(4, 1, 'Đàn tranh', 10000000, 'Tân Bình');

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `IDGiaoVien` int(11) NOT NULL,
  `HoTenGV` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `CMND` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BangCap` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChuyenMon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnhGV` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`IDGiaoVien`, `HoTenGV`, `GioiTinh`, `NgaySinh`, `CMND`, `Email`, `BangCap`, `ChuyenMon`, `SDT`, `HinhAnhGV`) VALUES
(0, 'Nguyễn Văn A', 'Nam', NULL, NULL, 'nguyenvanA@gmail.com', 'Giải nhất trong cuộc thi âm nhạc DNA', 'Guitar', '0988888888', 'DanielSturridge.png'),
(1, 'Nguyễn Văn B', 'Nam', NULL, NULL, 'nguyenvanB@gmail.com', 'Giải nhất trong cuộc thi âm nhạc Nhật', 'Guitar', '0988888887', 'DavidBeckham.png'),
(2, 'Nguyễn Văn C', 'Nam', NULL, NULL, 'nguyenvanC@gmail.com', 'Giải nhất trong cuộc thi âm nhạc Anh Quốc', 'Guitar', '0988888886', 'DejanLovren.png'),
(3, 'Nguyễn Văn D', 'Nam', NULL, NULL, 'nguyenvanD@gmail.com', 'Giải nhất trong cuộc thi âm nhạc Hàn Quốc', 'Guitar', '0988888885', 'EricCatona.png'),
(4, 'Nguyễn Văn E', 'Nam', NULL, NULL, 'nguyenvanE@gmail.com', 'Giải nhất trong cuộc thi âm nhạc châu Âu', 'Trống cajon', '0988888884', 'LukeShaw.png'),
(5, 'Nguyễn Văn F', 'Nam', NULL, NULL, 'nguyenvanF@gmail.com', 'Giải nhất trong cuộc thi âm nhạc Việt Nam', 'Trống cajon', '0988888883', 'PhilippeCoutinho.png'),
(6, 'Nguyễn Văn G', 'Nam', NULL, NULL, 'nguyenvanG@gmail.com', 'Giải nhất trong cuộc thi âm nhạc Việt Nam', 'Trống cajon', '0988888882', 'PScholes.png'),
(7, 'Nguyễn Văn H', 'Nam', NULL, NULL, 'nguyenvanH@gmail.com', 'Giải nhất trong cuộc thi âm nhạc DNA', 'Trống cajon', '0988888881', 'RoyKeane.png'),
(8, 'Nguyễn Văn I', 'Nam', NULL, NULL, 'nguyenvanI@gmail.com', 'Giải nhất trong cuộc thi âm nhạc DNA', 'Kèn harmonica', '0988888880', 'WayneRooney.png'),
(9, 'Nguyễn Văn J', 'Nam', NULL, NULL, 'nguyenvanJ@gmail.com', 'Giải nhất trong cuộc thi âm nhạc Việt Nam', 'Kèn harmonica', '0988888801', 'MarcosRojopng.png'),
(10, 'Nguyễn Văn K', 'Nam', NULL, NULL, 'nguyenvanK@gmail.com', 'Giải nhất trong cuộc thi âm nhạc DNA', 'Kèn harmonica', '0988888802', 'StevenGerrard.png'),
(11, 'Nguyễn Văn L', 'Nam', NULL, NULL, 'nguyenvanL@gmail.com', 'Giải nhất trong cuộc thi âm nhạc Việt Nam', 'Kèn harmonica', '0988888012', 'MarioBalotelli.png');

-- --------------------------------------------------------

--
-- Table structure for table `hocvien`
--

CREATE TABLE `hocvien` (
  `IDHocVien` int(11) NOT NULL,
  `HoTenHocVien` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `GioiTinh` char(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiOHienTai` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnhHV` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocvien`
--

INSERT INTO `hocvien` (`IDHocVien`, `HoTenHocVien`, `GioiTinh`, `NgaySinh`, `SDT`, `NoiOHienTai`, `Email`, `HinhAnhHV`) VALUES
(1, 'Trần Văn A', 'Nam', NULL, NULL, NULL, NULL, NULL),
(2, 'Trần Văn B', 'Nam', NULL, NULL, NULL, NULL, NULL),
(3, 'Trần Văn C', 'Nam', NULL, NULL, NULL, NULL, NULL),
(4, 'Trần Văn D', 'Nam', NULL, NULL, NULL, NULL, NULL),
(5, 'Trần Văn E', 'Nam', NULL, NULL, NULL, NULL, NULL),
(6, 'Trần Văn F', 'Nam', NULL, NULL, NULL, NULL, NULL),
(7, 'Trần Văn G', 'Nam', NULL, NULL, NULL, NULL, NULL),
(8, 'Trần Văn H', 'Nam', NULL, NULL, NULL, NULL, NULL),
(9, 'Nguyễn Văn L', 'Nam', '2017-03-15 00:00:00', '', 'Phú Mỹ Hưng', '', 'public/images/HocVien/user.png'),
(13, 'Nguyễn Văn An', 'Nam', '2017-03-21 00:00:00', '436435', '', 'gfjfgh', 'public/images/HocVien/user.png'),
(14, 'Thái Hưng Huỳnh', 'Nam', '0000-00-00 00:00:00', '123456789', '', 'ThaiHung@g,mail.com', 'public/images/HocVien/user.png'),
(15, 'Cao Thành Tấn Phát', 'Nam', '0000-00-00 00:00:00', '3435345', 'egdfgdfdg', '2fd4234235@gmail.com', 'public/images/HocVien/user.png'),
(16, 'as', 'Nam', '0000-00-00 00:00:00', '435', '', 'ewff', 'public/images/HocVien/20170320103117uong.png'),
(17, 'Thai Hưng CA', 'Nam', '0000-00-00 00:00:00', '35436', '', 'dfgdhgfhf', 'public/images/HocVien/user.png'),
(19, 'Trần cân Chỉnh', 'Nam', '0000-00-00 00:00:00', '0944326345', '', 'fhgfjghk', 'public/images/HocVien/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `lichhoc`
--

CREATE TABLE `lichhoc` (
  `IDLichHoc` int(11) NOT NULL,
  `BuoiTrongNgay` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayTrongTuan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichhoc`
--

INSERT INTO `lichhoc` (`IDLichHoc`, `BuoiTrongNgay`, `NgayTrongTuan`) VALUES
(0, 'Buổi sáng', 'Thứ 2, Thứ 4, Thứ 6'),
(1, 'Buổi sáng', 'Thứ 3, thứ 5, thứ 7'),
(2, 'Buổi chiều', 'Thứ 2, Thứ 4, Thứ 6'),
(3, 'Buổi chiều', 'Thứ 3, thứ 5, thứ 7'),
(5, 'Buổi tối', 'Thứ 2, Thứ 4, Thứ 6'),
(6, 'Buổi tối', 'Thứ 3, thứ 5, thứ 7');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `IDLienHe` int(11) NOT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HoTen` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDung` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaicsvc`
--

CREATE TABLE `loaicsvc` (
  `IDLoai` int(11) NOT NULL,
  `TenLoai` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `MoTaLoai` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaicsvc`
--

INSERT INTO `loaicsvc` (`IDLoai`, `TenLoai`, `MoTaLoai`) VALUES
(1, 'Dụng cụ dạy nhạc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `IDLopHoc` int(11) NOT NULL,
  `IDMonHoc` int(11) NOT NULL,
  `IDCapDo` int(11) NOT NULL,
  `IDGiaoVien` int(11) NOT NULL,
  `IDLichHoc` int(11) NOT NULL,
  `HocPhi` decimal(18,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`IDLopHoc`, `IDMonHoc`, `IDCapDo`, `IDGiaoVien`, `IDLichHoc`, `HocPhi`) VALUES
(0, 0, 0, 0, 0, '1234567890'),
(1, 0, 0, 1, 3, '1234567890'),
(2, 0, 0, 2, 5, '1234567890'),
(3, 0, 1, 0, 3, '1234567890'),
(4, 0, 1, 1, 5, '1234567890'),
(5, 0, 1, 2, 1, '1234567890'),
(6, 0, 2, 0, 5, '1234567890'),
(7, 0, 2, 1, 1, '1234567890'),
(8, 0, 2, 2, 2, '1234567890'),
(9, 0, 3, 3, 0, '1234567890'),
(10, 0, 3, 3, 3, '1234567890'),
(11, 0, 3, 3, 5, '1234567890'),
(12, 1, 0, 4, 0, '1234567890'),
(13, 1, 0, 5, 3, '1234567890'),
(14, 1, 0, 6, 5, '1234567890'),
(15, 1, 1, 4, 3, '1234567890'),
(16, 1, 1, 5, 5, '1234567890'),
(17, 1, 1, 6, 1, '1234567890'),
(18, 1, 2, 4, 5, '1234567890'),
(19, 1, 2, 5, 1, '1234567890'),
(20, 1, 2, 6, 2, '1234567890'),
(21, 1, 3, 7, 0, '1234567890'),
(22, 1, 3, 7, 3, '1234567890'),
(23, 1, 3, 7, 5, '1234567890'),
(24, 2, 0, 8, 0, '1234567890'),
(25, 2, 0, 9, 3, '1234567890'),
(26, 2, 0, 10, 5, '1234567890'),
(27, 2, 1, 8, 3, '1234567890'),
(28, 2, 1, 9, 5, '1234567890'),
(29, 2, 1, 10, 1, '1234567890'),
(30, 2, 2, 8, 5, '1234567890'),
(31, 2, 2, 9, 1, '1234567890'),
(32, 2, 2, 10, 2, '1234567890'),
(33, 2, 3, 11, 0, '1234567890'),
(34, 2, 3, 11, 3, '1234567890'),
(35, 2, 3, 11, 5, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `IDMonHoc` int(11) NOT NULL,
  `TenMonHoc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `VietTac` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaMonHoc` char(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`IDMonHoc`, `TenMonHoc`, `VietTac`, `HinhAnh`, `MoTaMonHoc`) VALUES
(0, 'Đàn guitar', 'Guitar', 'guitar.jpg', NULL),
(1, 'Trống cajon', 'Cajon', 'Cajon.png', NULL),
(2, 'Kèn harmonica', 'Harmonica', 'Harmonica.png', NULL),
(3, 'Đàn piano', 'Piano', 'piano.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nguoixinnhaphoc`
--

CREATE TABLE `nguoixinnhaphoc` (
  `IDNguoiXNH` int(11) NOT NULL,
  `EmailNguoiXNH` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenNguoiXNH` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDTNguoiXNH` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDungXNH` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoixinnhaphoc`
--

INSERT INTO `nguoixinnhaphoc` (`IDNguoiXNH`, `EmailNguoiXNH`, `MatKhau`, `HoTenNguoiXNH`, `SDTNguoiXNH`, `NoiDungXNH`) VALUES
(1, 'dangduongcuong@gmail.com', 'Cuong123', 'Dương Cường', '09881234567', NULL),
(2, 'duongcuong@gmail.com', 'Cuong123', 'Duong Duong', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNhanVien` int(11) NOT NULL,
  `HoTenNV` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `CMND` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IDTaiKhoan` int(11) DEFAULT NULL,
  `IDChucVu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`IDNhanVien`, `HoTenNV`, `CMND`, `GioiTinh`, `NgaySinh`, `Email`, `SDT`, `IDTaiKhoan`, `IDChucVu`) VALUES
(0, 'Huỳnh Thái Hưng', '1423556', NULL, NULL, NULL, NULL, 1, 2),
(1, 'Cao Thành Tấn phát', '35435', NULL, NULL, NULL, NULL, 2, 2),
(3, 'Đặng Dương Cường', '345345', NULL, NULL, NULL, NULL, 3, 3),
(4, 'Thai Hưng 3', '62354236', 'Nam', '2017-12-01 00:00:00', 'hgfia@gmail.com', '1235456', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phieuchi`
--

CREATE TABLE `phieuchi` (
  `IDPhieuCjhi` int(11) NOT NULL,
  `IDNhanVien` int(11) NOT NULL,
  `NoiDungChi` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `SoTienChi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieudangky`
--

CREATE TABLE `phieudangky` (
  `IDPhieu` int(11) NOT NULL,
  `IDHocVien` int(11) NOT NULL,
  `TenPhieu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayLapPhieu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieudangky`
--

INSERT INTO `phieudangky` (`IDPhieu`, `IDHocVien`, `TenPhieu`, `NgayLapPhieu`) VALUES
(1, 9, 'Phieu Dang Ky', '2017-03-20 07:36:31'),
(5, 13, 'Phieu Dang Ky', '2017-03-20 09:44:16'),
(6, 14, 'Phieu Dang Ky', '2017-03-20 10:25:01'),
(7, 15, 'Phieu Dang Ky', '2017-03-20 10:28:11'),
(8, 16, 'Phieu Dang Ky', '2017-03-20 10:31:17'),
(9, 17, 'Phieu Dang Ky', '2017-03-20 15:49:58'),
(11, 19, 'Phieu Dang Ky', '2017-03-21 23:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `phieuxinnhaphoc`
--

CREATE TABLE `phieuxinnhaphoc` (
  `IDPhieuXNH` int(11) NOT NULL,
  `IDNguoiXNH` int(11) DEFAULT NULL,
  `IDLopHoc` int(11) DEFAULT NULL,
  `TenNguoiXNH` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MonHoc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CapDo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BuoiTrongNgay` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgayTrongTuan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TenGiaoVien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieuxinnhaphoc`
--

INSERT INTO `phieuxinnhaphoc` (`IDPhieuXNH`, `IDNguoiXNH`, `IDLopHoc`, `TenNguoiXNH`, `MonHoc`, `CapDo`, `BuoiTrongNgay`, `NgayTrongTuan`, `TenGiaoVien`, `TrangThai`) VALUES
(18, 1, 18, 'Dương Cường', 'Trống cajon', 'Khó', 'Buổi tối', 'Thứ 2, Thứ 4, Thứ 6', 'Nguyễn Văn E', 0),
(19, 1, 19, 'Dương Cường', 'Trống cajon', 'Khó', 'Buổi sáng', 'Thứ 3, thứ 5, thứ 7', 'Nguyễn Văn F', 0),
(23, 1, 31, 'Dương Cường', 'Kèn harmonica', 'Khó', 'Buổi sáng', 'Thứ 3, thứ 5, thứ 7', 'Nguyễn Văn J', 0),
(24, 1, 17, 'Dương Cường', 'Trống cajon', 'Trung bình', 'Buổi sáng', 'Thứ 3, thứ 5, thứ 7', 'Nguyễn Văn G', 0),
(25, 1, 16, 'Dương Cường', 'Trống cajon', 'Trung bình', 'Buổi tối', 'Thứ 2, Thứ 4, Thứ 6', 'Nguyễn Văn F', 0),
(26, 1, 15, 'Dương Cường', 'Trống cajon', 'Trung bình', 'Buổi chiều', 'Thứ 3, thứ 5, thứ 7', 'Nguyễn Văn E', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quyenhan`
--

CREATE TABLE `quyenhan` (
  `IDQuyenHan` int(11) NOT NULL,
  `TenQuyenHan` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `MoTaQuyenHan` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quyenhan`
--

INSERT INTO `quyenhan` (`IDQuyenHan`, `TenQuyenHan`, `MoTaQuyenHan`) VALUES
(1, 'Quản trị', 'Toàn Quyền trong Websites'),
(2, 'Biên Tập', 'Viết bài cho Websites User(GUI_Uer)'),
(3, 'Thành Viên', 'Chỉ được xem toàn bộ websites.'),
(5, 'Ở Không', 'ko có quyền j hết');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `IDTaiKhoan` int(11) NOT NULL,
  `TenTaiKhoan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IDQuyenHan` int(11) DEFAULT NULL,
  `TrangThaiOnline` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`IDTaiKhoan`, `TenTaiKhoan`, `MatKhau`, `IDQuyenHan`, `TrangThaiOnline`) VALUES
(1, 'ThaiHung', 'Hung123', 1, 'Offline'),
(2, 'PhatCao', 'Phat123', 2, 'Offline'),
(3, 'DuongCuong', 'Cuong123', 2, 'Online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`IDBaiVIet`),
  ADD KEY `IDNhanVien` (`IDNhanVien`);

--
-- Indexes for table `capdo`
--
ALTER TABLE `capdo`
  ADD PRIMARY KEY (`IDCapDo`),
  ADD UNIQUE KEY `TenCapDo` (`TenCapDo`);

--
-- Indexes for table `chitiet_pdk_lh`
--
ALTER TABLE `chitiet_pdk_lh`
  ADD PRIMARY KEY (`IDChiTiet_PDK_LH`),
  ADD KEY `IDLopHoc` (`IDLopHoc`),
  ADD KEY `IDPhieu` (`IDPhieu`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`IDChucVu`),
  ADD UNIQUE KEY `TenChucVu` (`TenChucVu`);

--
-- Indexes for table `cosovatchat`
--
ALTER TABLE `cosovatchat`
  ADD PRIMARY KEY (`IDCSVC`),
  ADD UNIQUE KEY `TenVatChat` (`TenVatChat`),
  ADD KEY `IDLoai` (`IDLoai`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`IDGiaoVien`),
  ADD UNIQUE KEY `CMND` (`CMND`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `SDT` (`SDT`);

--
-- Indexes for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`IDHocVien`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `lichhoc`
--
ALTER TABLE `lichhoc`
  ADD PRIMARY KEY (`IDLichHoc`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`IDLienHe`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `loaicsvc`
--
ALTER TABLE `loaicsvc`
  ADD PRIMARY KEY (`IDLoai`),
  ADD UNIQUE KEY `TenLoai` (`TenLoai`);

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`IDLopHoc`),
  ADD KEY `IDGiaoVien` (`IDGiaoVien`),
  ADD KEY `IDCapDo` (`IDCapDo`),
  ADD KEY `IDMonHoc` (`IDMonHoc`),
  ADD KEY `IDLichHoc` (`IDLichHoc`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`IDMonHoc`),
  ADD UNIQUE KEY `TenNonHoc` (`TenMonHoc`);

--
-- Indexes for table `nguoixinnhaphoc`
--
ALTER TABLE `nguoixinnhaphoc`
  ADD PRIMARY KEY (`IDNguoiXNH`),
  ADD UNIQUE KEY `UNIQUESDT` (`SDTNguoiXNH`),
  ADD UNIQUE KEY `UNIQUEEmail` (`EmailNguoiXNH`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNhanVien`),
  ADD UNIQUE KEY `CMND` (`CMND`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `IDTaiKhoan` (`IDTaiKhoan`),
  ADD KEY `IDChucVu` (`IDChucVu`);

--
-- Indexes for table `phieuchi`
--
ALTER TABLE `phieuchi`
  ADD PRIMARY KEY (`IDPhieuCjhi`),
  ADD KEY `IDNhanVien` (`IDNhanVien`);

--
-- Indexes for table `phieudangky`
--
ALTER TABLE `phieudangky`
  ADD PRIMARY KEY (`IDPhieu`),
  ADD KEY `IDHocVien` (`IDHocVien`);

--
-- Indexes for table `phieuxinnhaphoc`
--
ALTER TABLE `phieuxinnhaphoc`
  ADD PRIMARY KEY (`IDPhieuXNH`),
  ADD KEY `FK_PXNH_NXNH` (`IDNguoiXNH`),
  ADD KEY `FK_PXNH_LH` (`IDLopHoc`);

--
-- Indexes for table `quyenhan`
--
ALTER TABLE `quyenhan`
  ADD PRIMARY KEY (`IDQuyenHan`),
  ADD UNIQUE KEY `TenQuyenHan` (`TenQuyenHan`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`IDTaiKhoan`),
  ADD UNIQUE KEY `TenTaiKhoan` (`TenTaiKhoan`),
  ADD KEY `IDQuyenHan` (`IDQuyenHan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `IDBaiVIet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chitiet_pdk_lh`
--
ALTER TABLE `chitiet_pdk_lh`
  MODIFY `IDChiTiet_PDK_LH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `IDChucVu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cosovatchat`
--
ALTER TABLE `cosovatchat`
  MODIFY `IDCSVC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `IDGiaoVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `IDHocVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `IDLienHe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loaicsvc`
--
ALTER TABLE `loaicsvc`
  MODIFY `IDLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `IDLopHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `nguoixinnhaphoc`
--
ALTER TABLE `nguoixinnhaphoc`
  MODIFY `IDNguoiXNH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `phieuchi`
--
ALTER TABLE `phieuchi`
  MODIFY `IDPhieuCjhi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phieudangky`
--
ALTER TABLE `phieudangky`
  MODIFY `IDPhieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `phieuxinnhaphoc`
--
ALTER TABLE `phieuxinnhaphoc`
  MODIFY `IDPhieuXNH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `quyenhan`
--
ALTER TABLE `quyenhan`
  MODIFY `IDQuyenHan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `IDTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chitiet_pdk_lh`
--
ALTER TABLE `chitiet_pdk_lh`
  ADD CONSTRAINT `chitiet_pdk_lh_ibfk_1` FOREIGN KEY (`IDLopHoc`) REFERENCES `lophoc` (`IDLopHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiet_pdk_lh_ibfk_2` FOREIGN KEY (`IDPhieu`) REFERENCES `phieudangky` (`IDPhieu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cosovatchat`
--
ALTER TABLE `cosovatchat`
  ADD CONSTRAINT `cosovatchat_ibfk_1` FOREIGN KEY (`IDLoai`) REFERENCES `loaicsvc` (`IDLoai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_1` FOREIGN KEY (`IDGiaoVien`) REFERENCES `giaovien` (`IDGiaoVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lophoc_ibfk_2` FOREIGN KEY (`IDCapDo`) REFERENCES `capdo` (`IDCapDo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lophoc_ibfk_3` FOREIGN KEY (`IDMonHoc`) REFERENCES `monhoc` (`IDMonHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lophoc_ibfk_4` FOREIGN KEY (`IDLichHoc`) REFERENCES `lichhoc` (`IDLichHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`IDTaiKhoan`) REFERENCES `taikhoan` (`IDTaiKhoan`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`IDChucVu`) REFERENCES `chucvu` (`IDChucVu`);

--
-- Constraints for table `phieuchi`
--
ALTER TABLE `phieuchi`
  ADD CONSTRAINT `phieuchi_ibfk_1` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `phieudangky`
--
ALTER TABLE `phieudangky`
  ADD CONSTRAINT `phieudangky_ibfk_1` FOREIGN KEY (`IDHocVien`) REFERENCES `hocvien` (`IDHocVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `phieuxinnhaphoc`
--
ALTER TABLE `phieuxinnhaphoc`
  ADD CONSTRAINT `FK_PXNH_LH` FOREIGN KEY (`IDLopHoc`) REFERENCES `lophoc` (`IDLopHoc`),
  ADD CONSTRAINT `FK_PXNH_NXNH` FOREIGN KEY (`IDNguoiXNH`) REFERENCES `nguoixinnhaphoc` (`IDNguoiXNH`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`IDQuyenHan`) REFERENCES `quyenhan` (`IDQuyenHan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
