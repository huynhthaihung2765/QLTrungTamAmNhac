<?php
  require_once("config/db.class.php");

  /**
   * class nayf lam cho(Anh Xa) table NguoiXinNhapHoc
   */
  class PhieuXinNhapHoc
  {
    private $idPhieuXNH;
    private $idNguoiXNH;
    private $idLopHoc;

    function __construct($idPhieuXNH, $idNguoiXNH, $idLopHoc)
    {
      $this->idPhieuXNH = $idPhieuXNH;
      $this->idNguoiXNH = $idNguoiXNH;
      $this->idLopHoc = $idLopHoc;
    }

    public function insert(){
      $db = new Db();
      $sql = "INSERT INTO phieuxinnhaphoc (IDPhieuXNH, IDNguoiXNH, IDLopHoc) VALUES
      ('$this->idPhieuXNH', '$this->idNguoiXNH', '$this->idLopHoc')";
      $result = $db->query_execute($sql);
      return $result;
    }

    //Lay ra thong tin cua nguoi Nguoi Xin Nhap Hoc cuoi cung(id Lon nhat)
    public static function Get_Last_PhieuXNH(){
      $db = new Db();
      $sql = "SELECT * from phieuxinnhaphoc ORDER BY IDPhieuXNH DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
?>
