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

    public function __construct( $hoTenHocVien, $gioiTinh, $ngaySinh, $soDienThoai, $diaChi, $email, $picture){
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
        return false;
      }

      $db = new Db();
      $sql = "INSERT INTO hocvien (HoTenHocVien, GioiTinh, NgaySinh, SDT, NoiOHienTai, Email, HinhAnhHV) VALUES
      ('$this->hoTenHocVien', '$this->gioiTinh', '$this->ngaySinh', '$this->soDienThoai', '$this->diaChi', '$this->email', '$filepath')";
      $result = $db->query_execute($sql);
      return $result;
    }

    public function edit($id){
      $db = new Db();
      $sql = "UPDATE hocvien SET HoTenHocVien='$this->hoTenHocVien', GioiTinh='$this->gioiTinh',NgaySinh='$this->ngaySinh', SDT='$this->soDienThoai', NoiOHienTai='$this->diaChi', Email='$this->email'";
       $result = $db->query_execute($sql);
       return $result;
    }

    public function delete($id){
      $db = new Db();
      $sql = "DELETE FROM hocvien WHERE IDHocVien='$id'";
      $result = $db->query_execute($sql);
      $db->connection->close();
      return $result;
    }

    public static function Get_A_HV($id){
      $db = new Db();
      $sql = "SELECT * FROM hocvien hv WhERE hv.IDHocVien='$id'";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_HV_Learn(){
      $db = new Db();
      $sql = "SELECT * from hocvien hv inner join phieudangky pdk on hv.IDHocVien = pdk.IDHocVien inner join chitiet_pdk_lh ct on pdk.IDPhieu = ct.IDPhieu inner join khoahoc kh on kh.IDKHOAHOC = ct.IDKHOAHOC where ct.TrangThaiHoc = 'true'";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_Class_HV_Learn($idkh) {
      $db = new Db();
      $sql = "SELECT * FROM khoahoc kh INNER JOIN monhoc mh ON kh.IDLopHoc = mh.IDLopHoc WHERE kh.IDKHOAHOC='$idkh'";
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
  }
 ?>
