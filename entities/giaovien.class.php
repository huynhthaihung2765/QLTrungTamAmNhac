<?php
	require_once('config/db.class.php');
	/*

	 */
	class GiaoVien
	{
		public $hoTenGV;
		public $gioiTinh;
		public $ngaySinh;
		public $cMND;
		public $email;
		public $bangCap;
		public $chuyenMon;
		public $soDienThoai;
		public $hinhAnh;
		public $diaChi;


		public function __construct($hoTenGV, $gioiTinh, $ngaySinh, $cMND, $email, $bangCap, $chuyenMon, $soDienThoai, $hinhAnh, $diaChi)
		{
			$this->hoTenGV = $hoTenGV;
			$this->gioiTinh = $gioiTinh;
			$this->ngaySinh = $ngaySinh;
			$this->cMND = $cMND;
			$this->email = $email;
			$this->bangCap = $bangCap;
			$this->chuyenMon = $chuyenMon;
			$this->soDienThoai = $soDienThoai;
			$this->hinhAnh = $hinhAnh;
			$this->diaChi = $diaChi;
		}


		// thêm giáo viên
		public function insert()
		{
			$file_temp = $this->hinhAnh['tmp_name'];
		    $user_file = $this->hinhAnh['name'];
		    $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
		    $filepath = "public/images/GiaoVien/".$timestamp.$user_file;
		    if(move_uploaded_file($file_temp, $filepath) == false){
		      return false;
		    }
		    //end upload file
			$db = new Db();
			$sql = "INSERT INTO GiaoVien (HoTenGV, GioiTinh, NgaySinh, CMND, Email,BangCap, ChuyenMon, SDT, HinhAnh, DiaChi) VALUES
			('$this->hoTenGV','$this->gioiTinh','$this->ngaySinh',$this->cMND','$this->email','$this->bangCap', '$this->chuyenMon','$this->soDienThoai', '$filepath', '$this->diaChi')";
			$result = $db->query_execute($sql);
			return $result;
		}
		//
		// Sửa giáo viên
		//
		public function edit($id){
	      $db = new Db();
	      $sql = "UPDATE hocvien SET HoTenGV='$this->hoTenGV', GioiTinh='$this->gioiTinh',NgaySinh='$this->ngaySinh',CMND='$this->cMND',Email='$this->email',BangCap='$this->bangCap',ChuyenMon='$this->chuyenMon', SDT='$this->soDienThoai', HinhAnh = '$this->hinhAnh', DiaChi='this->diaChi' ";
	       $result = $db->query_execute($sql);
	       return $result;
    	}
    	//
    	// Xoá giáo viên
    	//
    	public function delete($id)
    	{
    		$sql = "DELETE FROM giaovien WHERE IDGiaoVien='$id'";
	      	$result = $db->query_execute($sql);
	      	$db->connection->close();
	      	return $result;
    	}
    	//
    	// Xem một giáo viên
    	//
    	public static function Get_A_HV($id)
    	{
	      $db = new Db();
	      $sql = "SELECT * FROM giaovien gv WHERE gv.IDGiaoVien='$id'";
	      $result = $db->select_to_array($sql);
	      return $result;
	    }

	    //
	    // Xem tất cả giáo viên
	    //
	    public static function Get_All_GV()
	    {
	    	$db = new Db();
	    	$sql = "SELECT * FROM giaovien";
	    	$result = $db-> select_to_array($sql);
	    	return $result;
	    }

			public static function Get_GV_By_IDMonHoc($idMH)
	    {
	    	$db = new Db();
	    	$sql = "SELECT * FROM giaovien gv INNER join khoahoc kh on gv.IDGiaoVien = kh.IDGiaoVien WHERE kh.IDLopHoc = '$idMH' GROUP by kh.IDGiaoVien, kh.IDLopHoc";
	    	$result = $db-> select_to_array($sql);
	    	return $result;
	    }

			public static function Get_All_Gv_Has_In_KhoaHoc()
	    {
	    	$db = new Db();
	    	$sql = "SELECT * FROM giaovien";
	    	$result = $db-> select_to_array($sql);
	    	return $result;
	    }

			//select * from lophoc lh left JOIN giaovien gv on lh.IDGiaoVien = gv.IDGiaoVien WHERE lh.IDMonHoc = AND lh.IDCapDo = lh.IDLichHoc =  group BY lh.IDMonHoc, lh.IDCapDo, lh.IDLichHoc
			public static function Get_All_GiaoVien_HasIn_LopHoc($idMonHoc, $idCapDo, $idLich)
	    {
	    	$db = new Db();
	    	$sql = "SELECT * from lophoc lh left JOIN giaovien gv on lh.IDGiaoVien = gv.IDGiaoVien WHERE lh.IDMonHoc = '$idMonHoc' AND lh.IDCapDo = '$idCapDo' and lh.IDLichHoc = '$idLich'  group BY lh.IDMonHoc, lh.IDCapDo, lh.IDLichHoc";
	    	$result = $db-> select_to_array($sql);
	    	return $result;
	    }

			public static function Get_All_Gv_In_LopHoc()
	    {
	    	$db = new Db();
	    	$sql = "SELECT * FROM lophoc lh LEFT JOIN giaovien gv on lh.IDGiaoVien = gv.IDGiaoVien GROUP by lh.IDGiaoVien";
	    	$result = $db-> select_to_array($sql);
	    	return $result;
	    }

			public static function Get_All_LichGiaoVien_ByIdMonVsIdCapDo($idMonHoc, $idCapDo)
			{
				//SELECT * FROM lichhoc lh GROUP BY lh.BuoiTrongNgay
				$db = new Db();
				$sql = "SELECT *
				FROM lophoc lh LEFT JOIN giaovien gv on lh.IDGiaoVien = gv.IDGiaoVien
				LEFT JOIN lichhoc lich on lh.IDLichHoc = lich.IDLichHoc
				WHERE lh.IDMonHoc = '$idMonHoc' and lh.IDCapDo = '$idCapDo'";
				$result = $db->select_to_array($sql);
				return $result;
			}


	    //
	    //Tìm giáo viên
	    //
	    public static function Search_GV()
	    {

	    }
	}
 ?>
