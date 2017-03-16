<?php
  require_once("config/db.class.php");
/**
 *
 */
class CapDo
{
  private $idCapDo;
  private $tenCapDo;
  private $moTaCapDo;

  function __construct($idCapDo, $tenCapDo, $moTaCapDo)
  {
    $this->$idCapDo = $idCapDo;
    $this->$tenCapDo = $tenCapDo;
    $this->moTaCapDo = $moTaCapDo;
  }

  //1. Lấy tất cả cấp độ
  public static function SelectAllCD(){
    $db = new Db();
    $sql = "SELECT * FROM capdo";
    $result = $db->select_to_array($sql);
    return $result;
  }

  //Hàm Lấy cấp độ theo tên lớp
  public static function Get_All_Capo_Has_In_MonHoc($idLopHoc){
    $db = new Db();
    $sql = "SELECT * from monhoc mh left join capdo cd on mh.IDCapDo = cd.IDCapDo GROUP by mh.IDCapDo";
    $result = $db->select_to_array($sql);
    return $result;
  }
 }

 ?>
