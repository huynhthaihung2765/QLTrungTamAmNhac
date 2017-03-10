<?php 
	
	require_one("/entities/giaovien.class.php");

	if(isset($_POST["btnsubmit"]))
	{
		//
		// lấy giá trị từ form collection
		//
		$hoTenGV = $_POST["txtHoTenGV"];
		$gioiTinh = $_POST["txtGioiTinh"];
		$ngaySinh = $_POST["txtNgaySinh"];
		$cMND = $_POST["txtCMND"];
		$email = $_POST["txtEmail"];
		$bangCap = $_POST["txtBangCap"]
		$chuyenMon = $_POST["txtChuyenMon"];
		$soDienThoai = $_POST["txtSDT"];

		//
		// khởi tạo đối tượng giáo viên
		//
		$newGiaoVien = new Giaovien($hoTenGV, $gioiTinh, $ngaySinh, $cMND, $email, $bangCap, $chuyenMon, $soDienThoai);
		$result = $newGiaoVien->insert();

		
	}

 ?>