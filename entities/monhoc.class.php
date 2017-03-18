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
    //SELECT * FROM lophoc lh LEFT join monhoc mh on lh.IDMonHoc = mh.IDMonHoc GROUP by lh.IDMonHoc
    public static function Get_All_MonHoc_HasIn_LopHoc(){
      $db = new Db();
      $sql = "SELECT * FROM lophoc lh LEFT join monhoc mh on lh.IDMonHoc = mh.IDMonHoc GROUP by lh.IDMonHoc";
      $result = $db->select_to_array($sql);
      return $result;
    }
  }
  ?>
