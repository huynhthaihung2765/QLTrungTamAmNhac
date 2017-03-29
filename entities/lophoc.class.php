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

      public function insert(){
        $db = new Db();
        $sql = "INSERT INTO lophoc (IDLopHoc, IDMonHoc, IDCapDo, IDGiaoVien, IDLichHoc, HocPhi) VALUES
        ('$this->idLopHoc', '$this->idMonHoc', '$this->idCapDo', '$this->idGiaoVien', '$this->idLichHoc', '$this->hocPhi')";
        $result = $db->query_execute($sql);
        return $result;
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

      public static function Get_All_Lop()
      {
        $db = new Db();
        $sql = "SELECT mh.TenMonHoc, cd.TenCapDo, gv.HoTenGV, lich.BuoiTrongNgay, lich.NgayTrongTuan
        from lophoc lh LEFT join monhoc mh on lh.IDMonHoc = mh.IDMonHoc
        LEFT join capdo cd on lh.IDCapDo = cd.IDCapDo
        LEFT JOIN lichhoc lich on lh.IDLichHoc = lich.IDLichHoc
        LEFT JOIN giaovien gv on lh.IDGiaoVien = gv.IDGiaoVien
        GROUP BY lh.IDMonHoc, lh.IDCapDo, lh.IDLichHoc, lh.IDGiaoVien";
        $result = $db->select_to_array($sql);
        return $result;
      }

      public static function Get_Last_LH(){
        $db = new Db();
        $sql = "SELECT * from lophoc lh ORDER BY lh.IDLopHoc DESC LIMIT 1";
        $result = $db->select_to_array($sql);
        return $result;
      }

      public static function Get_Num_Record($idMonHoc, $idCapDo, $idLichHoc, $idGiaoVien)
      {
        $db = new Db();
        $sql = "SELECT count(*) as SL from lophoc lh
        WHERE lh.IDMonHoc = '$idMonHoc'
        AND lh.IDCapDo = '$idCapDo'
        AND lh.IDLichHoc = '$idLichHoc'
        AND lh.IDGiaoVien = '$idGiaoVien'";
        $result = $db->count_record($sql);
        return $result;
      }

      public static function Count_Record($idMonHoc, $idCapDo, $idLichHoc, $idGiaoVien){
        $db = new Db();
        $sql = "SELECT count(*) as SL from lophoc lh
        WHERE lh.IDMonHoc = '$idMonHoc'
        AND lh.IDCapDo = '$idCapDo' 
        AND lh.IDGiaoVien = '$idGiaoVien'";
        $result = $db->select_to_array($sql);
        return $result;
      }

  }
?>
