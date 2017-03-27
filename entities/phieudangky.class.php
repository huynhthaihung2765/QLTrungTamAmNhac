<?php
  require_once("config/db.class.php");

  /**
   *
   */
  class PhieuDangKy
  {
    public $idPhieu;
    public $idHocVien;
    public $tenPhieu;
    public $ngayLapPhieu;


    public function __construct($idPhieu, $idHocVien, $tenPhieu, $ngayLapPhieu){
      $this->idPhieu = $idPhieu;
      $this->idHocVien = $idHocVien;
      $this->tenPhieu = $tenPhieu;
      $this->ngayLapPhieu = $ngayLapPhieu;
    }

    public function insert(){
      $db = new Db();
      $sql = "INSERT INTO phieudangky (IDPhieu, IDHocVien, TenPhieu, NgayLapPhieu) VALUES
      ('$this->idPhieu', '$this->idHocVien', '$this->tenPhieu', '$this->ngayLapPhieu')";
      $result = $db->query_execute($sql);
      return $result;
    }

    public static function Count_PDK(){
      $db = new Db();
      $sql = "SELECT count(pdk.IDPhieu) as soluongphieudangky from phieudangky pdk ORDER BY pdk.IDPhieu DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_Last_PDK(){
      $db = new Db();
      $sql = "SELECT * from phieudangky pdk ORDER BY pdk.IDPhieu DESC LIMIT 1";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_A_PDK($idHocVien){
      $db = new Db();
      $sql = "SELECT * from phieudangky pdk LEFT join hocvien hv on pdk.IDHocVien = hv.IDHocVien WHERE hv.IDHocVien = '$idHocVien'";
      $result = $db->select_to_array($sql);
      return $result;
    }

    public static function Get_HistoryLearn_ByIDHocVien($idHocVien)
    {
      $db = new Db();
      $sql = "SELECT hv.IDHocVien , hv.HoTenHocVien, pdk.NgayLapPhieu, ctpdk.TrangThaiHoc, mh.TenMonHoc, cd.TenCapDo, gv.HoTenGV, lich.BuoiTrongNgay, lich.NgayTrongTuan, ctpdk.NgayBatDauKhoaHoc, ctpdk.NgayKetThucKhoaHoc
      from chitiet_pdk_lh ctpdk LEFT join phieudangky pdk on ctpdk.IDPhieu = pdk.IDPhieu
      LEFT join hocvien hv on pdk.IDHocVien = hv.IDHocVien
      LEFT join lophoc lh on ctpdk.IDLopHoc = lh.IDLopHoc
      LEFT join monhoc mh on lh.IDMonHoc = mh.IDMonHoc
      LEFT join capdo cd on lh.IDCapDo = cd.IDCapDo
      LEFT join giaovien gv on lh.IDGiaoVien = gv.IDGiaoVien
      LEFT join lichhoc lich on lh.IDLichHoc = lich.IDLichHoc
      WHERE hv.IDHocVien = '$idHocVien'
      GROUP by ctpdk.IDChiTiet_PDK_LH";
      $result = $db->select_to_array($sql);
      return $result;
    }

    //public static Get_All_LHSign_By_HV($idhv){
    //  $db = new Db();
    //  $sql = "SELECT * from phieudangky pdk ORDER BY pdk.IDPhieu DESC LIMIT 1";
  //    $result = $db->select_to_array($sql);
    //  return $result;
  //  }
  }
?>
