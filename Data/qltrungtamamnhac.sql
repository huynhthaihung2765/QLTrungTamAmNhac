-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 09, 2017 lúc 05:42 SA
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
  `TenBaiViet` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TheALT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDung` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayViet` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `capdo`
--

CREATE TABLE `capdo` (
  `IDCapDo` int(11) NOT NULL,
  `TenCapDo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTaCapDo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ca_trongngay`
--

CREATE TABLE `ca_trongngay` (
  `IDCaDay` int(11) NOT NULL,
  `SoCa` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTaCaDay` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
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
  `IDKHOAHOC` int(11) NOT NULL,
  `NgayBatDauKhoaHoc` datetime DEFAULT NULL,
  `NgayKetThucKhoiaHoc` datetime DEFAULT NULL,
  `TrangThaiHoc` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
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
  `TenChucVu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTaChucVu` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cosovatchat`
--

CREATE TABLE `cosovatchat` (
  `IDCSVC` int(11) NOT NULL,
  `IDLoai` int(11) NOT NULL,
  `TenVatChat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaMua` double DEFAULT NULL,
  `DiaChiMua` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `IDGiaoVien` int(11) NOT NULL,
  `HoTenGV` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `CMND` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BangCap` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChuyenMon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon_hocphi`
--

CREATE TABLE `hoadon_hocphi` (
  `IDHoaDon` int(11) NOT NULL,
  `IDChiTiet_PDK_LH` int(11) NOT NULL,
  `NgayLapHoaDon` datetime DEFAULT NULL,
  `SoThangTrongKhoaHoc` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayDongHocPhiTiepTheo` datetime DEFAULT NULL,
  `TrangThaiThanhToan` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `IDHocVien` int(11) NOT NULL,
  `HoTenHocVien` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiOHienTai` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `IDKHOAHOC` int(11) NOT NULL,
  `IDGiaoVien` int(11) NOT NULL,
  `IDLopHoc` int(11) NOT NULL,
  `HocPhi` double DEFAULT NULL,
  `SoThangQuyDinh` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_trongngay`
--

CREATE TABLE `lich_trongngay` (
  `IDLichTN` int(11) NOT NULL,
  `IDCaDay` int(11) NOT NULL,
  `IDThu` int(11) NOT NULL,
  `Buoi` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `IDLienHe` int(11) NOT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HoTen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDung` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaicsvc`
--

CREATE TABLE `loaicsvc` (
  `IDLoai` int(11) NOT NULL,
  `TenLoai` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTaLoai` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `IDLopHoc` int(11) NOT NULL,
  `IDCapDo` int(11) NOT NULL,
  `TenLopHoc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTaMH` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngay_trongtuan`
--

CREATE TABLE `ngay_trongtuan` (
  `IDThu` int(11) NOT NULL,
  `SoThu` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNhanVien` int(11) NOT NULL,
  `HoTenNV` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CMND` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuchi`
--

CREATE TABLE `phieuchi` (
  `IDPhieuChi` int(11) NOT NULL,
  `IDNhanVien` int(11) NOT NULL,
  `NoiDungChi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `IDPhong` int(11) NOT NULL,
  `SoPhong` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoNguoiToiDa` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyenhan`
--

CREATE TABLE `quyenhan` (
  `IDQuyenHan` int(11) NOT NULL,
  `TenQuyenHan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTaQuyenHan` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tkb`
--

CREATE TABLE `tkb` (
  `IDTKB` int(11) NOT NULL,
  `IDLopHoc` int(11) NOT NULL,
  `IDLichTN` int(11) NOT NULL,
  `IDPhong` int(11) NOT NULL
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
  ADD PRIMARY KEY (`IDCapDo`);

--
-- Chỉ mục cho bảng `ca_trongngay`
--
ALTER TABLE `ca_trongngay`
  ADD PRIMARY KEY (`IDCaDay`);

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
  ADD KEY `IDPhieu` (`IDPhieu`),
  ADD KEY `IDKHOAHOC` (`IDKHOAHOC`);

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
  ADD PRIMARY KEY (`IDChucVu`);

--
-- Chỉ mục cho bảng `cosovatchat`
--
ALTER TABLE `cosovatchat`
  ADD PRIMARY KEY (`IDCSVC`),
  ADD KEY `IDLoai` (`IDLoai`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`IDGiaoVien`);

--
-- Chỉ mục cho bảng `hoadon_hocphi`
--
ALTER TABLE `hoadon_hocphi`
  ADD PRIMARY KEY (`IDHoaDon`),
  ADD KEY `IDChiTiet_PDK_LH` (`IDChiTiet_PDK_LH`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`IDHocVien`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`IDKHOAHOC`),
  ADD KEY `IDGiaoVien` (`IDGiaoVien`),
  ADD KEY `IDLopHoc` (`IDLopHoc`);

--
-- Chỉ mục cho bảng `lich_trongngay`
--
ALTER TABLE `lich_trongngay`
  ADD PRIMARY KEY (`IDLichTN`),
  ADD KEY `IDThu` (`IDThu`),
  ADD KEY `IDCaDay` (`IDCaDay`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`IDLienHe`);

--
-- Chỉ mục cho bảng `loaicsvc`
--
ALTER TABLE `loaicsvc`
  ADD PRIMARY KEY (`IDLoai`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`IDLopHoc`),
  ADD KEY `IDCapDo` (`IDCapDo`);

--
-- Chỉ mục cho bảng `ngay_trongtuan`
--
ALTER TABLE `ngay_trongtuan`
  ADD PRIMARY KEY (`IDThu`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNhanVien`);

--
-- Chỉ mục cho bảng `phieuchi`
--
ALTER TABLE `phieuchi`
  ADD PRIMARY KEY (`IDPhieuChi`),
  ADD KEY `IDNhanVien` (`IDNhanVien`);

--
-- Chỉ mục cho bảng `phieudangky`
--
ALTER TABLE `phieudangky`
  ADD PRIMARY KEY (`IDPhieu`),
  ADD KEY `IDHocVien` (`IDHocVien`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`IDPhong`);

--
-- Chỉ mục cho bảng `quyenhan`
--
ALTER TABLE `quyenhan`
  ADD PRIMARY KEY (`IDQuyenHan`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`IDTaiKhoan`);

--
-- Chỉ mục cho bảng `tkb`
--
ALTER TABLE `tkb`
  ADD PRIMARY KEY (`IDTKB`),
  ADD KEY `IDLopHoc` (`IDLopHoc`),
  ADD KEY `IDLichTN` (`IDLichTN`),
  ADD KEY `IDPhong` (`IDPhong`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `IDBaiVIet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `ca_trongngay`
--
ALTER TABLE `ca_trongngay`
  MODIFY `IDCaDay` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT cho bảng `hoadon_hocphi`
--
ALTER TABLE `hoadon_hocphi`
  MODIFY `IDHoaDon` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `IDHocVien` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `IDKHOAHOC` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `lich_trongngay`
--
ALTER TABLE `lich_trongngay`
  MODIFY `IDLichTN` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `IDLopHoc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `ngay_trongtuan`
--
ALTER TABLE `ngay_trongtuan`
  MODIFY `IDThu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `phieuchi`
--
ALTER TABLE `phieuchi`
  MODIFY `IDPhieuChi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `phieudangky`
--
ALTER TABLE `phieudangky`
  MODIFY `IDPhieu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `IDPhong` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT cho bảng `tkb`
--
ALTER TABLE `tkb`
  MODIFY `IDTKB` int(11) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `chitiet_pdk_lh_ibfk_1` FOREIGN KEY (`IDPhieu`) REFERENCES `phieudangky` (`IDPhieu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiet_pdk_lh_ibfk_2` FOREIGN KEY (`IDKHOAHOC`) REFERENCES `khoahoc` (`IDKHOAHOC`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Các ràng buộc cho bảng `hoadon_hocphi`
--
ALTER TABLE `hoadon_hocphi`
  ADD CONSTRAINT `hoadon_hocphi_ibfk_1` FOREIGN KEY (`IDChiTiet_PDK_LH`) REFERENCES `chitiet_pdk_lh` (`IDChiTiet_PDK_LH`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD CONSTRAINT `khoahoc_ibfk_1` FOREIGN KEY (`IDGiaoVien`) REFERENCES `giaovien` (`IDGiaoVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `khoahoc_ibfk_2` FOREIGN KEY (`IDLopHoc`) REFERENCES `monhoc` (`IDLopHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `lich_trongngay`
--
ALTER TABLE `lich_trongngay`
  ADD CONSTRAINT `lich_trongngay_ibfk_1` FOREIGN KEY (`IDThu`) REFERENCES `ngay_trongtuan` (`IDThu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lich_trongngay_ibfk_2` FOREIGN KEY (`IDCaDay`) REFERENCES `ca_trongngay` (`IDCaDay`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lich_trongngay_ibfk_3` FOREIGN KEY (`IDCaDay`) REFERENCES `ca_trongngay` (`IDCaDay`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`IDCapDo`) REFERENCES `capdo` (`IDCapDo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Các ràng buộc cho bảng `tkb`
--
ALTER TABLE `tkb`
  ADD CONSTRAINT `tkb_ibfk_1` FOREIGN KEY (`IDLopHoc`) REFERENCES `monhoc` (`IDLopHoc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tkb_ibfk_2` FOREIGN KEY (`IDLichTN`) REFERENCES `lich_trongngay` (`IDLichTN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tkb_ibfk_3` FOREIGN KEY (`IDPhong`) REFERENCES `phong` (`IDPhong`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
