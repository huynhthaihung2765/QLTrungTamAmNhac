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


    public function __construct($idTaiKhoan, $tenTaiKhoan, $matKhau, $idQuyenHan){
      $this->idTaiKhoan = $idTaiKhoan;
      $this->tenTaiKhoan = $tenTaiKhoan;
      $this->matKhau = $matKhau;
      $this->idQuyenHan = $idQuyenHan;
    }

    public function insert(){
      $db = new Db();
      $sql = "INSERT INTO taikhoan (IDTaiKhoan, TenTaiKhoan, MatKhau, IDQuyenHan) VALUES ('$this->idTaiKhoan', '$this->tenTaiKhoan', '$this->matKhau', '$this->idQuyenHan')";
      $result = $db->query_execute($sql);
      return $result;
    }

    public static function Get_All_TaiKhoan(){
      $db = new Db();
      $sql = "SELECT * from taikhoan";
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
