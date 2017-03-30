<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class NhanVien
  {
    public $idNhanVien;
    public $hoTenNhanVien;
    public $CMND;
    public $gioiTinh;
    public $ngaySinh;
    public $email;
    public $sdt;
    public $idTaiKhoan;
    public $idChucVu;

    public function __construct($idNhanVien, $hoTenNhanVien, $CMND, $gioiTinh, $ngaySinh, $email, $sdt, $idTaiKhoan, $idChucVu){
      $this->idNhanVien = $idNhanVien;
      $this->hoTenNhanVien = $hoTenNhanVien;
      $this->CMND = $CMND;
      $this->gioiTinh = $gioiTinh;
      $this->ngaySinh = $ngaySinh;
      $this->email = $email;
      $this->sdt = $sdt;
      $this->idTaiKhoan = $idTaiKhoan;
      $this->idChucVu = $idChucVu;
    }

    public function insert(){
      $db = new Db();
      $sql = "INSERT INTO nhanvien (IDNhanVien, HoTenNV, CMND, GioiTinh, NgaySinh, Email, SDT, IDTaiKhoan, IDChucVu) VALUES ('$this->idNhanVien', '$this->hoTenNhanVien', '$this->CMND', '$this->gioiTinh', '$this->ngaySinh', '$this->email', '$this->sdt', '$this->idTaiKhoan', '$this->idChucVu')";
      $result = $db->query_execute($sql);
      return $result;
    }

    public function insertNVBV(){
      $db = new Db();
      $sql = "INSERT INTO nhanvien (IDNhanVien, HoTenNV, CMND, GioiTinh, NgaySinh, Email, SDT, IDChucVu) VALUES ('$this->idNhanVien', '$this->hoTenNhanVien', '$this->CMND', '$this->gioiTinh', '$this->ngaySinh', '$this->email', '$this->sdt', '$this->idChucVu')";
      $result = $db->query_execute($sql);
      return $result;
    }

    public static function Get_Last_NhanVien(){
      $db = new Db();
      $sql = "SELECT * from nhanvien nv ORDER BY nv.IDNhanVien DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
  ?>
