<?php include_once("../entities/nguoixinnhaphoc.class.php"); ?>
<?php include_once("../entities/phieuxinnhaphoc.class.php"); ?>
<?php
session_start();
	if (isset($_SESSION['user'])) {
		//Get_NguoiXinNhapHoc_ByEmail
		$emailUser = $_SESSION['user'];
		$newNguoiXinNhapHoc_ByEmail = NguoiXinNhapHoc::Get_NguoiXinNhapHoc_ByEmail($emailUser);
		foreach ($newNguoiXinNhapHoc_ByEmail as $key => $itemNguoiXinNhapHoc_ByEmail) {
			$idNguoiXinNhapHoc_ByEmail = $itemNguoiXinNhapHoc_ByEmail["IDNguoiXNH"];
			$hoTenNguoiXinNhapHoc_ByEmail = $itemNguoiXinNhapHoc_ByEmail["HoTenNguoiXNH"];
			$sdtNguoiXinNhapHoc_ByEmail = $itemNguoiXinNhapHoc_ByEmail["SDTNguoiXNH"];
		}
} ?>
<?php
	if(isset($_POST["view"])){
		$connect = mysqli_connect("localhost", "root", "", "qltrungtamamnhac");
		mysqli_set_charset($connect,"utf8");
		$query = "SELECT * FROM phieuxinnhaphoc where IDNguoiXNH = '$idNguoiXinNhapHoc_ByEmail' GROUP by MonHoc, BuoiTrongNgay, NgayTrongTuan LIMIT 5 ";
		$result = mysqli_query($connect, $query);
		$output2 = '';
		if(mysqli_num_rows($result)>0) {
			while($row = mysqli_fetch_array($result)){
				$output2 .= '
					<tr>
							<td>'.$row["TenNguoiXNH"].'</td>
							<td>'.$row["MonHoc"].'</td>
							<td>'.$row["CapDo"].'</td>
							<td>'.$row["BuoiTrongNgay"].'</td>
							<td>'.$row["NgayTrongTuan"].'</td>
							<td>'.$row["TenGiaoVien"].'</td>
					</tr>
				';
			}
		}
		else{
			$output2 .= '
			<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>
			';
		}
		$query_1 = "SELECT *  FROM phieuxinnhaphoc WHERE TrangThai='0' and IDNguoiXNH = '$idNguoiXinNhapHoc_ByEmail' GROUP by MonHoc, BuoiTrongNgay, NgayTrongTuan";
		$result_1 = mysqli_query($connect, $query_1);
		$count2 = mysqli_num_rows($result_1);
		$data = array(
			'notification2' => $output2,
			'unseen_notification2' => $count2
		);
		echo json_encode($data);
	}
?>
