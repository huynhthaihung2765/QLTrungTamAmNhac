<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class Cosovatchat
  {
    public $Idcsvc;
    public $Idloai;
    public $Tencsvc;
    public $GiaMua;
    public $Diachimua;

    public function __construct($Idcsvc,  $Idloai, $Tencsvc, $GiaMua, $Diachimua){
      $this->Idcsvc = $Idcsvc;
      $this->Idloai = $Idloai;
      $this->Tencsvc = $Tencsvc;
      $this->GiaMua = $GiaMua;
      $this->Diachimua = $Diachimua;
    }

    public function insert(){
      $db = new Db();
      $sql = "INSERT INTO cosovatchat (IDCSVC,	IDLoai,	TenVatChat,	GiaMua,	DiaChiMua) VALUES
      ('$this->Idcsvc', '$this->Idloai', '$this->Tencsvc','$this->GiaMua', '$this->Diachimua')";
      $result = $db->query_execute($sql);
      return $result;
    }



    public function edit($id){
      $db = new Db();
      $sql = "UPDATE cosovatchat SET IDCSVC='$this->IDcsvc', IDLoai='$this->Idloai',TenVatChat='$this->Tencsvc', GiaMua='$this->Giamua', DiaChiMua='$this->Diachimua', NgayMua='$this->Ngaymua', Soluong='$this->Soluong'";
      $result = $db->query_execute($sql);
      return $result;
    }

    public function delete($id){
      $db = new Db();
      $sql = "DELETE FROM cosovatchat WHERE IDCSVC='$id'";
      $result = $db->query_execute($sql);
      $db->connection->close();
      return $result;
    }

    public static function Get_A_CSVC($id){
      $db = new Db();
      $sql = "SELECT * FROM cosovatchat csvc WhERE csvc.IDCSVC='$id'";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_CSVC_by_Idloai($Idloai){
      $db = new Db();
      $sql = "SELECT * from cosovatchat csvc inner join IDLoai idl on csvc.IDCSVC = idl.IDLoai where csvc.IDLoai = '$Idloai'";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function SelectAllCSVC()
    {
      $db = new Db();
      $sql = "SELECT * from cosovatchat";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_Last_CSVC(){
      $db = new Db();
      $sql = "SELECT * from cosovatchat csvc ORDER BY csvc.IDCSVC DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
 ?>
