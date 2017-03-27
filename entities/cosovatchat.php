<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class Cosovatchat
  {
    public $Idcsvc;
    public $Idloai
    public $Tencsvc;
    public $Soluong;
    public $Ngaymua;
    public $Diachimua;
    public $Hinhanhcsvc
  
    

    public function __construct($Idcsvc,  $Idloai, $Tencsvc ,$Soluong,$Diachimua, $Giamua ,$Ngaymua , $Hinhanhcsvc){
      $this->Idcsvc = $Idcsvc;
      $this->Idloai = $Idloai;
      $this->Tencsvc = $Tencsvc;
      $this->Soluong = $Soluong;
      $this->Giamua = $Giamua;
      $this->Diachimua = $Diachimua;
      $this->Ngaymua = $Ngaymua;
      $this->Hinhanhcsvc = $Hinhanhcsvc;

    }

    public function insert(){
      //Xu ly hinh anh
      $file_temp = $this->Hinhanhcsvc['tmp_name'];
      $user_file = $this->Hinhanhcsvc['name'];
      $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
      $filepath = "public/images/Cosovatchat/".$timestamp.$user_file;
      if(move_uploaded_file($file_temp, $filepath) == false){
        $filepath = "public/images/Cosovatchat/user.png";
      }



      $db = new Db();
      $sql = "INSERT INTO cosovatchat (IDCSVC,	IDLoai,	TenVatChat,	GiaMua,	DiaChiMua, NgayMua	,Soluong, Hinhanhcsvc) VALUES
      ('$this->Idcsvc', '$this->Idloai', '$this->Tencsvc','$this->Giamua', '$this->Diachimua', '$this->Ngaymua',$this->Soluong , '$filepath')";
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
      $sql = "SELECT * from csvc";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
 ?>
