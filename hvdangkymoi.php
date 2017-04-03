<?php require_once("entities/hvdangkymoi.class.php"); ?>
<?php 
if (isset($_POST['btnsubmit'])) {
 	# code...
 	$hoTen = $_POST['txtHoTen'];
 	$soDienThoai = $_POST['txtDienThoai'];
 	$monHoc = $_POST['txtChuongTrinhhoc'];
 	$ngayTrongTuan = $_POST['txtNgayTrongTuan'];
 	$buoiTrongNgay = $_POST['txtBuoiTrongNgay'];
 	$noiDung = $_POST['txtNoiDung'];
 	//
 	$newRegister = new HVDangKyMoi($hoTen, $soDienThoai, $monHoc, $ngayTrongTuan, $buoiTrongNgay, $noiDung);
 	// lưu xuống CSDL
 	$result = $newRegister->them();
		if(!$result)
		{
			// truy vấn lỗi
			header("Location: hvdangkymoi.php?failure");
		}
		else
		{
			header("Location: hvdangkymoi.php?inserted");
		}
 } ?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact - Music School Website</title>
	<link rel="stylesheet" href="userMusicSchool/css/style.css" type="text/css">
</head>
<body>
	<div class="page">
		<div class="header">
			<a href="index.php" id="logo"><img src="userMusicSchool/images/logo.png" alt="logo"></a>
			<ul class="navigation">
				<li>
					<a href="./">Trang chủ</a>
				</li>
				<li>
					<a href="userMusicSchool/about.html">Giới thiệu</a>
				</li>
				<li>
					<a href="userMusicSchool/programs.html">Chương trình học</a>
				</li>
				<li class="selected">
					<a href="hvdangkymoi.php">Đăng ký</a>
				</li>
				<li>
					<a href="userMusicSchool/blog.html">Blog</a>
				</li>
				<li>
					<a href="userMusicSchool/contact.html">Liên hệ</a>
				</li>
			</ul>
		</div>
		<div class="body">
			<div class="contact">
				<div>
					<div>
						<h1>Học ngay bây giờ</h1>
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
				<div>
					<h2 style="color:#ec7500; ">Đăng ký học</h2>
					<?php
		               if (isset($_GET["inserted"])){
		                 echo "<h2>Thêm thành công</h2>";
		               }
		               if(isset($_GET["failure"])) {
		                 echo "<h2>Thêm thất bại</h2>";
		               }
		             ?>
					<form method="post" enctype="multipart/form-data">
						<div>
							<label for="name">Họ Tên</label>
							<input type="text" name="txtHoTen">
							<label for="phone">Điện thoại</label>
							<input type="number" name="txtDienThoai">
						</div>
						<div>
							<label for="message">Nội dung</label>
							<textarea name="txtNoiDung" id="message" cols="30" rows="10"></textarea>							
						</div>
						<div style="display: inline-block">
							<label>Chương trình học</label>
							<input type="checkbox" name="txtChuongTrinhhoc" value="Guitar" style="margin: 10px"> Guitar<br>
							<input type="checkbox" name="txtChuongTrinhhoc" value="Violin" style="margin: 10px"> Violin<br>
							<input type="checkbox" name="txtChuongTrinhhoc" value="Piano" style="margin: 10px"> Piano<br>
							<input type="checkbox" name="txtChuongTrinhhoc" value="Drums" style="margin: 10px"> Trống<br>
							<input type="checkbox" name="txtChuongTrinhhoc" value="voice-lesson" style="margin: 10px"> Luyện Giọng<br>
							<input type="checkbox" name="txtChuongTrinhhoc" value="Saxophone" style="margin: 10px"> Saxophone<br>
						</div>
						<!--
						<div style="display: inline-block; margin-left: 150px">
							<label>Cấp độ</label>
							<input type="checkbox" name="levels" value="beginner" style="margin: 10px"> Nghiệp dư<br>
							<input type="checkbox" name="levels" value="immediate"style="margin: 10px"> Bán Chuyên<br>
							<input type="checkbox" name="levels" value="advanced" style="margin: 10px"> Chuyên nghiệp<br>
						</div> -->
						<div style="display: inline-block; margin-left: 150px">
							<label>Thời gian học</label>
							<label>Thứ</label>
							<input type="checkbox" name="txtNgayTrongTuan" value="Thứ 2,4,6" style="margin: 5px"> Thứ 2,4,6<br>
							<input type="checkbox" name="txtNgayTrongTuan" value="Thứ 3,5,7" style="margin: 5px"> Thứ 3,5,7<br>
							<label>Thời gian</label>
							<input type="checkbox" name="txtBuoiTrongNgay" value="Buổi sáng" style="margin: 5px">Buổi sáng: 08:00am - 11:00pm<br>
							<input type="checkbox" name="txtBuoiTrongNgay" value="Buổi tối" style="margin: 5px">Buổi tối: 18:00am - 21:00pm<br>
							<input type="submit" name="btnsubmit" value="Gửi đăng ký" style="float:right; margin-left: 150px; margin-top: 20px;">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="about">
				<h3>Giới Thiệu</h3>
				<div>
					<a href="about.html"><img src="userMusicSchool/images/instructors.jpg" alt=""></a>
					<p>
						<strong>Bạn muốn 1 lớp học</strong> dành cho Guitar hay Violin. Lắng nghe chúng tôi , <em> Không nơi nào</em> tốt hơn chúng tôi. 
					</p>
					<a href="blog.html" class="more">Xem Thêm</a>
				</div>
			</div>
			<div class="contact">
				<h3>Liên hệ</h3>
				<ul>
					<li>
						<span>Địa chỉ :</span>
						<p>
							Quận Thủ Đức ,Thành Phố Hồ Chí Minh, VN
						</p>
					</li>
					<li>
						<span>Email :</span>
						<p>
							<a href="hr@musiccenter.com">Email</a>
						</p>
					</li>
					<li>
						<span>Số Điện Thoại :</span>
						<p>
							(84) 123 123 456 
						</p>
					</li>
				</ul>
			</div>
			<div class="connect">
				<a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">twitter</a> <a href="http://freewebsitetemplates.com/go/facebook/" id="facebook">facebook</a> <a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">google+</a>
			</div>
			<p class="footnote">
				&#169; Copyright 2016. All rights reserved
			</p>
		</div>
	</div>

</body>
</html>