<?php
include_once("entities/taikhoan.class.php");
session_start();
$idTaiKhoan = $_SESSION['IDTaiKhoan'];
//$idTaiKhoan, $tenTaiKhoan, $matKhau, $idQuyenHan, $trangThaiOnline
$newTaiKhoan = new TaiKhoan($idTaiKhoan, "", "", "", "Offline");
$setStatusOffLine = $newTaiKhoan->edit_Status_Online($idTaiKhoan);
echo "Thời gian đợi.";
echo date('h:i:s') . "<br>";

//sleep for 5 seconds
sleep(2);

//start again
echo date('h:i:s');
session_destroy();
header("Location: login.php");
 ?>
