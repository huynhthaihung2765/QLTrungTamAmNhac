-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 17, 2017 lúc 07:29 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltrungtamamnhac`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
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
-- Cấu trúc bảng cho bảng `capdo`
--

CREATE TABLE `capdo` (
  `IDCapDo` int(11) NOT NULL,
  `TenCapDo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaCapDo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_nv_cv`
--

CREATE TABLE `chitiet_nv_cv` (
  `IDChiTiet` int(11) NOT NULL,
  `NgayBatDauLam` datetime DEFAULT NULL,
  `NgayKetThucLam` datetime DEFAULT NULL,
  `IDChucVu` int(11) NOT NULL,
  `IDNhanVien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_pdk_lh`
--

CREATE TABLE `chitiet_pdk_lh` (
  `IDChiTiet_PDK_LH` int(11) NOT NULL,
  `IDPhieu` int(11) NOT NULL,
  `NgayBatDauKhoaHoc` datetime DEFAULT NULL,
  `NgayKetThucKhoiaHoc` datetime DEFAULT NULL,
  `TrangThaiHoc` bit(1) DEFAULT NULL,
  `IDLopHoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_q_tk`
--

CREATE TABLE `chitiet_q_tk` (
  `IDChiTiet` int(11) NOT NULL,
  `IDTaiKhoan` int(11) NOT NULL,
  `IDQuyenHan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `IDChucVu` int(11) NOT NULL,
  `TenChucVu` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `MoTaChucVu` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cosovatchat`
--

CREATE TABLE `cosovatchat` (
  `IDCSVC` int(11) NOT NULL,
  `IDLoai` int(11) NOT NULL,
  `TenVatChat` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `GiaMua` double DEFAULT NULL,
  `DiaChiMua` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `IDGiaoVien` int(11) NOT NULL,
  `HoTenGV` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` bit(1) DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `CMND` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BangCap` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChuyenMon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `IDHocVien` int(11) NOT NULL,
  `HoTenHocVien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` bit(1) DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiOHienTai` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichhoc`
--

CREATE TABLE `lichhoc` (
  `IDLichHoc` int(11) NOT NULL,
  `BuoiTrongNgay` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayTrongTuan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
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
-- Cấu trúc bảng cho bảng `loaicsvc`
--

CREATE TABLE `loaicsvc` (
  `IDLoai` int(11) NOT NULL,
  `TenLoai` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `MoTaLoai` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `IDLopHoc` int(11) NOT NULL,
  `IDLichHoc` int(11) NOT NULL,
  `IDGiaoVien` int(11) NOT NULL,
  `IDMonHoc` int(11) NOT NULL,
  `IDCapDo` int(11) NOT NULL,
  `HocPhi` decimal(18,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `IDMonHoc` int(11) NOT NULL,
  `TenNonHoc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MoTaMonHoc` char(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNhanVien` int(11) NOT NULL,
  `HoTenNV` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `CMND` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` bit(1) DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuchi`
--

CREATE TABLE `phieuchi` (
  `IDPhieuCjhi` int(11) NOT NULL,
  `IDNhanVien` int(11) NOT NULL,
  `NoiDungChi` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `SoTienChi` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudangky`
--

CREATE TABLE `phieudangky` (
  `IDPhieu` int(11) NOT NULL,
  `IDHocVien` int(11) NOT NULL,
  `TenPhieu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayLapPhieu` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyenhan`
--

CREATE TABLE `quyenhan` (
  `IDQuyenHan` int(11) NOT NULL,
  `TenQuyenHan` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `MoTaQuyenHan` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `IDTaiKhoan` int(11) NOT NULL,
  `TenTaiKhoan` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`IDBaiVIet`),
  ADD KEY `IDNhanVien` (`IDNhanVien`);

--
-- Chỉ mục cho bảng `capdo`
--
ALTER TABLE `capdo`
  ADD PRIMARY KEY (`IDCapDo`),
  ADD UNIQUE KEY `TenCapDo` (`TenCapDo`);

--
-- Chỉ mục cho bảng `chitiet_nv_cv`
--
ALTER TABLE `chitiet_nv_cv`
  ADD PRIMARY KEY (`IDChiTiet`),
  ADD KEY `IDNhanVien` (`IDNhanVien`),
  ADD KEY `IDChucVu` (`IDChucVu`);

--
-- Chỉ mục cho bảng `chitiet_pdk_lh`
--
ALTER TABLE `chitiet_pdk_lh`
  ADD PRIMARY KEY (`IDChiTiet_PDK_LH`),
  ADD KEY `IDLopHoc` (`IDLopHoc`),
  ADD KEY `IDPhieu` (`IDPhieu`);

--
-- Chỉ mục cho bảng `chitiet_q_tk`
--
ALTER TABLE `chitiet_q_tk`
  ADD PRIMARY KEY (`IDChiTiet`),
  ADD KEY `IDTaiKhoan` (`IDTaiKhoan`),
  ADD KEY `IDQuyenHan` (`IDQuyenHan`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`IDChucVu`),
  ADD UNIQUE KEY `TenChucVu` (`TenChucVu`);

--
-- Chỉ mục cho bảng `cosovatchat`
--
ALTER TABLE `cosovatchat`
  ADD PRIMARY KEY (`IDCSVC`),
  ADD UNIQUE KEY `TenVatChat` (`TenVatChat`),
  ADD KEY `IDLoai` (`IDLoai`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`IDGiaoVien`),
  ADD UNIQUE KEY `CMND` (`CMND`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `SDT` (`SDT`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`IDHocVien`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  ADD PRIMARY KEY (`IDLichHoc`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`IDLienHe`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `loaicsvc`
--
ALTER TABLE `loaicsvc`
  ADD PRIMARY KEY (`IDLoai`),
  ADD UNIQUE KEY `TenLoai` (`TenLoai`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`IDLopHoc`),
  ADD KEY `IDGiaoVien` (`IDGiaoVien`),
  ADD KEY `IDCapDo` (`IDCapDo`),
  ADD KEY `IDMonHoc` (`IDMonHoc`),
  ADD KEY `IDLichHoc` (`IDLichHoc`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`IDMonHoc`),
  ADD UNIQUE KEY `TenNonHoc` (`TenNonHoc`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNhanVien`),
  ADD UNIQUE KEY `CMND` (`CMND`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `phieuchi`
--
ALTER TABLE `phieuchi`
  ADD PRIMARY KEY (`IDPhieuCjhi`),
  ADD KEY `IDNhanVien` (`IDNhanVien`);

--
-- Chỉ mục cho bảng `phieudangky`
--
ALTER TABLE `phieudangky`
  ADD PRIMARY KEY (`IDPhieu`),
  ADD KEY `IDHocVien` (`IDHocVien`);

--
-- Chỉ mục cho bảng `quyenhan`
--
ALTER TABLE `quyenhan`
  ADD PRIMARY KEY (`IDQuyenHan`),
  ADD UNIQUE KEY `TenQuyenHan` (`TenQuyenHan`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`IDTaiKhoan`),
  ADD UNIQUE KEY `TenTaiKhoan` (`TenTaiKhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `IDBaiVIet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `chitiet_nv_cv`
--
ALTER TABLE `chitiet_nv_cv`
  MODIFY `IDChiTiet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `chitiet_pdk_lh`
--
ALTER TABLE `chitiet_pdk_lh`
  MODIFY `IDChiTiet_PDK_LH` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `chitiet_q_tk`
--
ALTER TABLE `chitiet_q_tk`
  MODIFY `IDChiTiet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `IDChucVu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `cosovatchat`
--
ALTER TABLE `cosovatchat`
  MODIFY `IDCSVC` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `IDGiaoVien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `IDHocVien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `IDLienHe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `loaicsvc`
--
ALTER TABLE `loaicsvc`
  MODIFY `IDLoai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `IDLopHoc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `phieuchi`
--
ALTER TABLE `phieuchi`
  MODIFY `IDPhieuCjhi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `phieudangky`
--
ALTER TABLE `phieudangky`
  MODIFY `IDPhieu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `quyenhan`
--
ALTER TABLE `quyenhan`
  MODIFY `IDQuyenHan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `IDTaiKhoan` int(11) NOT NULL AUTO_INCREMENT;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `chitiet_nv_cv`
--
ALTER TABLE `chitiet_nv_cv`
  ADD CONSTRAINT `chitiet_nv_cv_ibfk_1` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiet_nv_cv_ibfk_2` FOREIGN KEY (`IDChucVu`) REFERENCES `chucvu` (`IDChucVu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `chitiet_pdk_lh`
--
ALTER TABLE `chitiet_pdk_lh`
  ADD CONSTRAINT `chitiet_pdk_lh_ibfk_1` FOREIGN KEY (`IDLopHoc`) REFERENCES `lophoc` (`IDLopHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiet_pdk_lh_ibfk_2` FOREIGN KEY (`IDPhieu`) REFERENCES `phieudangky` (`IDPhieu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `chitiet_q_tk`
--
ALTER TABLE `chitiet_q_tk`
  ADD CONSTRAINT `chitiet_q_tk_ibfk_1` FOREIGN KEY (`IDTaiKhoan`) REFERENCES `taikhoan` (`IDTaiKhoan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiet_q_tk_ibfk_2` FOREIGN KEY (`IDQuyenHan`) REFERENCES `quyenhan` (`IDQuyenHan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `cosovatchat`
--
ALTER TABLE `cosovatchat`
  ADD CONSTRAINT `cosovatchat_ibfk_1` FOREIGN KEY (`IDLoai`) REFERENCES `loaicsvc` (`IDLoai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_1` FOREIGN KEY (`IDGiaoVien`) REFERENCES `giaovien` (`IDGiaoVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lophoc_ibfk_2` FOREIGN KEY (`IDCapDo`) REFERENCES `capdo` (`IDCapDo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lophoc_ibfk_3` FOREIGN KEY (`IDMonHoc`) REFERENCES `monhoc` (`IDMonHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lophoc_ibfk_4` FOREIGN KEY (`IDLichHoc`) REFERENCES `lichhoc` (`IDLichHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phieuchi`
--
ALTER TABLE `phieuchi`
  ADD CONSTRAINT `phieuchi_ibfk_1` FOREIGN KEY (`IDNhanVien`) REFERENCES `nhanvien` (`IDNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phieudangky`
--
ALTER TABLE `phieudangky`
  ADD CONSTRAINT `phieudangky_ibfk_1` FOREIGN KEY (`IDHocVien`) REFERENCES `hocvien` (`IDHocVien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
