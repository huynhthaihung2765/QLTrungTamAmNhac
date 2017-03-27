<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class Loaicosovatchat
  {
    public $Idloai;
    public $Tenloai;
    public $Motaloai;

  }
    public function __construct($Idloai,  $Tenloai, $Motaloai)
    {
        $this->Idloai = $Idloai;
        $this->Tenloai = $Tenloai;
        $this->Motaloai = $Motaloai;
    }

    public function insert()
    {
        //thêm loại
        $db = new Db();
        $sql = "INSERT INTO loaicsvc (IDLoai, TenLoai, MoTaLoai) VALUES
        ('$this->Idloai', '$this->Tenloai', '$this->Motaloai')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public function edit($id)
    {
      $db = new Db();
      $sql = "UPDATE loaicsvc SET IDLoai='$this->IDloai', TenLoai='$this->Tenloai',MoTaLoai='$this->Motaloai',";
      $result = $db->query_execute($sql);
      return $result;
    }

    public function delete($id)
    {
      $db = new Db();
      $sql = "DELETE FROM loaicsvc WHERE IDLoai='$id'";
      $result = $db->query_execute($sql);
      $db->connection->close();
      return $result;
    }

    public static function SelectAllLoaiCSVC()
    {
      $db = new Db();
      $sql = "SELECT * from loaicsvc";
      $result = $db->select_to_array($sql);
      return $result;
    }
    
    
    
    
    
    
    
    
    ?>
 
