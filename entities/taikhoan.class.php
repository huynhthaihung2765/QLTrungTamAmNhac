<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class TaiKhoan
  {
    public $idTaiKhoan;
    public $tenTaiKhoan;
    public $matKhau;
    public $idQuyenHan;
    public $trangThaiOnline;


    public function __construct($idTaiKhoan, $tenTaiKhoan, $matKhau, $idQuyenHan, $trangThaiOnline){
      $this->idTaiKhoan = $idTaiKhoan;
      $this->tenTaiKhoan = $tenTaiKhoan;
      $this->matKhau = $matKhau;
      $this->idQuyenHan = $idQuyenHan;
      $this->trangThaiOnline = $trangThaiOnline;
    }

    public function insert(){
      $db = new Db();
      $sql = "INSERT INTO taikhoan (IDTaiKhoan, TenTaiKhoan, MatKhau, IDQuyenHan, TrangThaiOnline) VALUES ('$this->idTaiKhoan', '$this->tenTaiKhoan', '$this->matKhau', '$this->idQuyenHan', 'Offline')";
      $result = $db->query_execute($sql);
      return $result;
    }
    public function delete(){
      $db = new Db();
      $sql = "DELETE FROM taikhoan WHERE IDTaiKhoan = '$this->idTaiKhoan'";
      $result = $db->query_execute($sql);
      return $result;
    }

    public function edit_Status_Online($idTaiKhoanLogin){
      $db = new Db();
      //UPDATE hocvien SET HoTenHocVien='$this->hoTenHocVien', GioiTinh='$this->gioiTinh',Ngay
      $sql = "UPDATE taikhoan SET TrangThaiOnLine='$this->trangThaiOnline' Where IDTaiKhoan = '$idTaiKhoanLogin'";
      $result = $db->query_execute($sql);
      return $result;
    }

    public static function Get_All_TaiKhoan(){
      $db = new Db();
      $sql = "SELECT * from taikhoan";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_A_TaiKhoan_ByID($idTaiKhoan){
      $db = new Db();
      $sql = "SELECT * from taikhoan WHERE IDTaiKhoan = '$idTaiKhoan'";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_Last_TaiKhoan(){
      $db = new Db();
      $sql = "SELECT * from taikhoan tk ORDER BY tk.IDTaiKhoan DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
?>
