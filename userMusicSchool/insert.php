<?php
	if(isset($_POST["subject"])){
		$connect = mysqli_connect("localhost", "root", "", "qltrungtamamnhac");
mysqli_set_charset($connect,"utf8");
		$subject = mysqli_real_escape_string($connect, $_POST["subject"]);
		$comment = mysqli_real_escape_string($connect, $_POST["comment"]);
		$tennguoixin = mysqli_real_escape_string($connect, $_POST["tennguoixin"]);
		$tenmonhoc = mysqli_real_escape_string($connect, $_POST["tenmonhoc"]);
		$capdo = mysqli_real_escape_string($connect, $_POST["capdo"]);
		$buoitrongngay = mysqli_real_escape_string($connect, $_POST["buoitrongngay"]);
		$ngaytrongtuan = mysqli_real_escape_string($connect, $_POST["ngaytrongtuan"]);
		$giaovien = mysqli_real_escape_string($connect, $_POST["giaovien"]);

		$query = "INSERT INTO phieuxinnhaphoc (IDLopHoc, IDNguoiXNH, TenNguoiXNH, MonHoc, CapDo, BuoiTrongNgay, NgayTrongTuan, TenGiaoVien)
					VALUES ('$subject', '$comment', '$tennguoixin', '$tenmonhoc', '$capdo', '$buoitrongngay', '$ngaytrongtuan', '$giaovien')";
					mysqli_query($connect, $query);
	}
?>
