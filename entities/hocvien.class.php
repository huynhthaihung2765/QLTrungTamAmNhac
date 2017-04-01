<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class Hocvien
  {
    public $idHocVien;
    public $hoTenHocVien;
    public $gioiTinh;
    public $ngaySinh;
    public $soDienThoai;
    public $diaChi;
    public $email;
    public $picture;

    public function __construct($idHocVien, $hoTenHocVien, $gioiTinh, $ngaySinh, $soDienThoai, $diaChi, $email, $picture){
      $this->idHocVien = $idHocVien;
      $this->hoTenHocVien = $hoTenHocVien;
      $this->gioiTinh = $gioiTinh;
      $this->ngaySinh = $ngaySinh;
      $this->soDienThoai = $soDienThoai;
      $this->diaChi = $diaChi;
      $this->email = $email;
      $this->picture = $picture;
    }

    public function insert(){
      //Xu ly hinh anh
      $file_temp = $this->picture['tmp_name'];
      $user_file = $this->picture['name'];
      $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
      $filepath = "public/images/HocVien/".$timestamp.$user_file;
      if(move_uploaded_file($file_temp, $filepath) == false){
        $filepath = "public/images/HocVien/user.png";
      }



      $db = new Db();
      $sql = "INSERT INTO hocvien (IDHocVien, HoTenHocVien, GioiTinh, NgaySinh, SDT, NoiOHienTai, Email, HinhAnhHV) VALUES
      ('$this->idHocVien', '$this->hoTenHocVien', '$this->gioiTinh', '$this->ngaySinh', '$this->soDienThoai', '$this->diaChi', '$this->email', '$filepath')";
      $result = $db->query_execute($sql);
      return $result;
    }



    public function edit($id){

      $file_temp = $this->picture['tmp_name'];
      $user_file = $this->picture['name'];
      $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
      $filepath = "public/images/HocVien/".$timestamp.$user_file;
      if(move_uploaded_file($file_temp, $filepath) == false){
        $filepath = "public/images/HocVien/user.png";
      }

      $db = new Db();
      $sql = "UPDATE hocvien SET HoTenHocVien='$this->hoTenHocVien', GioiTinh='$this->gioiTinh',NgaySinh='$this->ngaySinh', SDT='$this->soDienThoai', NoiOHienTai='$this->diaChi', Email='$this->email', HinhAnhHV='$filepath' where IDHocVien = '$id'";
       $result = $db->query_execute($sql);
       return $result;
    }

    public function delete(){
      $db = new Db();
      $sql = "DELETE FROM hocvien WHERE IDHocVien='$this->idHocVien'";
      $result = $db->query_execute($sql);
      return $result;
    }

    public static function Get_A_HV($id){
      $db = new Db();
      $sql = "SELECT * FROM hocvien hv WhERE hv.IDHocVien='$id'";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_HV_Sign(){
      $db = new Db();
      $sql = "SELECT * from hocvien hv RIGHT join phieudangky pdk on hv.IDHocVien = pdk.IDHocVien";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_A_HV_Sign_ByName($nameinput){
      $db = new Db();
      $sql = "SELECT * from hocvien hv RIGHT join phieudangky pdk on hv.IDHocVien = pdk.IDHocVien where hv.HoTenHocVien like '%$nameinput%' order by hv.IDHocVien LIMIT 5";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_A_HV_By_PDK($idpdk) {
      $db = new Db();
      $sql = "SELECT * from hocvien hv RIGHT JOIN phieudangky pdk on hv.IDHocVien = pdk.IDHocVien WHERE pdk.IDPhieu = '$idpdk'";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function SelectAllHV()
    {
      $db = new Db();
      $sql = "SELECT * from hocvien";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_Last_HV(){
      $db = new Db();
      $sql = "SELECT * from hocvien hv ORDER BY hv.IDHocVien DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }

  }
 ?>
