<?php
  require_once("config/db.class.php");

  /**
   * class nayf lam cho(Anh Xa) table NguoiXinNhapHoc
   */
  class NguoiXinNhapHoc
  {
    private $idNguoiXNH;
    private $emailNguoiXNH;
    private $matKhauNguoiXNH;
    private $hoTenNguoiXNH;
    private $sdtNguoiXNH;
    private $noiDungXNH;

    function __construct($idNguoiXNH, $emailNguoiXNH, $matKhauNguoiXNH, $hoTenNguoiXNH, $sdtNguoiXNH, $noiDungXNH)
    {
      $this->idNguoiXNH = $idNguoiXNH;
      $this->emailNguoiXNH = $emailNguoiXNH;
      $this->matKhauNguoiXNH = $matKhauNguoiXNH;
      $this->hoTenNguoiXNH = $hoTenNguoiXNH;
      $this->sdtNguoiXNH = $sdtNguoiXNH;
      $this->noiDungXNH = $noiDungXNH;
    }

    public function insert(){
      //$this->matKhauNguoiXNH = md5($this->matKhauNguoiXNH);
      $db = new Db();
      $sql = "INSERT INTO nguoixinnhaphoc (IDNguoiXNH, EmailNguoiXNH, MatKhau, HoTenNguoiXNH, SDTNguoiXNH, NoiDungXNH) VALUES
      ('$this->idNguoiXNH', '$this->emailNguoiXNH', '$this->matKhauNguoiXNH', '$this->hoTenNguoiXNH', '$this->sdtNguoiXNH',  '$this->noiDungXNH')";
      $result = $db->query_execute($sql);
      return $result;
    }

    public static function Check_Login($emailLogin, $passwordLogin){
      $db = new Db();
      $sql = "SELECT * from nguoixinnhaphoc Where EmailNguoiXNH = '$emailLogin' and MatKhau = '$passwordLogin'";
      $result = $db->select_to_array($sql);
      return $result;
    }

    //Lay ra thong tin cua nguoi Nguoi Xin Nhap Hoc cuoi cung(id Lon nhat)
    public static function Get_Last_NguoiXNH(){
      $db = new Db();
      $sql = "SELECT * from nguoixinnhaphoc nxnh ORDER BY nxnh.IDNguoiXNH DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Count_NguoiXinNhapHoc(){
      $db = new Db();
      $sql = "SELECT count(nxnh.IDNguoiXNH) as soluongnguoixnh from nguoixinnhaphoc nxnh ORDER BY nxnh.IDNguoiXNH DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_NguoiXinNhapHoc_ByEmail($emailInput){
      $db = new Db();
      $sql = "SELECT * from nguoixinnhaphoc WHERE EmailNguoiXNH = '$emailInput'";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
?>
