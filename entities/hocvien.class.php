<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class Hocvien extends Db
  {
    public $idHocVien;
    public $hoTenHocVien;
    public $gioiTinh;
    public $ngaySinh;
    public $soDienThoai;
    public $diaChi;
    public $email;

    public function __construct($idHocVien, $hoTenHocVien, $gioiTinh, $ngaySinh, $soDienThoai, $diaChi, $email){
      $this->idHocVien = $idHocvien;
      $this->hoTenHocVien = $hoTenHocVien;
      $this->gioiTinh = $gioiTinh;
      $this->ngaySinh = $ngaySinh;
      $this->soDienThoai = $soDienThoai;
      $this->diaChi = $diaChi;
      $this->email = $email;
    }

    public function insert(){
      $sql = "INSERT INTO hocvien (HoTenHocVien, GioiTinh, NgaySinh, SDT, NoiOHienTai, Email) VALUES
      ('$this->hoTenHocVien', '$this->gioiTinh', '$this->ngaySinh', '$this->soDienThoai', '$this->diaChi', '$this->email')";
      $result = $this->query_execute();
      return $result;
    }
  }



 ?>
