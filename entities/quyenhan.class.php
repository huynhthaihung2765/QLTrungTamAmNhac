<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class QuyenHan
  {
    public $idQuyenHan;
    public $tenQuyenHan;
    public $moTaQuyenHan;

    public function __construct($idQuyenHan, $tenQuyenHan, $moTaQuyenHan){
      $this->idQuyenHan = $idQuyenHan;
      $this->tenQuyenHan = $tenQuyenHan;
      $this->moTaQuyenHan = $moTaQuyenHan;
    }

    public static function Get_All_QuyenHan(){
      $db = new Db();
      $sql = "SELECT * from quyenhan";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
?>
