<?php
if(!isset($_SESSION))
	{
			session_start();
	}
 ?>
<?php include_once("../entities/lichhoc.class.php"); ?>
<?php include_once("../entities/monhoc.class.php"); ?>
<?php include_once("../entities/giaovien.class.php"); ?>
<?php include_once("../entities/capdo.class.php"); ?>
<?php include_once("../entities/lophoc.class.php"); ?>
<?php include_once("../entities/nguoixinnhaphoc.class.php"); ?>
<?php include_once("../entities/phieuxinnhaphoc.class.php"); ?>
<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>

<?php
	if(isset($_POST["btnDangKyNguoiXinNhapHoc"])){
		$idNguoiXNH = 0;
		$EmailDangKy = $_POST["txtEmailDangKy"];
		$MatKhauDangKy = $_POST["txtMatKhauDangKy"];
		$HoTenDangKy = $_POST["txtHoTenDangKy"];
		$SDTDangKy = $_POST["txtSDTDangKy"];

		$lastNguoiXinNhapHoc = NguoiXinNhapHoc::Get_Last_NguoiXNH();
		$soluongNXNH = NguoiXinNhapHoc::Count_NguoiXinNhapHoc();

		foreach ($soluongNXNH as $key => $itemSoLuongNguoiXNH) {
			$soLuongNguoiXinNhapHoc = $itemSoLuongNguoiXNH['soluongnguoixnh'];
			if($soLuongNguoiXinNhapHoc == 0){
				$idNguoiXNH = 1;
			}
			else {
				foreach ($lastNguoiXinNhapHoc as $key => $itemLastNXNH) {
					$lastIDNguoiXinNhapHoc = $itemLastNXNH['IDNguoiXNH'];
					$idNguoiXNH = intval($lastIDNguoiXinNhapHoc) + 1;
				}
			}
		}

		//$idNguoiXNH, $emailNguoiXNH, $matKhauNguoiXNH, $hoTenNguoiXNH, $sdtNguoiXNH, $noiDungXNH
		$newNguoiXinNhapHoc = new NguoiXinNhapHoc($idNguoiXNH, $EmailDangKy, $MatKhauDangKy, $HoTenDangKy, $SDTDangKy, "");
		$resultInsertNguoiXNH = $newNguoiXinNhapHoc->insert();
		if($resultInsertNguoiXNH){
			$_SESSION['user'] = $EmailDangKy;
		}
		else {
			?>
			<script>alert('Có lỗi xảy ra, vui lòng kiểm tra dữ liệu.')</script>
			<?php
		}
	}

	if(isset($_POST["btnDangNhap"])){

		$EmailDangNhap = $_POST["txtEmailDangNhap"];
		$MatKhauDangNhap = $_POST["txtMatKhauDangNhap"];

		$conn=mysqli_connect("localhost","root","") or die("can't connect");
    mysqli_select_db($conn,"qltrungtamamnhac");
    mysqli_set_charset($conn,"utf8");
    $stmt = $conn->prepare("SELECT nxnh.EmailNguoiXNH from nguoixinnhaphoc nxnh Where nxnh.EmailNguoiXNH = ? and nxnh.MatKhau = ? LIMIT 1");
    $stmt->bind_param('ss', $EmailDangNhap, $MatKhauDangNhap);
    $stmt->execute();
   $stmt->bind_result($emailLogin);
   $stmt->store_result();
	 if ($stmt->num_rows == 1) {
		 if($stmt->fetch()) //fetching the contents of the row
    	{
	        $_SESSION['user'] = $emailLogin;
					header("Location: register.php?success");
	    }
			else {
				header("Location: register.php?failfetch");
			}
	 }
	}
?>
<!--Phan dau-->
<?php include_once("header.php"); ?>
<?php
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

	<!--Phan than-->
		<div class="body">

			<div class="contact">
				<!--Khung dau tien-->
				<div>
					<div>
						<h1>Học ngay bây giờ </h1>
						<p>
							Hiện tại Trung Tâm đang có rất nhiều chương trình với học Phí ưu đãi...
						</p>
					</div>
					<div>
						<h4 style="font-weight: bolder">Chương Trình Học</h4>
						<ul class="first">
							<li>
								<a href="programs.html">Piano</a>
								<p>Nghiệp dư - Bán Chuyên - Chuyên Nghiệp</p>
							</li>
							<li>
								<a href="violin.html">Violin</a>
								<p>Nghiệp dư - Bán Chuyên - Chuyên Nghiệp</p>
							</li>
							<li>
								<a href="guitar.html">Guitar</a>
								<p>Nghiệp dư - Bán Chuyên - Chuyên Nghiệp</p>
							</li>
						</ul>
						<ul class="last">
							<li>
								<a href="saxophone.html">Saxophone</a>
								<p>Nghiệp dư - Bán Chuyên - Chuyên Nghiệp</p>
							</li>
							<li>
								<a href="drums.html">Drums</a>
								<p>Nghiệp dư - Bán Chuyên - Chuyên Nghiệp</p>
							</li>
							<li>
								<a href="voice-lesson.html">Luyện giọng</a>
								<p>Nghiệp dư - Bán Chuyên - Chuyên Nghiệp</p>
							</li>
						</ul>
					</div>
					<ul class="section">
						<li>
							<span style="font-weight: bolder">Địa chỉ</span>
							<p>
								Quận Thủ Đức, Thành phố Hồ Chí Minh , VN
							</p>
						</li>
						<li>
							<span style="font-weight: bolder">Email</span> <a href="http://www.google.com/">Email Trung Tâm</a> <a href="http://www.freewebsitetemplates.com/forums/">Forum</a>
						</li>
						<li>
							<span style="font-weight: bolder">Số điện thoại</span>
							<p>
								(84) 123 456 789 <br> (84) 987 654 321
							</p>
						</li>
					</ul>
				</div>

				<!--Khung Thu Hai-->
				<div>

				</div>
			</div>

			<div class="row">
				<?php if (!isset($_SESSION['user'])) {?>
					<!--Đang Ky-->
					<div class="col-md-6">
						<h2 style="color:#ec7500; ">Đăng ký học</h2>
						<form method="post">
							<div class="form-group">
						    <label for="exampleInputEmail1">Email:</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" name="txtEmailDangKy" placeholder="Email">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Mật khẩu:</label>
						    <input type="password" class="form-control" id="exampleInputPassword1" name="txtMatKhauDangKy" placeholder="Password">
						  </div>
							<div class="form-group">
						    <label for="exampleInputEmail1">Họ tên:</label>
						    <input type="text" class="form-control" id="exampleInputEmail1" name="txtHoTenDangKy" placeholder="Email">
						  </div>
							<div class="form-group">
						    <label for="exampleInputEmail1">Số điện thoại:</label>
						    <input type="text" class="form-control" id="exampleInputEmail1" name="txtSDTDangKy" placeholder="Email">
						  </div>
						  <button type="submit" name="btnDangKyNguoiXinNhapHoc" class="btn btn-default">Đăng ký</button>
						</form>
					</div>
					<!--Đang nhap-->
					<div class="col-md-6">
						<h2 style="color:#ec7500; ">Đăng nhập</h2>
						<form method="post">
							<div class="form-group">
						    <label for="exampleInputEmail1">Email:</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" name="txtEmailDangNhap" placeholder="Email">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Mật khẩu:</label>
						    <input type="password" class="form-control" id="exampleInputPassword1" name="txtMatKhauDangNhap" placeholder="Password">
						  </div>
						  <button type="submit" name="btnDangNhap" class="btn btn-default">Đăng nhập</button>
						</form>
					</div>
				<?php } ?>
			</div>

			<?php if (!isset($_SESSION['user'])) {?>
				<h2 style="color: red;">Bạn cần đăng nhập để có thể Đăng ký môn học</h2>
			<?php } else { ?>
				<h2 style="color: red;">Bạn có thể đăng ký môn học.</h2>

				<!--Khung load danh sach cac khoa hoc de dang ky-->
				<?php $allMonHocInLop = MonHoc::Get_All_MonHoc_In_Lop(); ?>
				<?php foreach ($allMonHocInLop as $key => $itemMonHocInLopHoc) {
					$idMonHocInLop = $itemMonHocInLopHoc['IDMonHoc'];
					$tenMonHocInLop = $itemMonHocInLopHoc['TenMonHoc'];
					$_SESSION["TenMonHoc"] = $tenMonHocInLop;
					$tenMonHocVTInLop = $itemMonHocInLopHoc['VietTac'];
					$hinhAnhMonHocInLop = $itemMonHocInLopHoc['HinhAnh'];
				?>
					<div class="home">
						<div class="content">
							<div class="section">
								<h3><?php echo $tenMonHocInLop; ?></h3>
								<div class="">
									<ul>
										<?php $allCapDoInLopHocByIdMonHoc = CapDo::Get_All_Capo_By_IdMonHOc_InLopHoc($idMonHocInLop); ?>
										<?php foreach ($allCapDoInLopHocByIdMonHoc as $key => $itemCapDoInLopHocByIdMonHoc) {
											$idCapDoInLopHocByIdMonHoc = $itemCapDoInLopHocByIdMonHoc['IDCapDo'];
											$tenCapDoInLopHocByIdMonHoc = $itemCapDoInLopHocByIdMonHoc['TenCapDo'];
										?>
											<li>
												<span><?php echo $tenCapDoInLopHocByIdMonHoc; ?></span>
												<a data-toggle="modal" href="" data-target="#<?php echo $idMonHocInLop; ?><?php echo $idCapDoInLopHocByIdMonHoc; ?>"><img src="../public/images/VatLieu/<?php echo $tenMonHocVTInLop; ?>/<?php echo $hinhAnhMonHocInLop; ?>" style="height: 173px; width: 138px" alt=""></a>
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $idMonHocInLop; ?><?php echo $idCapDoInLopHocByIdMonHoc; ?>" >Xem buổi học/đăng ký</button>
												<div class="modal fade" id="<?php echo $idMonHocInLop; ?><?php echo $idCapDoInLopHocByIdMonHoc; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
												  <div class="modal-dialog" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="exampleModalLabel">Lớp học: <?php echo $tenMonHocInLop; ?> cấp độ <?php echo $tenCapDoInLopHocByIdMonHoc; ?></h4>
												      </div>
												      <div class="modal-body">

																<div class="clearfix">
																</div>
																<table class="table table-bordered table-hover">
																	<thead>
																		<tr>
																			<th>Buổi học</th>
																			<th>Các thứ trong tuần</th>
																			<th>Giáo viên</th>
																			<th>Đăng ký</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php //Get_All_LichGiaoVien_ByIdMonVsIdCapDo
																		 $allLichGiaoVienByIdMonVsIdCapDo = GiaoVien::Get_All_LichGiaoVien_ByIdMonVsIdCapDo($idMonHocInLop, $idCapDoInLopHocByIdMonHoc);
																		?>
																		<?php foreach ($allLichGiaoVienByIdMonVsIdCapDo as $key => $itemLichGiaoVien) {
																			$idLopHoc = $itemLichGiaoVien['IDLopHoc'];
																			$idGiaoVienInLop = $itemLichGiaoVien['IDGiaoVien'];
																			$idLichHocInLop = $itemLichGiaoVien['IDLichHoc'];
																			$tenGiaoVienInLop = $itemLichGiaoVien['HoTenGV'];
																			$buoiTrongNgayInLop = $itemLichGiaoVien['BuoiTrongNgay'];
																			$ngayTrongTuanInLop = $itemLichGiaoVien['NgayTrongTuan'];
																		?>
																			<tr>
																				<td><?php echo $buoiTrongNgayInLop; ?></td>
																				<td><?php echo $ngayTrongTuanInLop; ?></td>
																				<td><?php echo $tenGiaoVienInLop; ?></td>
																				<td>
																					<form method="post" class="comment_form">
																						<input type="hidden" name="subject" id="subject" value="<?php echo $idLopHoc; ?>">
																						<input type="hidden" name="comment" id="comment" value="<?php echo $idNguoiXinNhapHoc_ByEmail; ?>">
																						<input type="hidden" name="tennguoixin" id="tennguoixin" value="<?php echo $hoTenNguoiXinNhapHoc_ByEmail; ?>">
																						<input type="hidden" name="tenmonhoc" id="tenmonhoc" value="<?php echo $tenMonHocInLop; ?>">
																						<input type="hidden" name="capdo" id="capdo" value="<?php echo $tenCapDoInLopHocByIdMonHoc; ?>">
																						<input type="hidden" name="buoitrongngay" id="buoitrongngay" value="<?php echo $buoiTrongNgayInLop; ?>">
																						<input type="hidden" name="ngaytrongtuan" id="ngaytrongtuan" value="<?php echo $ngayTrongTuanInLop; ?>">
																						<input type="hidden" name="giaovien" id="giaovien" value="<?php echo $tenGiaoVienInLop; ?>">
																						<input type="submit" name="post" id="post" class="btn btn-info" value="Đăng ký"/>
																					</form>
																				</td>
																			</tr>
																		<?php } ?>
																	</tbody>
																</table>
																<div class="clearfix">
																</div>
																<button type="button" class="btn btn-primary cli" name="button">xem lớp đăng ký</button>
																<span class="badge bg-green countc"></span>
																<div class="table-responsive">
																<table class="table table-bordered table-hover"	 >
																	<tbody class="dropdown-menuuh">
																	</tbody>
																</table>
															</div>
												      </div>
												      <div class="modal-footer">
																<div class="nav_menu">
																</div>
												        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
												      </div>
												    </div>
												  </div>
												</div>
											</li>
									<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	<!--Phan cuoi-->
<?php include_once("footer.php"); ?>
<?php include_once("script.php"); ?>
<script>
$('.cli').on('click', function(){
  function load_unseen_notification(view = '')
  {
    $.ajax({
      url:"fetch.php",
      method:"POST",
      data:{view:view},
      dataType:"json",
      success:function(data){
        $('.dropdown-menuuh').html(data.notification2);
        if(data.unseen_notification2 > 0){
          $('.countc').html(data.unseen_notification2);
        }
      }
    });
  }
  load_unseen_notification();
});
</script>
