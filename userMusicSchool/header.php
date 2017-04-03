<?php
if(!isset($_SESSION))
	{
			session_start();
	}
	if (isset($_POST["btnDangXuat"])) {
		unset($_SESSION['user']);
		header("location: register.php");
	}
 ?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Trung Tâm Âm Nhạc Thái Hưng</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="userMusicSchool/node_modules/swiper/dist/css/swiper.min.css">
	<link rel="stylesheet" href="node_modules/swiper/dist/css/swiper.min.css">
	<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<div class="page">
		<div class="header">
			<a href="index.html" id="logo"><img src="images/logo.png" alt="logo"></a>
			<ul class="navigation">
				<li>
					<a href="./">Trang chủ</a>
				</li>
				<li>
					<a href="about.html">Giới thiệu</a>
				</li>
				<li>
					<a href="programs.html">Chương trình học</a>
				</li>
				<?php if (!isset($_SESSION['user'])) {?>
				<li class="selected">
					<a href="register.php">Đăng ký</a>
				</li>
				<?php } else {?>
					<li class="selected">
						<form method="post">
							<input type="submit" name="btnDangXuat" value="Đăng xuất">
						</form>
					</li>
				<?php } ?>
				<li>
					<a href="blog.html">Blog</a>
				</li>
				<li>
					<a href="contact.html">Liên hệ</a>
				</li>

			</ul>
		</div>
