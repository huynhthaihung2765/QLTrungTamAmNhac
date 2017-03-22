<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class LopHoc
  {
    public $idLopHoc;
    public $idMonHoc;
    public $idCapDo;
    public $idGiaoVien;
    public $idLichHoc;
    public $hocPhi;

      public function __construct($idLopHoc, $idMonHoc, $idCapDo, $idGiaoVien, $idLichHoc, $hocPhi){
        $this->idLopHoc = $idLopHoc;
        $this->idMonHoc = $idMonHoc;
        $this->idCapDo = $idCapDo;
        $this->idGiaoVien = $idGiaoVien;
        $this->idLichHoc = $idLichHoc;
        $this->hocPhi = $hocPhi;
      }

      public static function Get_A_Lop($idMonHoc, $idCapDo, $idLichHoc, $idGiaoVien)
      {
        $db = new Db();
        $sql = "SELECT *
        from lophoc lh LEFT join monhoc mh on lh.IDMonHoc = mh.IDMonHoc
        LEFT join capdo cd on lh.IDCapDo = cd.IDCapDo
        LEFT JOIN lichhoc lich on lh.IDLichHoc = lich.IDLichHoc
        LEFT JOIN giaovien gv on lh.IDGiaoVien = gv.IDGiaoVien
        WHERE lh.IDMonHoc = '$idMonHoc'
        AND lh.IDCapDo = '$idCapDo'
        AND lh.IDLichHoc = '$idLichHoc'
        AND lh.IDGiaoVien = '$idGiaoVien'
        GROUP BY lh.IDMonHoc, lh.IDCapDo, lh.IDLichHoc, lh.IDGiaoVien";
        $result = $db->select_to_array($sql);
        return $result;
      }
  }
?>
