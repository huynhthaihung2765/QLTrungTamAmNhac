<?php
  require_once("config/db.class.php");

  /**
   * Lớp entities của 1 khóa học có các hàm
   * 1. Select tất cả khóa học
   * 2. Select khóa học theo ID khóa học
   * 3. Select khóa học theo ID Giáo viên
   * 4. Select khóa học theo ID Lớp
   * 5. Select khóa học theo ID Giáo Viên & ID Lớp Học
   * 6. Select Khóa học theo ID lớp học & Học phí
   * 7. Select khóa học theo
   * 8. Insert 1 khóa học
   * 9. Delete 1 khóa học
   * 10.Update 2 khóa học
   */
   class KhoaHoc
   {
     private $idKhoaHoc;
     private $idGiaoVien;
     private $idLopHoc;
     private $hocPhi;
     private $soThangQuyDinh;

     public function __construct($idKhoaHoc, $idGiaoVien, $idLopHoc, $hocPhi, $soThangQuyDinh)
     {
        $this->idKhoaHoc = $idKhoaHoc;
        $this->idGiaoVien = $idGiaoVien;
        $this->idLopHoc = $idLopHoc;
        $this->hocPhi = $hocPhi;
        $this->soThangQuyDinh = $soThangQuyDinh;
     }

     //1. Lấy tất cả Kháo học
     public static function SelectAllKH(){
       $db = new Db();
       $sql = "SELECT * FROM khoahoc";
       $result = $db->select_to_array($sql);
       return $result;
     }


     //1. Lấy tất cả Kháo học theo mã khóa học
     public static function Select_KH_By_IDKH($idKhoaHoc){
       $db = new Db();
       $sql = "SELECT * FROM khoahoc kh where kh.IDKHOAHOC = '$idKhoaHoc'";
       $result = $db->select_to_array($sql);
       return $result;
     }

     //Thêm 1 khóa học
     public function insert(){
       $db = new Db();
       $sql = "INSERT INTO khoahoc (IDGiaoVien, IDLopHoc, HocPhi, SoThangQuyDinh) VALUES
       ('$this->idGiaoVien', '$this->idLopHoc', '$this->hocPhi', '$this->soThangQuyDinh')";
       $result = $db->query_execute($sql);
       return $result;
     }
   }

?>
