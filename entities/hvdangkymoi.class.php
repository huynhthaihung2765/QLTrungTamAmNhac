<?php 
require_once('config/db.class.php');

/**
* 
*/
class HVDangKyMoi
{
	public $idHoTen;
	public $soDienThoai;
	public $monHoc;
	public $ngayTrongTuan;
	public $buoiTrongNgay;
	public $noiDung;
	
	function __construct($idHoTen, $soDienThoai, $monHoc, $ngayTrongTuan, $buoiTrongNgay, $noiDung)
	{
		# code...
		$this->idHoTen = $idHoTen;
		$this->soDienThoai = $soDienThoai;
		$this->monHoc = $monHoc;
		$this->ngayTrongTuan = $ngayTrongTuan;
		$this->buoiTrongNgay = $buoiTrongNgay;
		$this->noiDung = $noiDung;
	}

	// THÊM học đăng ký mới
	public insert()
	{
		$db = new Db();
		$sql = "INSERT INTO hvdangkymoi (HoTen,SDT,MonHoc,NgayTrongTuan, BuoiTrongNgay, NoiDung)VALUES "
	}
}
 ?>