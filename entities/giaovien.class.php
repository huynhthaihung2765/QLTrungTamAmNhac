<?php 
	require_once('../config/db.class.php');
	/*
	
	 */
	class Giaovien
	{
		public $idGiaovien;
		public $hoTenGV;
		public $gioiTinh;
		public $ngaySinh;
		public $cMND;
		public $email;
		public $bangCap;
		public $chuyenMon;
		public $soDienThoai;



		public function __construct($idGiaovien, $hoTenGV, $gioiTinh, $ngaySinh, $cMND, $email, $bangCap, $chuyenMon, $soDienThoai)
		{
			$this->idGiaovien = $idGiaovien;
			$this->hoTenGV = $hoTenGV;
			$this->gioiTinh = $gioiTinh;
			$this->ngaySinh = $ngaySinh;
			$this->cMND = $cMND;
			$this->email = $email;
			$this->bangCap = $bangCap;
			$this->chuyenMon = $chuyenMon;
			$this->soDienThoai = $soDienThoai;
		}


		// lưu giáo viên
		public function insert()
		{
			$db = new Db();
			//
			//thêm giáo viên vào CSDL
			//
			$sql = "INSERT INTO Giaovien (HoTenGV, GioiTinh, NgaySinh, CMND, Email, ChuyenMon, SDT) VALUES
			('$this->hoTenGV','$this->gioiTinh','$this->cMND','$this->email', '$this->chuyenMon','$this->soDienThoai')";

			$result = $db->query_execute($sql);
			return $result;
		}

		public static function selectAll()
		{
			$db = new Db();
			//
			//lay tat ca records 
			//
			$sql = "SELECT * from giaovien";

			$result = $db->select_to_array($sql);
			return $result;
		}
	}
 ?>