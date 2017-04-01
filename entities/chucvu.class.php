<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class ChucVu
  {
    public $idChucVu;
    public $tenChucVu;
    public $moTaChucVu;

    public function __construct($idChucVu, $tenChucVu, $moTaChucVu){
      $this->idChucVu = $idChucVu;
      $this->tenChucVu = $tenChucVu;
      $this->moTaChucVu = $moTaChucVu;
    }

    public static function Get_All_ChucVu(){
      $db = new Db();
      $sql = "SELECT * from chucvu";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
