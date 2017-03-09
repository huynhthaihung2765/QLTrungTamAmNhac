/*
Created		2/27/2017
Modified		3/4/2017
Project		
Model			
Company		
Author		
Version		
Database		MS SQL 2005 
*/


Create table [HOCVIEN]
(
	[IDHocVien] Integer Identity NOT NULL,
	[HoTenHocVien] Nvarchar(50) NULL,
	[GioiTinh] Bit NULL,
	[NgaySinh] Datetime NULL,
	[SDT] Varchar(15) NULL, UNIQUE ([SDT]),
	[NoiOHienTai] Nvarchar(200) NULL,
	[Email] Varchar(100) NULL, UNIQUE ([Email]),
Primary Key ([IDHocVien])
) 
go

Create table [GIAOVIEN]
(
	[IDGiaoVien] Integer Identity NOT NULL,
	[HoTenGV] Nvarchar(50) NULL,
	[GioiTinh] Bit NULL,
	[NgaySinh] Datetime NULL,
	[CMND] Varchar(18) NULL, UNIQUE ([CMND]),
	[Email] Varchar(150) NULL, UNIQUE ([Email]),
	[BangCap] Nvarchar(150) NULL,
	[ChuyenMon] Nvarchar(50) NULL,
	[SDT] Varchar(15) NULL, UNIQUE ([SDT]),
Primary Key ([IDGiaoVien])
) 
go

Create table [CAPDO]
(
	[IDCapDo] Integer NOT NULL,
	[TenCapDo] Nvarchar(50) NULL, UNIQUE ([TenCapDo]),
	[MoTaCapDo] Nvarchar(500) NULL,
Primary Key ([IDCapDo])
) 
go

Create table [MONHOC]
(
	[IDLopHoc] Integer Identity NOT NULL,
	[IDCapDo] Integer NOT NULL,
	[TenLopHoc] Nvarchar(50) NULL,
	[MoTaMH] Nvarchar(500) NULL,
Primary Key ([IDLopHoc])
) 
go

Create table [PHIEUDANGKY]
(
	[IDPhieu] Integer Identity NOT NULL,
	[IDHocVien] Integer NOT NULL,
	[TenPhieu] Nvarchar(100) NULL,
	[NgayLapPhieu] Datetime NULL,
Primary Key ([IDPhieu])
) 
go

Create table [NHANVIEN]
(
	[IDNhanVien] Integer NOT NULL,
	[HoTenNV] Nvarchar(100) NULL,
	[CMND] Varchar(12) NULL, UNIQUE ([CMND]),
	[GioiTinh] Bit NULL,
	[NgaySinh] Datetime NULL,
	[Email] Varchar(100) NULL, UNIQUE ([Email]),
	[SDT] Varchar(15) NULL,
Primary Key ([IDNhanVien])
) 
go

Create table [NGAY_TRONGTUAN]
(
	[IDThu] Integer Identity NOT NULL,
	[SoThu] Varchar(2) NULL, UNIQUE ([SoThu]),
Primary Key ([IDThu])
) 
go

Create table [CA_TRONGNGAY]
(
	[IDCaDay] Integer Identity NOT NULL,
	[SoCa] Varchar(3) NULL, UNIQUE ([SoCa]),
	[MoTaCaDay] Nvarchar(500) NULL,
Primary Key ([IDCaDay])
) 
go

Create table [CHITIET_PDK_LH]
(
	[IDChiTiet_PDK_LH] Integer Identity NOT NULL,
	[IDPhieu] Integer NOT NULL,
	[IDKHOAHOC] Integer NOT NULL,
	[NgayBatDauKhoaHoc] Datetime NULL,
	[NgayKetThucKhoiaHoc] Datetime NULL,
	[TrangThaiHoc] Bit NULL,
Primary Key ([IDChiTiet_PDK_LH])
) 
go

Create table [LICH_TRONGNGAY]
(
	[IDLichTN] Integer Identity NOT NULL,
	[IDCaDay] Integer NOT NULL,
	[IDThu] Integer NOT NULL,
	[Buoi] Nvarchar(15) NULL,
Primary Key ([IDLichTN])
) 
go

Create table [TAIKHOAN]
(
	[IDTaiKhoan] Integer Identity NOT NULL,
	[TenTaiKhoan] Varchar(20) NULL, UNIQUE ([TenTaiKhoan]),
	[MatKhau] Varchar(40) NULL,
Primary Key ([IDTaiKhoan])
) 
go

Create table [CHUCVU]
(
	[IDChucVu] Integer Identity NOT NULL,
	[TenChucVu] Nvarchar(50) NULL, UNIQUE ([TenChucVu]),
	[MoTaChucVu] Nvarchar(500) NULL,
Primary Key ([IDChucVu])
) 
go

Create table [QUYENHAN]
(
	[IDQuyenHan] Integer Identity NOT NULL,
	[TenQuyenHan] Nvarchar(50) NULL, UNIQUE ([TenQuyenHan]),
	[MoTaQuyenHan] Nvarchar(500) NULL,
Primary Key ([IDQuyenHan])
) 
go

Create table [CHITIET_NV_CV]
(
	[IDChiTiet] Integer Identity NOT NULL,
	[NgayBatDauLam] Datetime NULL,
	[NgayKetThucLam] Datetime NULL,
	[IDChucVu] Integer NOT NULL,
	[IDNhanVien] Integer NOT NULL,
Primary Key ([IDChiTiet])
) 
go

Create table [BAIVIET]
(
	[IDBaiVIet] Integer Identity NOT NULL,
	[IDNhanVien] Integer NOT NULL,
	[TenBaiViet] Nvarchar(100) NULL,
	[TheALT] Varchar(100) NULL,
	[NoiDung] Nvarchar(500) NULL,
	[NgayViet] Datetime NULL,
Primary Key ([IDBaiVIet])
) 
go

Create table [LIENHE]
(
	[IDLienHe] Integer Identity NOT NULL,
	[SDT] Varchar(15) NULL, UNIQUE ([SDT]),
	[HoTen] Nvarchar(100) NULL,
	[Email] Varchar(100) NULL, UNIQUE ([Email]),
	[NoiDung] Nvarchar(500) NULL,
Primary Key ([IDLienHe])
) 
go

Create table [HOADON_HOCPHI]
(
	[IDHoaDon] Integer Identity NOT NULL,
	[IDChiTiet_PDK_LH] Integer NOT NULL,
	[NgayLapHoaDon] Datetime NULL,
	[SoThangTrongKhoaHoc] Varchar(3) NULL,
	[NgayDongHocPhiTiepTheo] Datetime NULL,
	[TrangThaiThanhToan] Bit NULL,
Primary Key ([IDHoaDon])
) 
go

Create table [KHOAHOC]
(
	[IDKHOAHOC] Integer Identity NOT NULL,
	[IDGiaoVien] Integer NOT NULL,
	[IDLopHoc] Integer NOT NULL,
	[HocPhi] Money NULL,
	[SoThangQuyDinh] Varchar(3) NULL,
Primary Key ([IDKHOAHOC])
) 
go

Create table [PHONG]
(
	[IDPhong] Integer Identity NOT NULL,
	[SoPhong] Varchar(10) NULL,
	[SoNguoiToiDa] Varchar(3) NULL,
Primary Key ([IDPhong])
) 
go

Create table [TKB]
(
	[IDTKB] Char(1) NOT NULL,
	[IDLopHoc] Integer NOT NULL,
	[IDLichTN] Integer NOT NULL,
	[IDPhong] Integer NOT NULL,
Primary Key ([IDTKB])
) 
go

Create table [COSOVATCHAT]
(
	[IDCSVC] Integer Identity NOT NULL,
	[IDLoai] Integer NOT NULL,
	[TenVatChat] Nvarchar(50) NULL, UNIQUE ([TenVatChat]),
	[GiaMua] Money NULL,
	[DiaChiMua] Nvarchar(200) NULL,
Primary Key ([IDCSVC])
) 
go

Create table [LOAICSVC]
(
	[IDLoai] Integer Identity NOT NULL,
	[TenLoai] Nvarchar(50) NULL, UNIQUE ([TenLoai]),
	[MoTaLoai] Nvarchar(500) NULL,
Primary Key ([IDLoai])
) 
go

Create table [CHITIET_Q_TK]
(
	[IDChiTiet] Integer Identity NOT NULL,
	[IDTaiKhoan] Integer NOT NULL,
	[IDQuyenHan] Integer NOT NULL,
Primary Key ([IDChiTiet])
) 
go

Create table [PHIEUCHI]
(
	[IDPhieuCjhi] Integer Identity NOT NULL,
	[IDNhanVien] Integer NOT NULL,
	[NoiDungChi] Nvarchar(200) NULL,
	[SoTienChi] Money NULL,
Primary Key ([IDPhieuCjhi])
) 
go


Alter table [PHIEUDANGKY] add  foreign key([IDHocVien]) references [HOCVIEN] ([IDHocVien])  on update no action on delete no action 
go
Alter table [KHOAHOC] add  foreign key([IDGiaoVien]) references [GIAOVIEN] ([IDGiaoVien])  on update no action on delete no action 
go
Alter table [MONHOC] add  foreign key([IDCapDo]) references [CAPDO] ([IDCapDo])  on update no action on delete no action 
go
Alter table [TKB] add  foreign key([IDLopHoc]) references [MONHOC] ([IDLopHoc])  on update no action on delete no action 
go
Alter table [KHOAHOC] add  foreign key([IDLopHoc]) references [MONHOC] ([IDLopHoc])  on update no action on delete no action 
go
Alter table [CHITIET_PDK_LH] add  foreign key([IDPhieu]) references [PHIEUDANGKY] ([IDPhieu])  on update no action on delete no action 
go
Alter table [BAIVIET] add  foreign key([IDNhanVien]) references [NHANVIEN] ([IDNhanVien])  on update no action on delete no action 
go
Alter table [PHIEUCHI] add  foreign key([IDNhanVien]) references [NHANVIEN] ([IDNhanVien])  on update no action on delete no action 
go
Alter table [CHITIET_NV_CV] add  foreign key([IDNhanVien]) references [NHANVIEN] ([IDNhanVien])  on update no action on delete no action 
go
Alter table [LICH_TRONGNGAY] add  foreign key([IDThu]) references [NGAY_TRONGTUAN] ([IDThu])  on update no action on delete no action 
go
Alter table [LICH_TRONGNGAY] add  foreign key([IDCaDay]) references [CA_TRONGNGAY] ([IDCaDay])  on update no action on delete no action 
go
Alter table [HOADON_HOCPHI] add  foreign key([IDChiTiet_PDK_LH]) references [CHITIET_PDK_LH] ([IDChiTiet_PDK_LH])  on update no action on delete no action 
go
Alter table [TKB] add  foreign key([IDLichTN]) references [LICH_TRONGNGAY] ([IDLichTN])  on update no action on delete no action 
go
Alter table [CHITIET_Q_TK] add  foreign key([IDTaiKhoan]) references [TAIKHOAN] ([IDTaiKhoan])  on update no action on delete no action 
go
Alter table [CHITIET_NV_CV] add  foreign key([IDChucVu]) references [CHUCVU] ([IDChucVu])  on update no action on delete no action 
go
Alter table [CHITIET_Q_TK] add  foreign key([IDQuyenHan]) references [QUYENHAN] ([IDQuyenHan])  on update no action on delete no action 
go
Alter table [CHITIET_PDK_LH] add  foreign key([IDKHOAHOC]) references [KHOAHOC] ([IDKHOAHOC])  on update no action on delete no action 
go
Alter table [TKB] add  foreign key([IDPhong]) references [PHONG] ([IDPhong])  on update no action on delete no action 
go
Alter table [COSOVATCHAT] add  foreign key([IDLoai]) references [LOAICSVC] ([IDLoai])  on update no action on delete no action 
go


Set quoted_identifier on
go


Set quoted_identifier off
go


/* Roles permissions */


/* Users permissions */


