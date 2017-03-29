<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class LichHoc
  {

    private $idLichHoc;
    private $buoiTrongNgay;
    private $ngayTrongTuan;

    function __construct($idLichHoc, $buoiTrongNgay, $ngayTrongTuan)
    {
      $this->idLichHoc = $idLichHoc;
      $this->buoiTrongNgay = $buoiTrongNgay;
      $this->ngayTrongTuan = $ngayTrongTuan;
    }

    //Lấy tất cả các buổi học theo môn học và cấp độ
    public static function Get_All_BuoiHoc_HasIn_LopHoc($idMonHoc, $idCapDo){
      $db = new Db();
      $sql = "SELECT * FROM lophoc lh LEFT join lichhoc lich on lh.IDLichHoc = lich.IDLichHoc WHERE lh.IDMonHoc = '$idMonHoc' AND lh.IDCapDo = '$idCapDo' GROUP by lh.IDMonHoc, lh.IDCapDo, lh.IDLichHoc";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_BuoiTrongNgay()
    {
      //SELECT * FROM lichhoc lh GROUP BY lh.BuoiTrongNgay
      $db = new Db();
      $sql = "SELECT * FROM lichhoc lh GROUP BY lh.BuoiTrongNgay";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_NgayTrongTuanTheoBuoi($buoiTrongNgay)
    {
      //SELECT * FROM lichhoc lh GROUP BY lh.BuoiTrongNgay
      $db = new Db();
      $sql = "SELECT * FROM lichhoc lh WHERE lh.BuoiTrongNgay= '$buoiTrongNgay' GROUP BY lh.NgayTrongTuan";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_BuoiInLopHoc()
    {
      $db = new Db();
      $sql = "SELECT * FROM lophoc lh LEFT JOIN lichhoc lich on lh.IDLichHoc = lich.IDLichHoc GROUP by lich.BuoiTrongNgay";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_NgayTrongTuanInLopHoc_ByTenBuoi($tenBuoiHoc)
    {
      $db = new Db();
      $sql = "SELECT * FROM lophoc lh LEFT JOIN lichhoc lich on lh.IDLichHoc = lich.IDLichHoc WHERE lich.BuoiTrongNgay = '$tenBuoiHoc' GROUP by lh.IDLichHoc";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
?>
