<?php
	if(isset($_POST["view"])){
		$connect = mysqli_connect("localhost", "root", "", "qltrungtamamnhac");
		mysqli_set_charset($connect,"utf8");
		$query = "SELECT * FROM phieuxinnhaphoc ORDER BY IDPhieuXNH DESC LIMIT 5";
		$result = mysqli_query($connect, $query);
		$output2 = '';
		if(mysqli_num_rows($result)>0) {
			while($row = mysqli_fetch_array($result)){
				$output2 .= '
					<li>
						<a href="themhocvien.php?tenxnh='.$row["TenNguoiXNH"].'">
							<p style="font-weight: bold;">HV xin nhập học: '.$row["TenNguoiXNH"].'</p><br/>
							<p style="font-weight: bold;">Môn học:'.$row["MonHoc"].'</p><br/>
							<p>Cấp độ: '.$row["CapDo"].'</small><br/>
							<p>Buổi học: '.$row["BuoiTrongNgay"].' :: '.$row["NgayTrongTuan"].'</p>
							<p>Giáo viên:'.$row["TenGiaoVien"].'</p>
						</a>
					</li>
				';
			}
		}
		else{
			$output2 .= '
			<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>
			';
		}
		$query_1 = "SELECT *  FROM phieuxinnhaphoc WHERE TrangThai='0'";
		$result_1 = mysqli_query($connect, $query_1);
		$count2 = mysqli_num_rows($result_1);
		$data = array(
			'notification2' => $output2,
			'unseen_notification2' => $count2
		);
		echo json_encode($data);
	}
?>
