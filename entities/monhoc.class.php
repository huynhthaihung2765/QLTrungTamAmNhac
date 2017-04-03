<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class MonHoc
  {
    private $idMonHoc;
    private $tenMonHoc;
    private $moTaMonHoc;
    private $vietTac;
    private $hinhAnh;

    function __construct($idMonHoc, $tenMonHoc, $vietTac, $moTaMonHoc, $hinhAnh)
    {
      $this->idMonHoc = $idMonHoc;
      $this->tenMonHoc = $tenMonHoc;
      $this->vietTac = $vietTac;
      $this->moTaMonHoc = $moTaMonHoc;
      $this->hinhAnh = $hinhAnh;
    }

    //Lấy tất cả môn học có trong Lớp Học
    public static function Get_All_MonHoc_HasIn_LopHoc(){
      $db = new Db();
      $sql = "SELECT * FROM lophoc lh LEFT join monhoc mh on lh.IDMonHoc = mh.IDMonHoc GROUP by lh.IDMonHoc";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_MonHoc(){
      $db = new Db();
      $sql = "SELECT * FROM monhoc";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_MonHoc_In_Lop(){
      $db = new Db();
      $sql = "SELECT mh.IDMonHoc, mh.TenMonHoc, mh.VietTac, mh.HinhAnh from lophoc lh LEFT JOIN monhoc mh on lh.IDMonHoc = mh.IDMonHoc GROUP by lh.IDMonHoc";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_MonHoc_In_Lop_ByIdGiaoVien($idGiaoVien){
      $db = new Db();
      $sql = "SELECT *
              FROM lophoc lh LEFT JOIN monhoc mh on lh.IDMonHoc = mh.IDMonHoc
              LEFT JOIN capdo cd on lh.IDCapDo = cd.IDCapDo
              where lh.IDGiaoVien = '$idGiaoVien'
              GROUP by lh.IDMonHoc";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_All_LichMonHoc_ByIdGiaoVienVsIdMonHoc($idGiaoVien, $idMonHoc){
      $db = new Db();
      $sql = "SELECT *
              FROM lophoc lh LEFT join capdo cd on lh.IDCapDo = cd.IDCapDo
              LEFT JOIN lichhoc lich on lh.IDLichHoc = lich.IDLichHoc
              WHERE lh.IDGiaoVien = '$idGiaoVien' AND lh.IDMonHoc = '$idMonHoc'";
      $result = $db->select_to_array($sql);
      return $result;
    }



    public static function Get_All_LichMonHoc_ByBuoiVsNgay($buoi, $ngay){
      $db = new Db();
      $sql = "SELECT *
FROM lophoc lh LEFT JOIN giaovien gv on lh.IDGiaoVien = gv.IDGiaoVien
LEFT JOIN monhoc mh on lh.IDMonHoc = mh.IDMonHoc
LEFT JOIN capdo cd on lh.IDCapDo = cd.IDCapDo
LEFT JOIN lichhoc lich on lh.IDLichHoc = lich.IDLichHoc
WHERE lich.BuoiTrongNgay = '$buoi' and lich.NgayTrongTuan = '$ngay'
GROUP by lh.IDMonHoc";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
  ?>
