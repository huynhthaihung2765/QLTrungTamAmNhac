<?php 
require_once('config/db.class.php');
class HVDangKyMoi
{
	public $idHocVienDK;
	public $hoTen;
	public $soDienThoai;
	public $monHoc;
	public $ngayTrongTuan;
	public $buoiTrongNgay;
	public $noiDung;
	
	public function __construct($hoTen, $soDienThoai, $monHoc, $ngayTrongTuan, $buoiTrongNgay, $noiDung)
	{
		# code...
		$this->hoTen = $hoTen;
		$this->soDienThoai = $soDienThoai;
		$this->monHoc = $monHoc;
		$this->ngayTrongTuan = $ngayTrongTuan;
		$this->buoiTrongNgay = $buoiTrongNgay;
		$this->noiDung = $noiDung;
	}

	// THÊM học đăng ký mới
	public function them()
	{
		$db = new Db();
		$sql = "INSERT INTO hvdangkymoi (HoTen,SDT,MonHoc,NgayTrongTuan, BuoiTrongNgay, NoiDung)VALUES 
		('$this->hoTen','$this->soDienThoai','$this->monHoc,'$this->ngayTrongTuan,'$this->buoiTrongNgay','$this->noiDung')";
		$result = $db->query_execute($sql);
      	return $result;
	}
	//
	public static function GET_ALL_DANGKYMOI(){
      $db = new Db();
      $sql = "SELECT * FROM hvdangkymoi";
      $result = $db->select_to_array($sql);
      return $result;
    }
}
 ?>