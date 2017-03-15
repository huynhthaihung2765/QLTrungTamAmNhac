<?php
  require_once("config/db.class.php");
/**
 *
 */
class MonHoc
{
  private $idLopHoc;
  private $idCapDo;
  private $tenLopHoc;
  private $moTaMH;

  function __construct($idCapDo, $tenLopHoc, $moTaMH)
  {
    $this->$idCapDo = $idCapDo;
    $this->tenLopHoc = $tenLopHoc;
    $this->moTaMH = $moTaMH;
  }

  //1. Lấy tất cả môn học
  public static function SelectAllMH(){
    $db = new Db();
    $sql = "SELECT * FROM monhoc mh GROUP by mh.TenLopHoc";
    $result = $db->select_to_array($sql);
    return $result;
  }

  //1. Lấy tất cả môn học theo cấp độ
  public static function Select_MH_by_IDCD($idCD){
    $db = new Db();
    $sql = "SELECT * FROM monhoc mh where mh.IDCapDo = '$idCD' GROUP by mh.TenLopHoc";
    $result = $db->select_to_array($sql);
    return $result;
  }

  //1. Lấy tất cả môn học theo cấp độ
  public static function Select_MH_by_IDCDvsTenMH($idCD, $tenLopHoc){
    $db = new Db();
    $sql = "SELECT * FROM monhoc mh where mh.IDCapDo = '$idCD' and mh.TenLopHoc = '$tenLopHoc'";
    $result = $db->select_to_array($sql);
    return $result;
  }

}
